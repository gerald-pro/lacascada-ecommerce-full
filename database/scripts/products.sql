INSERT INTO categories (name, description) VALUES
('Refrescos', 'Bebidas gaseosas como cola, limón, naranja, etc.'),
('Aguas', 'Agua mineral, con gas y tónica'),
('Jugos', 'Jugos naturales de diversas frutas'),
('Isotónicas', 'Bebidas isotónicas para deportistas'),
('Energéticas', 'Bebidas energéticas para aumentar la energía'),
('Cervezas', 'Diversas cervezas rubias y negras'),
('Vinos', 'Vinos blancos, tintos y champán');

-- Insertar Productos con referencia a Categorías
INSERT INTO products (name, description, price, image_url, category_id) VALUES
('Agua Mineral', 'Pack de 24 botellas de agua mineral natural sin gas', 10.00, NULL, 2),
('Coca Cola', 'Pack de 24 latas de bebida gaseosa de cola', 48.00, NULL, 1),
('Sprite', 'Pack de 24 latas de bebida gaseosa de limón', 48.00, NULL, 1),
('Fanta Naranja', 'Pack de 24 latas de bebida gaseosa de naranja', 48.00, NULL, 1),
('Pepsi', 'Pack de 24 latas de bebida gaseosa de cola', 48.00, NULL, 1),
('7 Up', 'Pack de 24 latas de bebida gaseosa de lima-limón', 48.00, NULL, 1),
('Gatorade Azul', 'Pack de 12 botellas de bebida isotónica de sabor frutas del bosque', 30.00, NULL, 4),
('Red Bull', 'Pack de 24 latas de bebida energética', 72.00, NULL, 5),
('Monster Energy', 'Pack de 24 latas de bebida energética', 72.00, NULL, 5),
('Agua Tónica', 'Pack de 24 botellas de agua tónica con quinina', 36.00, NULL, 2),
('Agua con Gas', 'Pack de 24 botellas de agua mineral con gas', 36.00, NULL, 2),
('Jugo de Manzana', 'Pack de 12 botellas de jugo natural de manzana', 30.00, NULL, 3),
('Jugo de Naranja', 'Pack de 12 botellas de jugo natural de naranja', 30.00, NULL, 3),
('Jugo de Tomate', 'Pack de 12 botellas de jugo natural de tomate', 30.00, NULL, 3),
('Té Helado', 'Pack de 12 botellas de té helado con sabor a limón', 24.00, NULL, 3),
('Cerveza Rubia', 'Pack de 24 botellas de cerveza rubia tipo lager', 72.00, NULL, 6),
('Cerveza Negra', 'Pack de 24 botellas de cerveza oscura tipo stout', 72.00, NULL, 6),
('Vino Blanco', 'Pack de 6 botellas de vino blanco seco', 30.00, NULL, 7),
('Vino Tinto', 'Pack de 6 botellas de vino tinto de mesa', 30.00, NULL, 7),
('Champán', 'Pack de 6 botellas de champán brut', 60.00, NULL, 7);