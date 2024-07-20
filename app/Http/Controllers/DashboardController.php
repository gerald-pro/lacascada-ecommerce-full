<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Comment;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{

    public function index()
    {
        return redirect()->route('administration.articles');
    }
    /**
     * Display the view.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        $allVisits = Visita::all()->groupBy('url');

        $visits = [];
        foreach ($allVisits as $key => $value) {
            $visits[] = [
                'url' => $key,
                'quantity' => count($value),
            ];
        }

        // If the user is an admin they can manage all posts and users
        if ($request->user()->is_admin) {
            $articles = Article::all();

            $users = User::all();

            // If comments are enabled or if there are comments we load them
            if (config('blog.allowComments') || Comment::count()) {
                $comments = Comment::all();
            }
        }


        // Otherwise if the user is an author we show their posts
        elseif ($request->user()->is_editor) {
            $articles = $request->user()->posts;
        }

        return view('dashboard', [
            'articles' => $articles ?? false,
        ]);
    }
}
