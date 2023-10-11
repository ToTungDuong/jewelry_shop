<?php
require_once('app/controllers/base_controller.php');
require_once('app/models/product.php');

class CartController extends BaseController{
    private $productModel;
    public function __construct()
    {
        $this->folder = 'user';
        $this->productModel = new Product();
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $errors = [];
            $alerts = [];
            $product_id = $_GET['id'];
            $product_img = $_POST['product_img'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_size = $_POST['product_size'];
            $product_quantity = $_POST['product_quantity'];
            $dataProduct = $this->productModel->getProductById($product_id);
            $quantityProduct = $dataProduct['product_quantity'];

            if($product_quantity > $quantityProduct){
                $errors[] = 'Product quantity is not enought!';
            }
            else if($product_size == 'Size: I need a ring sizer kit' || $product_quantity == null){
                $errors[] = 'Please choose size and quantity!';
            }

            else if (isset($_SESSION['cart'])) {
                $found = false;
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['product_id'] === $product_id && $item['product_size'] === $product_size) {
                        // Update quantity if same item and size is already in cart
                        $item['product_quantity'] += $product_quantity;
                        $found = true;

                        break;
                    }
                }
    
                if (!$found) {
                    // Add the item to the cart if not found with the same size
                    $data = array(
                        'product_id' => $product_id,
                        'product_img' => $product_img,
                        'product_name' => $product_name,
                        'product_price' => $product_price,
                        'product_size' => $product_size,
                        'product_quantity' => $product_quantity
                    );
                    $alerts[] = 'Product has been added to cart!';

                    $_SESSION['cart'][] = $data;

                }
            } else {
                // Cart is empty, add the item
                $data = array(
                    'product_id' => $product_id,
                    'product_img' => $product_img,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_size' => $product_size,
                    'product_quantity' => $product_quantity
                );
                $_SESSION['cart'][] = $data;
            }

            $data = ['errors' => $errors];

            $this->render('cart', $data);
            if($errors == []){
                echo '<script>showSuccessMessage("Item added successfully.");</script>';
              }
        }
    }

    public function checkOut(){
        session_start();
        $customer_id = $_SESSION['userLoginStatus'];
        $errors = []; // Initialize $errors array
    
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $items = $_SESSION['cart'];
            $total_amount = 0;
    
            foreach ($items as $item) {
                $total_amount += $item['product_quantity'] * $item['product_price'];
            }
    
            // Assuming that $this->productModel->createOrder() returns a boolean
            $success = $this->productModel->createOrder($customer_id, $total_amount, $items);
    
            if ($success) {
                // Order created successfully, unset the cart
                unset($_SESSION['cart']);
                $this->render('paynow');
                return; // Stop further execution
            } else {
                $errors[] = 'Failed to create the order';
            }
        } else {
            $errors[] = 'Cart is empty';
        }
    
        // Display errors and return to the cart page
        $data = ['errors' => $errors];
        $this->render('cart', $data);
    }
    
    

    public function removeFromCart(){
        session_start();
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($product['product_id'] === $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        }
        $this->render('cart');
        echo '<script>showSuccessMessage("Product remove successfully.");</script>';
    }
}
?>