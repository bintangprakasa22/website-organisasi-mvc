<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllUsers() {
        $query = "SELECT u.id, u.username, u.email, u.is_active, u.profile_pic, r.name as role_name 
                  FROM users u JOIN roles r ON u.role_id = r.id ORDER BY u.created_at DESC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }

    public function getRoles() {
        $stmt = $this->db->query("SELECT id, name FROM roles");
        return $stmt->fetchAll();
    }

    public function addUser($role_id, $username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (id, role_id, username, email, password_hash, profile_pic) 
                  VALUES (UUID(), :role_id, :username, :email, :password_hash, 'default.png')";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'role_id' => $role_id, 'username' => $username, 
            'email' => $email, 'password_hash' => $hashedPassword
        ]);
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updateUser($id, $role_id, $username, $email, $is_active, $profile_pic = null) {
        if ($profile_pic) {
            $query = "UPDATE users SET role_id = :role_id, username = :username, 
                      email = :email, is_active = :is_active, profile_pic = :profile_pic WHERE id = :id";
            $params = ['id' => $id, 'role_id' => $role_id, 'username' => $username, 'email' => $email, 'is_active' => $is_active, 'profile_pic' => $profile_pic];
        } else {
            $query = "UPDATE users SET role_id = :role_id, username = :username, 
                      email = :email, is_active = :is_active WHERE id = :id";
            $params = ['id' => $id, 'role_id' => $role_id, 'username' => $username, 'email' => $email, 'is_active' => $is_active];
        }
        $stmt = $this->db->prepare($query);
        return $stmt->execute($params);
    }

    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getStats() {
        $stmt = $this->db->query("SELECT COUNT(*) as total_user, SUM(is_active = 1) as aktif_user FROM users");
        return $stmt->fetch();
    }

    public function logActivity($user_id, $action) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $stmt = $this->db->prepare("INSERT INTO audit_logs (user_id, action, ip_address) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $action, $ip]);
    }

    public function getRecentLogs() {
        $query = "SELECT a.action, a.ip_address, a.created_at, u.username 
                  FROM audit_logs a 
                  LEFT JOIN users u ON a.user_id = u.id 
                  ORDER BY a.created_at DESC LIMIT 5";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }
}