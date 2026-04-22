<?php
namespace App\Core;

class Controller {
    // Fungsi untuk memanggil file tampilan (View)
    public function view($view, $data = []) {
        extract($data);
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("Galat: File View '{$view}.php' tidak ditemukan!");
        }
    }
}