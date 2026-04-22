<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Core\Database;
use App\Models\UserModel; // Panggil UserModel

class AuthController extends Controller {
    
    public function index() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            header("Location: /organisasi_uts/dashboard");
            exit;
        }
        $this->view('login');
    }

    public function prosesLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['logged_in'] = true;

                // --- CATAT KE DALAM LOG ---
                $userModel = new UserModel();
                $userModel->logActivity($user['id'], 'Login Berhasil');

                header("Location: /organisasi_uts/dashboard");
                exit;
            } else {
                echo "<script>alert('Username atau Password salah!'); window.location.href='/organisasi_uts/auth';</script>";
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /organisasi_uts/auth");
        exit;
    }
}