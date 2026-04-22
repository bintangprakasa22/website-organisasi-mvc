<?php
namespace App\Core;
use PDO;
use PDOException;

// Jalur langsung ke config.php
require_once __DIR__ . '/../config.php';

class Database {
    private $host = DB_HOST;
    private $db   = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private static $instance = null;
    private $conn;

    private function __construct() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi Gagal: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) { self::$instance = new Database(); }
        return self::$instance;
    }

    public function getConnection() { return $this->conn; }
}