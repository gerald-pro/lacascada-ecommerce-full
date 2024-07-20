<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public static function processPayment(int $orderId): array
    {
        $order = Order::with('user', 'orderItems.product')->findOrFail($orderId);
        $details = self::generateOrderDetails($order);

        if ($order->payment) {
            $payment = $order->payment;

            if (is_null($payment->qr_image) || Carbon::now()->greaterThan($payment->qr_expiration_date)) {
                $transaction = self::generateTransaction($order, $details);
                $payment->update([
                    'transaction_id' => $transaction['nroTransaction'],
                    'qr_image' => $transaction['qrImage'],
                    'qr_expiration_date' => $transaction['expirationDate'],
                ]);
            }
        } else {
            $transaction = self::generateTransaction($order, $details);
            $payment = Payment::create([
                'transaction_id' => $transaction['nroTransaction'],
                'order_id' => $order->id,
                'total_amount' => $order->total_amount,
                'status' => 'PENDIENTE',
                'qr_image' => $transaction['qrImage'],
                'qr_expiration_date' => $transaction['expirationDate'],
            ]);
        }

        return ['status' => 'success', 'message' => 'Transacción procesada correctamente.'];
    }

    public static function generateTransaction(Order $order, array $details)
    {
        try {

            $saleId = 'grupo13sa-' . $order->id .  random_int(1000, 9999);

            $lcComerceID = env('PAGOFACIL_COMMERCE_ID');
            $lnMoneda              = 2;
            $lnTelefono            = 70480741;
            $lcNombreUsuario        = $order->user->name;
            $lnMontoClienteEmpresa = $order->total_amount;
            $lnCiNit               = 14495734;
            $lcCorreo              = 'geraldjoseavalosseveriche@gmail.com';
            $lcUrlCallBack = env('PAGOFACIL_URL_CALLBACK');
            $lcUrlReturn = env('PAGOFACIL_URL_CALLBACK');
            $laPedidoDetalle       = $details;



            $loClient = new Client();
            $lcUrl = env("PAGOFACIL_API_URL") . "/generarqrv2";

            $laHeader = [
                'Accept' => 'application/json'
            ];

            $laBody   = [
                "tcCommerceID"          => $lcComerceID,
                "tnMoneda"              => $lnMoneda,
                "tnTelefono"            => $lnTelefono,
                'tcNombreUsuario'       => $lcNombreUsuario,
                'tnCiNit'               => $lnCiNit,
                'tcNroPago'             => $saleId,
                "tnMontoClienteEmpresa" => $lnMontoClienteEmpresa,
                "tcCorreo"              => $lcCorreo,
                'tcUrlCallBack'         => $lcUrlCallBack,
                "tcUrlReturn"           => $lcUrlReturn,
                'taPedidoDetalle'       => $laPedidoDetalle
            ];

            $loResponse = $loClient->post($lcUrl, [
                'headers' => $laHeader,
                'json' => $laBody
            ]);

            $laResult = json_decode($loResponse->getBody()->getContents());


            if ($laResult->error == 0) {
                return self::parseTransactionResponse($laResult, $saleId);
            } else {
                throw new Exception('Error al generar la transaccion en pagofacil. ' . $laResult->error);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            Log::error("Error de cliente: " . $responseBodyAsString);
            throw new Exception('Error al generar la transacción en pagofacil. Error de cliente: ' . $response->getStatusCode());
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            Log::error("Error de servidor: " . $responseBodyAsString);
            throw new Exception('Error al generar la transacción en pagofacil. Error de servidor: ' . $response->getStatusCode());
        } catch (\Exception $e) {
            Log::error("Error inesperado: " . $e->getMessage());
            throw new Exception('Error inesperado al generar la transacción en pagofacil: ' . $e->getMessage());
        }
    }

    public static function checkTransaction(int $lnTransaccion)
    {
        try {
            $loClientEstado = new Client();
            $lcUrlEstadoTransaccion = env("PAGOFACIL_API_URL") . "/consultartransaccion";

            $loEstadoTransaccion = $loClientEstado->post($lcUrlEstadoTransaccion, [
                'headers' => ['Accept' => 'application/json'],
                'json' => ["TransaccionDePago" => $lnTransaccion]
            ]);

            $laResultEstadoTransaccion = json_decode($loEstadoTransaccion->getBody()->getContents());
            if ($laResultEstadoTransaccion->error == 0) {
                $result = strtolower($laResultEstadoTransaccion->values->messageEstado);
                return ['status' => strpos($result, 'procesado') !== false ? 'procesado' : 'en cola', 'message' => $laResultEstadoTransaccion->message];
            } else {
                return ['status' => 'error', 'message' => $laResultEstadoTransaccion->message];
            }
        } catch (\Throwable $th) {
            return ['status' => 'error', 'message' => $th->getMessage()];
        }
    }

    public static function updatePendingTransactions(int $userId = null, bool $updateQr = false): void
    {

        $pendingPayments = Order::whereHas('payment', function ($query) use ($userId) {
            if ($userId) {
                $query->where('user_id', $userId)->where('status', 'PENDIENTE');
            } else {
                $query->where('status', 'PENDIENTE');
            }
        })->get();

        $now = Carbon::now();

        foreach ($pendingPayments as $order) {
            $payment = $order->payment;

            if ($payment->qr_expiration_date) {
                $expirationDate = Carbon::parse($payment->qr_expiration_date);

                if ($now->greaterThan($expirationDate)) {
                    $payment->update(['status' => 'CANCELADO']);
                } else {
                    $response = self::checkTransaction($payment->transaction_id);
                    if ($response['status'] == 'procesado') {
                        $payment->update(['status' => 'PAGADO']);
                    }
                }
            } else {
                if ($updateQr) {
                    try {
                        $details = self::generateOrderDetails($order);
                        $transaction = self::generateTransaction($order, $details);

                        $payment->update([
                            'transaction_id' => $transaction['nroTransaction'],
                            'qr_image' => $transaction['qrImage'],
                            'qr_expiration_date' => $transaction['expirationDate'],
                            'status' => 'PENDIENTE'
                        ]);
                    } catch (\Exception $e) {
                        $payment->update(['status' => 'CANCELADO']);
                    }
                }
            }
        }
    }


    private static function parseTransactionResponse($laResult, $saleId)
    {
        $laValues = explode(";", $laResult->values);
        $qrData = json_decode($laValues[1]);
        $qrImage = "data:image/png;base64," . $qrData->qrImage;
        $expirationDate = Carbon::createFromFormat('Y-m-d H:i:s', $qrData->expirationDate);

        return [
            'status' => 'success',
            'saleId' => $saleId,
            'nroTransaction' => $laValues[0] ?? '',
            'error' => $laResult->error ?? 1,
            'message' => $laResult->message ?? '',
            'messageSistema' => $laResult->messageSistema ?? '',
            'qrImage' => $qrImage,
            'expirationDate' => $expirationDate
        ];
    }

    private static function generateOrderDetails(Order $order): array
    {
        return $order->orderItems->map(function ($item) {
            return [
                "Serial" => $item->product_id,
                "Producto" => $item->product->name,
                "Cantidad" => $item->quantity,
                "Precio" => $item->price,
                "Descuento" => "0",
                "Total" => $item->price * $item->quantity
            ];
        })->toArray();
    }

    public function callback(Request $request)
    {
        try {
            $orderId = $request->input("PedidoID");
            $status = $request->input("Estado");

            if ($status == 2) {
                $order = Order::where('sale_code', $orderId)->first();
                $payment = $order->payment;

                if ($order && $payment && $payment->status != 'PAGADO') {
                    $payment->update(['status' => 'PAGADO']);
                }
            }

            return response()->json(['error' => 0, 'status' => 1, 'message' => "Pago realizado correctamente.", 'values' => true]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 1, 'status' => 1, 'messageSistema' => "[TRY/CATCH] " . $th->getMessage(), 'message' => "No se pudo realizar el pago, por favor intente de nuevo.", 'values' => false]);
        }
    }
}
