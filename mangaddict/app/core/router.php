<?php
class Router {
    public function run() {

        $url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];
        
        $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
        $method = !empty($url[1]) ? $url[1] : 'index';
        $params = array_slice($url, 2);

        
        $controllerPath = __DIR__ . '/../Controllers/' . $controllerName . '.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $controllerName;

            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], $params);
            } else {
                echo "Erreur 404 : Méthode introuvable";
            }
        } else {
            echo "Erreur 404 : Contrôleur introuvable ($controllerName)";
        }
    }
}
