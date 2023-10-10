<?php

class Order{
    public function getTotalOrders(){
        $db = DB::getInstance();
        $query = "SELECT COUNT(*) as total FROM orders";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getListOrders($start, $limit){
        $db = DB::getInstance();
        $query ="SELECT o.*, c.customer_name FROM Orders o JOIN Customers c ON o.customer_id = c.customer_id LIMIT $start, $limit";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function cancelOrder($order_id) {
        $db = DB::getInstance();
        $query = "UPDATE orders SET order_status = 'Canceled' WHERE order_id = :order_id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':order_id', $order_id);
        $stmt->execute();
    }
    

    public function confirmOrder($order_id){
        $db = DB::getInstance();
        $query = "UPDATE orders SET order_status = 'Confirmed' WHERE order_id = :order_id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':order_id', $order_id);
        $stmt->execute();
    }

    public function getOrderItemByID($order_id){
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
            Customers c ON o.customer_id = c.customer_id
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

    public function getOrderByID($order_id){
        $db = DB::getInstance();
        $query = "SELECT o.*, c.customer_name, c.customer_address FROM Orders o JOIN Customers c ON o.customer_id = c.customer_id WHERE order_id = :order_id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':order_id', $order_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOrderByCustomerID($customer_id){
        $db = DB::getInstance();
        $query = "SELECT o.*, c.customer_name FROM Orders o JOIN Customers c ON o.customer_id = c.customer_id WHERE c.customer_id = :customer_id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':customer_id', $customer_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}


?>