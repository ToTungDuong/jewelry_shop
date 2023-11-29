<?php
require_once('app/controllers/base_controller.php');
require_once('app/models/product.php');
require_once('app/models/category.php');
require_once('app/models/product_size.php');
require_once('app/models/order.php');
require_once('app/models/guest.php');



class OrderController extends BaseController{
    private $orderModel;
    function __construct(){
        $this->folder = 'admin';
        $this->orderModel = new Order();
        $this->guestModel = new Guest();


    }

    public function index($page){
        $limit = 10; 
        $start = ($page - 1) * $limit;
        $totalOrders = $this->orderModel->getTotalOrders();
        $listOrders = $this->orderModel->getListOrders($start, $limit);
        $totalPages = ceil($totalOrders/$limit);
        $data = array('listOrders' => $listOrders, 'totalPages' => $totalPages);
        $this->renderAdmin('orders', $data);
    }

    public function confirm($page){
        if(isset($_GET['order_id'])){
            $order_id = $_GET['order_id'];
            $this->orderModel->confirmOrder($order_id);
        }
        $limit = 10; 
        $start = ($page - 1) * $limit;
        $totalOrders = $this->orderModel->getTotalOrders();
        $listOrders = $this->orderModel->getListOrders($start, $limit);
        $totalPages = ceil($totalOrders/$limit);
        $data = array('listOrders' => $listOrders, 'totalPages' => $totalPages);
        $this->renderAdmin('orders', $data);
      echo '<script>showSuccessMessage("Order confirmed successfully.");</script>';

    }

    public function cancel($page) {
        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            $this->orderModel->cancelOrder($order_id);
        }
        $limit = 10; 
        $start = ($page - 1) * $limit;
        $totalOrders = $this->orderModel->getTotalOrders();
        $listOrders = $this->orderModel->getListOrders($start, $limit);
        $totalPages = ceil($totalOrders/$limit);
        $data = array('listOrders' => $listOrders, 'totalPages' => $totalPages);
        $this->renderAdmin('orders', $data);
      echo '<script>showSuccessMessage("Order canceled successfully.");</script>';

    }

    public function detailOrder(){
        if(isset($_GET['order_id'])){
            $order_id = $_GET['order_id'];
            $orderItemByID = $this->orderModel->getOrderItemByID($order_id);
            $orderByID = $this->orderModel->getOrderByID($order_id);
            $data = array('orderItemByID' => $orderItemByID, 'orderByID' => $orderByID);
            $this->renderAdmin('detail_order', $data);
        }
    }
    public function search()
    {
        $search_query = $_POST['search_query'];
    
        // Perform a database query to search for products by name
        $search_results = $this->orderModel->searchOrder($search_query);
    
        // Pass the search results to the view
        $data = array('search_results' => $search_results);
    
        // Render a view to display the search results
        $this->renderAdmin('search_orders', $data);
    }


}



?>