
<?php
class Product
{
  
  public function all()
  {
    $db = DB::getInstance();
    $query = 'SELECT p.*, c.category_name, s.size
    FROM Products p
    JOIN Categories c ON p.category_id = c.category_id
    JOIN product_sizes s ON p.product_size_id = s.product_size_id';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $productList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productList;
  }
  
  public function addProduct($product_name, $product_size_id, $product_desc, $product_price, $product_img, $category_id, $product_quantity){
    $db = DB::getInstance();  
    $query ='INSERT INTO products (product_name, product_size_id, product_desc, product_price, product_img, category_id, product_quantity) VALUES (:product_name, :product_size_id, :product_desc, :product_price, :product_img, :category_id, :product_quantity)';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':product_size_id', $product_size_id);
    $stmt->bindParam(':product_desc', $product_desc);
    $stmt->bindParam(':product_price', $product_price);
    $stmt->bindParam(':product_img', $product_img);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':product_quantity', $product_quantity);
    $stmt->execute();
  }
  
  public function update($product_id, $product_name, $product_size_id, $product_desc, $product_price, $product_img, $category_id, $product_quantity)
  {
    $db = DB::getInstance();
    $query = 'UPDATE products SET product_name = :product_name, product_size_id = :product_size_id, product_desc = :product_desc, product_price = :product_price, product_img = :product_img, category_id = :category_id, product_quantity = :product_quantity WHERE product_id = :product_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':product_id', $product_id);
    $stmt->bindValue(':product_name', $product_name);
    $stmt->bindValue(':product_size_id', $product_size_id);
    $stmt->bindValue(':product_desc', $product_desc);
    $stmt->bindValue(':product_price', $product_price);
    $stmt->bindValue(':product_img', $product_img);
    $stmt->bindValue(':category_id', $category_id); 
    $stmt->bindValue(':product_quantity', $product_quantity);
    $stmt->execute();
  }
  
  public function updateWithOutImg($product_id, $product_name, $product_size_id, $product_desc, $product_price, $category_id, $product_quantity)
  {
    $db = DB::getInstance();
    $query = 'UPDATE products SET product_name = :product_name, product_size_id = :product_size_id, product_desc = :product_desc, product_price = :product_price, category_id = :category_id, product_quantity = :product_quantity WHERE product_id = :product_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':product_id', $product_id);
    $stmt->bindValue(':product_name', $product_name);
    $stmt->bindValue(':product_size_id', $product_size_id);
    $stmt->bindValue(':product_desc', $product_desc);
    $stmt->bindValue(':product_price', $product_price);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->bindValue(':product_quantity', $product_quantity);
    $stmt->execute();
  }
  
  public function deleteProduct($product_id)
  {
    $db = DB::getInstance();
    $query = 'DELETE FROM products WHERE product_id = :product_id';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
  }

  public function getProductById($product_id)
  {
    $db = DB::getInstance();
    $query = 'SELECT p.*, c.category_name, s.size
    FROM Products p
    JOIN Categories c ON p.category_id = c.category_id
    JOIN product_sizes s ON p.product_size_id = s.product_size_id
    WHERE p.product_id = :product_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':product_id', $product_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
  }

  public function getProductByCategory($category_id){
    $db = DB::getInstance();
    $query = 'SELECT p.*, c.category_name
    FROM Products p
    JOIN Categories c ON p.category_id = c.category_id
    WHERE p.category_id = :category_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getCategoryName($category_id){
    $db = DB::getInstance();
    $query = 'SELECT category_name FROM categories WHERE category_id = :category_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue('category_id', $category_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    echo 'ok';
  }

  public function getTopRing ()
  {
    $db = DB::getInstance();
    $query = 'SELECT * FROM products WHERE category_id = 2 ORDER BY product_id LIMIT 4';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $listTopRing = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $listTopRing;
  }

  public function getTopBracelet ()
  {
    $db = DB::getInstance();
    $query = 'SELECT * FROM products WHERE category_id = 3 ORDER BY product_id LIMIT 4';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $listTopBracelet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $listTopBracelet;
  }

  public function getTopEarring ()
  {
    $db = DB::getInstance();
    $query = 'SELECT * FROM products WHERE category_id = 4 ORDER BY product_id LIMIT 4';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $listTopEarring = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $listTopEarring;
  }

  static function getNewArrivals ()
  {
    $db = DB::getInstance();
    $query = 'SELECT p.*
    FROM products p
    JOIN (
        SELECT category_id, MAX(product_id) AS latest_product_id
        FROM products
        GROUP BY category_id
    ) latest
    ON p.category_id = latest.category_id AND p.product_id = latest.latest_product_id';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $listNewArrivals = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $listNewArrivals;
  }

  public function createOrder($customer_id, $total_amount, $items) {
    try {
        $db = DB::getInstance();
        $db->beginTransaction();

        $insertOrderQuery = "INSERT INTO orders (customer_id, order_date, total_amount) VALUES (:customer_id, :order_date, :total_amount)";
        $orderStmt = $db->prepare($insertOrderQuery);
        $orderStmt->bindParam(':customer_id', $customer_id);
        $orderStmt->bindParam(':order_date', $order_date);
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
            $updateQuantityStmt->bindParam(':product_quantity', $item['product_quantity']);
            $updateQuantityStmt->bindParam(':product_id', $item['product_id']);
            $updateQuantityStmt->execute();
        }

        $db->commit();
        return true;
    } catch (PDOException $e) {
        $db->rollBack();
        return false;
    }
  }

  public function getTotalRows(){
    $db = DB::getInstance();
    $query = "SELECT COUNT(*) as total FROM products";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }


  public function getTotalRowsByCategory($category_id){
    $db = DB::getInstance();
    $query = "SELECT COUNT(*) as total FROM products WHERE category_id = :category_id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }

  // public function getProductByCategory($category_id){
  //   $db = DB::getInstance();
  //   $query = 'SELECT p.*, c.category_name
  //   FROM Products p
  //   JOIN Categories c ON p.category_id = c.category_id
  //   WHERE p.category_id = :category_id';
  //   $stmt = $db->prepare($query);
  //   $stmt->bindValue(':category_id', $category_id);
  //   $stmt->execute();
  //   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //   return $result;
  // }

  public function getRows($start, $limit){
    $db = DB::getInstance();
    $query = "SELECT p.*, c.category_name, s.size
    FROM Products p
    JOIN Categories c ON p.category_id = c.category_id
    JOIN product_sizes s ON p.product_size_id = s.product_size_id
    LIMIT $start, $limit";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  
  public function getRowsByCategory($category_id, $start, $limit){
    $db = DB::getInstance();
    $query = "SELECT p.*, c.category_name
    FROM Products p
    JOIN Categories c ON p.category_id = c.category_id
    WHERE p.category_id = :category_id
    LIMIT $start, $limit";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getProductsByPriceDesc($start, $limit) {
    $db = DB::getInstance();
    $query = "SELECT p.*, c.category_name, s.size
    FROM Products p
    JOIN Categories c ON p.category_id = c.category_id
    JOIN product_sizes s ON p.product_size_id = s.product_size_id ORDER BY product_price DESC LIMIT $start, $limit";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  
  public function getProductsByPriceAsc($start, $limit) {
    $db = DB::getInstance();
    $query = "SELECT p.*, c.category_name, s.size
    FROM Products p
    JOIN Categories c ON p.category_id = c.category_id
    JOIN product_sizes s ON p.product_size_id = s.product_size_id ORDER BY product_price ASC LIMIT $start, $limit";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
