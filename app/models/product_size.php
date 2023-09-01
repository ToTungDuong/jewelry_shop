<?php

class ProductSize{
    public function all()
    {
      $db = DB::getInstance();
      $query = 'SELECT * FROM product_sizes';
      $stmt = $db->prepare($query);
      $stmt->execute();
      $listSize = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $listSize;
    }
}

?>