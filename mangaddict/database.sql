
-- Création de la base de données
CREATE DATABASE IF NOT EXISTS mangaddict CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mangaddict;

-- Table Catégories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Table Produits (Mangas)
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    stock INT DEFAULT 10,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Table Utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Commandes (Orders)
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_price DECIMAL(10, 2) NOT NULL,
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table Détails Commandes (Order Items / Panier validé)
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price_at_purchase DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Insertion de données (Seed)
INSERT INTO categories (name) VALUES ('Shonen'), ('Shojo'), ('Seinen');

INSERT INTO products (category_id, name, description, price, image_url, stock) VALUES 
(2, 'Nana - Tome 1', 'L''histoire de deux jeunes femmes prénommées Nana qui montent à Tokyo.', 7.99, 'https://upload.wikimedia.org/wikipedia/en/2/29/Nana_vol_1.jpg', 50),
(2, 'Cardcaptor Sakura', 'Sakura Gauthier, chasseuse de cartes !', 6.90, 'https://upload.wikimedia.org/wikipedia/en/7/76/Cardcaptor_Sakura_vol_1.jpg', 30),
(1, 'One Piece - Tome 100', 'Luffy au chapeau de paille continue son aventure.', 6.90, 'https://upload.wikimedia.org/wikipedia/en/9/90/One_Piece%2C_Volume_61_Cover_%28Japanese%29.jpg', 100),
(2, 'Fruits Basket', 'Tohru Honda et la famille Soma.', 8.50, 'https://upload.wikimedia.org/wikipedia/en/5/5e/Fruits_Basket_1.jpg', 20),
(1, 'Spy x Family', 'Une famille d''espions pas comme les autres.', 7.50, 'https://upload.wikimedia.org/wikipedia/en/5/52/Spy_%C3%97_Family_vol_1.jpg', 40);
