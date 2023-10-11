
<?php
require_once('app/controllers/base_controller.php');
require_once('app/models/product.php');
require_once('app/models/category.php');
require_once('app/models/product_size.php');




class ProductController extends BaseController
{
  private $productModel;
  private $categoryModel;
  private $productSizeModel;
  private $products; // Class property
  private $categories; // Class property
  private $sizes; // Class property

  function __construct()
  {
      $this->folder = 'admin';
      $this->productModel = new Product();
      $this->categoryModel = new Category();
      $this->productSizeModel = new ProductSize();

      // Initialize the class properties with data
      $this->products = $this->productModel->all();
      $this->categories = $this->categoryModel->all();
      $this->sizes = $this->productSizeModel->all();
  }

  public function index($page)
  { 
    $limit = 10; 
    $start = ($page - 1) * $limit;
    $totalRows = $this->productModel->getTotalRows();
    $rows = $this->productModel->getRows($start, $limit);
    $totalPages = ceil($totalRows / $limit);

    $data = array('rows' => $rows, 'totalPages' => $totalPages);
    $this->renderAdmin('products', $data);
  }

  public function viewAdd()
  {
    $data = array('products' => $this->products, 'categories' => $this->categories, 'sizes' => $this->sizes);
    $this->renderAdmin('add_product', $data);
    
  }

  public function add(){
    $alerts = []; 
    $errors = [];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "public/images/products/" . $filename;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_size = $_POST['product_size'];
        $category_name = $_POST['category_name'];
        $product_desc = $_POST['product_desc'];
        
        if (empty($product_name) || empty($product_price) || empty($product_quantity) || empty($product_size) || empty($category_name) || empty($product_desc)) {
          $errors[] = "Input can't empty !";
        } else {
          $this->productModel->addProduct($product_name, $product_size, $product_desc, $product_price, $filename, $category_name, $product_quantity);
          move_uploaded_file($tempname, $folder);
        }
        
      }
      
      
      // You can return the same view as in viewAdd with the appropriate data
      $data = array('products' => $this->products, 'categories' => $this->categories, 'sizes' => $this->sizes, 'alerts' => $alerts, 'errors' => $errors);
      $this->renderAdmin('add_product', $data);
      if($errors == []){
        echo '<script>showSuccessMessage("Product inserted successfully.");</script>';
      }
    }


  public function viewEdit(){
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $productByID = $this->productModel->getProductById($id);
      $data = array('productByID' => $productByID, 'categories' => $this->categories, 'sizes' => $this->sizes);
      $this->renderAdmin('edit_product', $data);
    }
  }

  public function update(){
    $alerts = []; 
    $errors = [];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "public/images/products/" . $filename;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_quantity = $_POST['product_quantity'];
      $product_size = $_POST['product_size'];
      $category_name = $_POST['category_name'];
      $product_desc = $_POST['product_desc'];
      if($filename){
        $this->productModel->update($id , $product_name, $product_size, $product_desc, $product_price, $filename, $category_name, $product_quantity);
        move_uploaded_file($tempname, $folder);

      }
      else{
        $this->productModel->updateWithOutImg($id, $product_name, $product_size, $product_desc, $product_price, $category_name, $product_quantity);
      }
      if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = (int)$_GET['page'];
      } else {
          $page = 1; // Default to page 1 if 'page' is not set or not numeric
      }
      $this->index($page);
      echo '<script>showSuccessMessage("Product updated successfully.");</script>';
      }
  }

  public function delete(){
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $this->productModel->deleteProduct($id);
      if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = (int)$_GET['page'];
      } else {
          $page = 1; // Default to page 1 if 'page' is not set or not numeric
      }

      $this->index($page);
      echo '<script>showSuccessMessage("Product deleted successfully.");</script>';
    }
  }

  public function sortPriceDesc($page){
    $limit = 10; 
    $start = ($page - 1) * $limit;
    $totalRows = $this->productModel->getTotalRows();
    $rows = $this->productModel->getProductsByPriceDesc($start, $limit);
    $totalPages = ceil($totalRows / $limit);

    $data = array('rows' => $rows, 'totalPages' => $totalPages);
    $this->renderAdmin('products', $data);
  }

  public function sortPriceAsc($page){
    $limit = 10; 
    $start = ($page - 1) * $limit;
    $totalRows = $this->productModel->getTotalRows();
    $rows = $this->productModel->getProductsByPriceAsc($start, $limit);
    $totalPages = ceil($totalRows / $limit);

    $data = array('rows' => $rows, 'totalPages' => $totalPages);
    $this->renderAdmin('products', $data);
  }

  public function search()
{
    $search_query = $_POST['search_query'];

    // Perform a database query to search for products by name
    $search_results = $this->productModel->searchByName($search_query);

    // Pass the search results to the view
    $data = array('search_results' => $search_results);

    // Render a view to display the search results
    $this->renderAdmin('search_results', $data);
}
}
