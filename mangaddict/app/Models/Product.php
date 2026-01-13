<?php
require_once __DIR__ . '/../core/model.php';

class Product extends Model {
    protected $table = 'products';

    public function getAllWithCategory() {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                JOIN categories c ON p.category_id = c.id";
        return $this->db->query($sql)->fetchAll();
    }
    
    public function updateStock($id, $qty) {
        $sql = "UPDATE products SET stock = stock - :qty WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['qty' => $qty, 'id' => $id]);
    }
}
