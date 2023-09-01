<?php
class Customer{

    public function signUp($customer_name, $customer_email, $customer_password, $customer_address, $customer_phone){
        $db = DB::getInstance();

        $existingUser = $this->getCustomerEmail($customer_email);
        if ($existingUser) {
            
        }
        else{
            $verify_token = bin2hex(random_bytes(16));
            $query = "INSERT INTO customers (customer_name, customer_email, customer_password, customer_address, customer_phone, verify_token) VALUES (:customer_name, :customer_email, :customer_password, :customer_address, :customer_phone, :verify_token)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':customer_name', $customer_name);
            $stmt->bindParam(':customer_email', $customer_email);
            $stmt->bindParam(':customer_password', $customer_password);
            $stmt->bindParam(':customer_address', $customer_address);
            $stmt->bindParam(':customer_phone', $customer_phone);
            $stmt->bindParam(':verify_token', $verify_token);

            $stmt->execute();
        }

    }

    public function getAllEmail(){
        $db = DB::getInstance();
        $query = "SELECT customer_email FROM customers";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $emailList = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $emailList;
    }

    public function getCustomerEmail($customer_email){
        $db = DB::getInstance();
        $query = "SELECT * FROM customers WHERE customer_email = :customer_email";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':customer_email', $customer_email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }

    public function getCustomerByToken($verify_token)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM customers WHERE verify_token = ?");
        $stmt->execute([$verify_token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateToken($customer_id, $verify_token)
    {
        $db = DB::getInstance();    
        $stmt = $db->prepare("UPDATE customers SET verify_token = ? WHERE customer_id = ?");
        $stmt->execute([$verify_token, $customer_id]);
    }
}
?>