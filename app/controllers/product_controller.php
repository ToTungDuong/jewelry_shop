
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

  function __construct()
  {
    $this->folder = 'admin';
    $this->productModel = new Product();
    $this->categoryModel = new Category();
    $this->productSizeModel = new ProductSize();

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
    $products = $this->productModel->all();
    $categories = $this->categoryModel->all();
    $sizes = $this->productSizeModel->all();

    $data = array('products' => $products, 'categories' => $categories, 'sizes' => $sizes);
    $this->renderAdmin('add_product', $data);
  }

  public function add(){
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "public/images/products/" . $filename;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_quantity = $_POST['product_quantity'];
      $product_size = $_POST['product_size'];
      $category_name = $_POST['category_name'];
      $product_desc = $_POST['product_desc'];
      $this->productModel->addProduct($product_name, $product_size, $product_desc, $product_price, $filename, $category_name, $product_quantity);
      move_uploaded_file($tempname, $folder);
      $this->viewAdd();
    }
  }

  public function viewEdit(){
    $categories = $this->categoryModel->all();
    $sizes = $this->productSizeModel->all();
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $productByID = $this->productModel->getProductById($id);
      $data = array('productByID' => $productByID, 'categories' => $categories, 'sizes' => $sizes);
      $this->renderAdmin('edit_product', $data);
    }
  }

  public function update(){
    
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
      $this->index();
      }
  }

  public function delete(){
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $this->productModel->deleteProduct($id);
      $this->index();
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
}
