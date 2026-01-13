<?php
require_once __DIR__ . '/../core/model.php';

class Order extends Model {
    protected $table = 'orders';

    public function createOrder($userId, $total, $cartItems) {
        try {
            $this->db->beginTransaction();

            // 1. Créer la commande
            $stmt = $this->db->prepare("INSERT INTO orders (user_id, total_price) VALUES (:uid, :total)");
            $stmt->execute(['uid' => $userId, 'total' => $total]);
            $orderId = $this->db->lastInsertId();

            // 2. Insérer les items
            $stmtItem = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (:oid, :pid, :qty, :price)");
            
            foreach ($cartItems as $item) {
                $stmtItem->execute([
                    'oid' => $orderId,
                    'pid' => $item['id'],
                    'qty' => $item['qty'],
                    'price' => $item['price']
                ]);
            }

            $this->db->commit();
            return $orderId;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
