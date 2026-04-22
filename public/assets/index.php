<?php
// Mulai sesi
session_start();

// Autoloader otomatis untuk memanggil class
spl_autoload_register(function ($class) {
    $class = str_replace('App\\', '', $class);
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Jalankan Router
$router = new App\Core\Router();
$router->run();