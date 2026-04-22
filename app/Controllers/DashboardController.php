<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\UserModel;

class DashboardController extends Controller {
    
    public function __construct() {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: /organisasi_uts/auth");
            exit;
        }
    }

    public function index() {
        $userModel = new UserModel();
        $data = [
            'username' => $_SESSION['username'],
            'anggota'  => $userModel->getAllUsers(),
            'stats'    => $userModel->getStats(),      
            'logs'     => $userModel->getRecentLogs()  
        ];
        $this->view('dashboard', $data);
    }

    public function tambah() {
        $userModel = new UserModel();
        $this->view('tambah', ['roles' => $userModel->getRoles()]);
    }

    public function simpan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = new UserModel();
            $userModel->addUser($_POST['role_id'], $_POST['username'], $_POST['email'], $_POST['password']);
            header("Location: /organisasi_uts/dashboard");
        }
    }

    public function edit($id = '') {
        if(empty($id)) { header("Location: /organisasi_uts/dashboard"); exit; }
        $userModel = new UserModel();
        $this->view('edit', [
            'user' => $userModel->getUserById($id),
            'roles' => $userModel->getRoles()
        ]);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $profile_pic = null;

            if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
                $targetDir = "assets/uploads/";
                $fileName = time() . "_" . basename($_FILES['profile_pic']['name']);
                $targetFilePath = $targetDir . $fileName;
                
                if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFilePath)) {
                    $profile_pic = $fileName;
                }
            }

            $userModel = new UserModel();
            $userModel->updateUser($id, $_POST['role_id'], $_POST['username'], $_POST['email'], $_POST['is_active'], $profile_pic);
            header("Location: /organisasi_uts/dashboard");
        }
    }

    public function hapus($id = '') {
        if(!empty($id)) {
            $userModel = new UserModel();
            $userModel->deleteUser($id);
        }
        header("Location: /organisasi_uts/dashboard");
    }
    
    public function export() {
        $userModel = new UserModel();
        $data['anggota'] = $userModel->getAllUsers();
        $this->view('export_excel', $data);
    }
}