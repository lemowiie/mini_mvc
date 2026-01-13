<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);

        $viewContent = __DIR__ . '/../Views/' . $view . '.php';
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function redirect($url) {
        header("Location: " . $url);
        exit();
    }
}
