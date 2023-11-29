<?php

class Guest{
    public function createGuest($guest_id, $guest_name, $guest_email, $guest_phone, $guest_address) {
        $db = DB::getInstance();
        $query = "INSERT INTO guests (guest_id, guest_name, guest_email, guest_phone, guest_address) VALUES (:guest_id, :guest_name, :guest_email, :guest_phone, :guest_address)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':guest_id', $guest_id);
        $stmt->bindParam(':guest_name', $guest_name);
        $stmt->bindParam(':guest_email', $guest_email);
        $stmt->bindParam(':guest_phone', $guest_phone);
        $stmt->bindParam(':guest_address', $guest_address);
        $stmt->execute();
        return $db->lastInsertId();
    }

    public function getTotalOrdersGuest(){
        $db = DB::getInstance();
        $query = "SELECT COUNT(*) as total FROM orders WHERE guest_id IS NOT NULL";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getListOrdersGuest($start, $limit){
        $db = DB::getInstance();
        $query ="SELECT o.order_id, o.guest_id, o.order_date, o.total_amount,o.order_status, g.guest_name FROM orders o JOIN guests g ON o.guest_id = g.guest_id LIMIT $start, $limit";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOrderItemGuestByID($order_id){
        $db = DB::getInstance();
        $query ="SELECT
            o.order_id,
            p.product_id as product_id,
            p.product_name AS product_name,
            p.product_price AS product_price,
            p.product_img AS product_img,
            ps.size AS product_size,
            oi.quantity
        FROM
            Orders o
        JOIN
            Guests g ON o.guest_id = g.guest_id
        JOIN
            Order_Items oi ON o.order_id = oi.order_id
        JOIN
            Products p ON oi.product_id = p.product_id
        JOIN
            Product_sizes ps ON p.product_size_id = ps.product_size_id
        WHERE o.order_id = :order_id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':order_id', $order_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getOrderGuestByID($order_id){
        $db = DB::getInstance();
        $query = "SELECT o.*, g.guest_name, g.guest_address, g.guest_phone, g.guest_email FROM orders o JOIN guests g ON o.guest_id = g.guest_id WHERE order_id = :order_id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':order_id', $order_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function searchOrder($search_query)
    {
        $db = DB::getInstance();
        $query = "SELECT o.*, g.guest_name, g.guest_address, g.guest_phone, g.guest_email FROM orders o JOIN guests g ON o.guest_id = g.guest_id
                  WHERE o.order_id = :search_query";
    
        $stmt = $db->prepare($query);
        $stmt->bindValue(':search_query', "$search_query", PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function createGuestOrder($guest_id, $total_amount, $items) {
        try {
            $db = DB::getInstance();
            $db->beginTransaction();
    
            // Define the order date (you can use the current date and time)
            $order_date = date('Y-m-d H:i:s'); // Example format, adjust as needed
    
            $insertOrderQuery = "INSERT INTO orders (guest_id, order_date, total_amount) VALUES (:guest_id, :order_date, :total_amount)";
            $orderStmt = $db->prepare($insertOrderQuery);
            $orderStmt->bindParam(':guest_id', $guest_id);
            $orderStmt->bindParam(':order_date', $order_date); // Bind the order date
            $orderStmt->bindParam(':total_amount', $total_amount);
            $orderStmt->execute();
    
            $order_id = $db->lastInsertId();
    
            $insertItemQuery = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)";
            $itemStmt = $db->prepare($insertItemQuery);
    
            foreach ($items as $item) {
                $itemStmt->bindParam(':order_id', $order_id);
                $itemStmt->bindParam(':product_id', $item['product_id']);
                $itemStmt->bindParam(':quantity', $item['product_quantity']);
                $itemStmt->execute();
            
                // Update product quantity
                $updateQuantityQuery = "UPDATE products SET product_quantity = product_quantity - :product_quantity WHERE product_id = :product_id";
                $updateQuantityStmt = $db->prepare($updateQuantityQuery);
                $updateQuantityStmt->bindParam(':product_quantity', $item['product_quantity'], PDO::PARAM_INT); // Explicitly set the data type
                $updateQuantityStmt->bindParam(':product_id', $item['product_id'], PDO::PARAM_INT); // Explicitly set the data type
                $updateQuantityStmt->execute();
            }
            
    
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollBack();
            return false;
        }
    }

}

?>