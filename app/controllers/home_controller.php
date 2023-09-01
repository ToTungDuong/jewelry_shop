
<?php
require_once('app/controllers/base_controller.php');
require_once('app/models/product.php');
require_once('app/models/category.php');
require_once('app/models/product_size.php');
require_once('app/models/order.php');



class HomeController extends BaseController
{
  private $productModel;
  private $categoryModel;
  private $productSizeModel;
  private $orderModel;


  
  function __construct()
  {
    $this->folder = 'user';
    $this->productModel = new Product();
    $this->categoryModel = new Category();
    $this->productSizeModel = new ProductSize();
    $this->orderModel = new Order();


  }

  public function index()
  {
    $products = $this->productModel->all();
    $rings = $this->productModel->getTopRing();
    $bracelets = $this->productModel->getTopBracelet();
    $earrings = $this->productModel->getTopEarring();
    $categories = $this->categoryModel->all();
    $newarrivals = $this->productModel->getNewArrivals();
    $data = array('products' => $products, 'topofrings' => $rings, 'topofbracelets' => $bracelets, 'topofearrings' =>$earrings, 'categories' =>$categories, 'newarrivals' =>$newarrivals);
    $this->render('index', $data);
  }

  public function viewCart(){
    $this->render('cart');
  }

  public function viewProduct($page){
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $limit = 12; 
      $start = ($page - 1) * $limit;
      $totalRows = $this->productModel->getTotalRowsByCategory($id);
      $rowsByCategory = $this->productModel->getRowsByCategory($id, $start, $limit);
      $totalPages = ceil($totalRows / $limit);
      $categoryName = $this->productModel->getCategoryName($id);
      $data = array('rowsByCategory' => $rowsByCategory, 'categoryName' => $categoryName ,'totalPages' => $totalPages);
      $this->render('product', $data);
    }
  }

  public function viewProductDetails(){
      $sizes = $this->productSizeModel->all();
      if(isset($_GET['id'])){
      $id = $_GET['id'];
      $productByID = $this->productModel->getProductById($id);
      $data = array('productByID' => $productByID, 'sizes' => $sizes);
      $this->render('product_details', $data);
    }

  }

  public function viewOrder(){
    session_start();
    $customer_id = $_SESSION['userLoginStatus'];
    $orders = $this->orderModel->getOrderByCustomerID($customer_id);
    $data = array('orders' => $orders);
    $this->render('order', $data);

  }

  public function detailOrder(){
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $orderItemByID = $this->orderModel->getOrderItemByID($order_id);
        $orderByID = $this->orderModel->getOrderByID($order_id);
        $data = array('orderItemByID' => $orderItemByID, 'orderByID' => $orderByID);
        $this->render('detail_order', $data);
    }
}
  
  public function error()
  {
    $this->render('error');
  }
}
