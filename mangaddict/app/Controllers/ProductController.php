<?php
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../Models/Product.php';

class ProductController extends Controller {

    public function detail($id) {
        $model = new Product();
        $product = $model->find($id);
        $this->view('product/list-products', ['product' => $product]); 
    }

    public function cart() {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $total = 0;
        foreach ($cart as $item) $total += $item['price'] * $item['qty'];
    
        $this->view('product/cart', ['cart' => $cart, 'total' => $total]);
    }

    public function addToCart($id) {
        $model = new Product();
        $product = $model->find($id);

        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty']++;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image_url,
                'qty' => 1
            ];
        }
        header('Location: index.php?url=product/cart');
    }

    public function removeCart($id) {
        unset($_SESSION['cart'][$id]);
        header('Location: index.php?url=product/cart');
    }

    public function checkout() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?url=home/login');
            exit;
        }

        require_once __DIR__ . '/../Models/Order.php';
        $orderModel = new Order();
        
        $cart = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($cart as $item) $total += $item['price'] * $item['qty'];

        if ($total > 0) {
            $orderModel->createOrder($_SESSION['user_id'], $total, $cart);
            unset($_SESSION['cart']);

            echo "<script>alert('Commande validé gg wp la team'); window.location='index.php';</script>";
        } else {
            header('Location: index.php');
        }
    }
}