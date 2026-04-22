<?php
namespace App\Controllers;
use App\Core\Controller;

class HomeController extends Controller {
    public function index() {
        // Menampilkan halaman depan (Landing Page)
        $this->view('home');
    }
}