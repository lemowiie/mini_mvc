<?php
require_once __DIR__ . '/../core/model.php';

class User extends Model {
    protected $table = 'users';

    public function create($username, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :pass)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['username' => $username, 'email' => $email, 'pass' => $hash]);
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
    
    public function getOrderHistory($userId) {
        $sql = "SELECT * FROM orders WHERE user_id = :uid ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetchAll();
    }
}
