<?php
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/user.php';
require_once __DIR__ . '/../Models/Order.php';

class HomeController extends Controller {
    
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAllWithCategory();
        $this->view('home/index', ['products' => $products]);
    }

    public function register() {
        $this->view('home/create-user');
    }

    public function storeUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            if ($userModel->create($_POST['username'], $_POST['email'], $_POST['password'])) {
                header('Location: index.php?url=home/login');
            } else {
                echo "Erreur lors de l'inscription";
            }
        }
    }

    public function login() {
        $this->view('home/users'); 
    }
    public function auth() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            $user = $userModel->findByEmail($_POST['email']);
            
            if ($user && password_verify($_POST['password'], $user->password)) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                header('Location: index.php');
            } else {
                echo "Identifiants incorrects";
            }
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }
    
    public function history() {
        if (!isset($_SESSION['user_id'])) $this->redirect('index.php?url=home/login');
        
        $userModel = new User();
        $orders = $userModel->getOrderHistory($_SESSION['user_id']);
        $this->view('home/history', ['orders' => $orders]);
    }
}
