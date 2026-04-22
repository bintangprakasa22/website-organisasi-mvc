<?php
namespace App\Core;

class Router {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // Cek apakah file controller ada
        $controllerName = ucwords(isset($url[0]) ? $url[0] : 'home') . 'Controller';
        $controllerFile = __DIR__ . '/../Controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            $this->controller = $controllerName;
            unset($url[0]);
        } else if (!empty($url[0])) {
            // JIKA URL NGIDUL/SALAH, PAKSA KE HALAMAN 404
            $this->controller = 'ErrorController';
        }

        $this->controller = "App\\Controllers\\" . $this->controller;
        
        // Pastikan class-nya benar-benar ada sebelum di-instansiasi
        if (class_exists($this->controller)) {
            $this->controller = new $this->controller;
        } else {
            // Jika class tidak ditemukan, lari ke ErrorController
            $this->controller = new \App\Controllers\ErrorController;
        }

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
    }

    public function run() {
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}