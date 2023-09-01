<?php

class Category{
    public function all()
    {
      $db = DB::getInstance();
      $query = 'SELECT * FROM categories';
      $stmt = $db->prepare($query);
      $stmt->execute();
      $listCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $listCategory;
    }

    public function addCategory($category_name)
    {
      $db = DB::getInstance();
      $query = "INSERT INTO categories(category_name) VALUES (:category_name)";
      $stmt = $db->prepare($query);
      $stmt->bindParam(':category_name', $category_name);
      $stmt->execute();
    }

    public function getCategoryByID($category_id)
    {
      $db = DB::getInstance();
      $query = "SELECT category_id , category_name FROM categories WHERE category_id = :category_id";
      $stmt = $db->prepare($query);
      $stmt->bindValue(':category_id', $category_id);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $result;
    }

    public function update($category_id, $category_name)
    {
      $db = DB::getInstance();
      $query = 'UPDATE categories SET category_name = :category_name WHERE category_id = :category_id';
      $stmt = $db->prepare($query);
      $stmt->bindValue(':category_id', $category_id);
      $stmt->bindValue(':category_name', $category_name);
      $stmt->execute();
    }

    public function deleteCategory($category_id)
    {
      $db = DB::getInstance();
      $query = 'DELETE FROM categories WHERE category_id = :category_id';
      $stmt = $db->prepare($query);
      $stmt->bindParam(':category_id', $category_id);
      $stmt->execute();
    }
}

?>