<?php
class Router {
    public function handleRequest() {
        $page = $_GET['page'] ?? 'home';
        $controllerName = ucfirst($page) . 'Controller';
        $controllerPath = "../src/Controllers/$controllerName.php";

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $controllerName();
            $controller->index();
        } else {
            echo "Página '$page' não encontrada.";
        }
    }
}
