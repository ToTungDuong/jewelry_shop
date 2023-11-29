<?php
require_once('app/controllers/base_controller.php');
require_once('app/controllers/home_controller.php');
require_once('app/controllers/admin_controller.php');

require_once('app/models/customer.php');
require_once('app/models/product.php');
require_once('app/models/category.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


session_start();
class AuthController extends BaseController
{
  function __construct()
  {
    $this->folder = 'auth';
  }
  public function viewLogin(){
    $this->render('login');
  }

  public function login(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $customer_email = $_POST['customer_email'];
      $customer_password = $_POST['customer_password'];
  
      // Perform validation
      $errors = [];
  
      // Check if customer_email is empty and format
      if (empty($customer_email)) {
        $errors[] = 'Email is required.';
      }
      else if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
      }
      // Check if password is empty
      if (empty($customer_password)) {
        $errors[] = 'Password is required.';
      }
      // If there are no validation errors
      if (empty($errors)) {
        // Perform further processing or authentication logic
        $customer = new Customer();
        $customerData = $customer->getCustomerEmail($customer_email);
        $verify_token = $customerData['verify_token'];
        $account_type = $customerData['account_type'];
        if ($customer && password_verify($customer_password, $customerData['customer_password']) && $verify_token == null && $account_type == '1') {
          $_SESSION['userLoginStatus'] = $customerData['customer_id'];
          
        }
        else if ($customer && password_verify($customer_password, $customerData['customer_password']) && $verify_token == null) {
          // Password is correct, set session and redirect to home page or dashboard
          $_SESSION['userLoginStatus'] = $customerData['customer_id'];
        }
        else if($customer && password_verify($customer_password, $customerData['customer_password']) && $verify_token){
          $errors[] = 'Please confirm signup your email.';
          $this->render('login', ['errors' => $errors]);
        }
        else {
          // Invalid credentials
          $errors[] = 'Invalid email or password.';
          $this->render('login', ['errors' => $errors]);
        }
      } else {
        // Validation errors occurred
        $this->render('login', ['errors' => $errors]);
      }
    } 
    $this->routeManager($customer_email);
  }

  public function routeManager($customer_email){
    $customer = new Customer();
    $customerData = $customer->getCustomerEmail($customer_email);
  
    // Check if $customerData is an array before accessing its elements
    if (is_array($customerData) && isset($customerData['account_type'])) {
      $account_type = $customerData['account_type'];
      if (isset($_SESSION['userLoginStatus']) && $account_type =='0') {
        $homeController = new HomeController();
        $homeController->index();
      } else if (isset($_SESSION['userLoginStatus']) && $account_type =='1') {
        $adminController = new AdminController();
        $adminController->index();
      } else {
        $this->render('login');
      }
    } else {
      // Handle the case where $customerData is not an array or 'account_type' is not set
      $this->render('login');
    }
  }
  
  public function viewSignUp(){
    $this->render('signup');
  }

  public function signup(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      //Input user enter 
      $customer_name = $_POST['customer_name'];
      $customer_email = $_POST['customer_email'];
      $customer_address = $_POST['customer_address'];
      $customer_phone = $_POST['customer_phone'];
      $customer_password = $_POST['customer_password'];
      $customer_rpassword = $_POST['customer_rpassword'];
      $customer_password_hash = password_hash($customer_password, PASSWORD_DEFAULT);
      //Get list email customer
      $customer = new Customer();
      $emailData = $customer->getAllEmail();
      //Perform Validate 
      $errors = [];
      $alerts = [];
      //Regex for input
      $regexName = '/^[a-zA-Z\s]+$/u';
      $regexPhone = '/^\d{10}$/';
      // Check if Name is empty and format
      if (empty($customer_name)) {
        $errors[] = 'Name is required.';
      }
      else if(!preg_match($regexName, $customer_name)){
        $errors[] = "Invalid name format";
      }
      // Check if Email is empty and format
      if (empty($customer_email)) {
        $errors[] = 'Email is required.';
      }
      else if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
      }
      else if(in_array($customer_email, $emailData)){
        $errors[] = "Email already exists !";
      }
      if(empty($customer_password)){
        $errors[] = 'Password is required.';
      }
      else if($customer_password != $customer_rpassword){
        $errors[] = 'Password not match.';
      }
      if (empty($customer_phone)) {
        $errors[] = 'Phone number is required.';
      }
      else if(!preg_match($regexPhone, $customer_phone)){
        $errors[] = "Invalid phone number format";
      }


      if(empty($errors)){
        $customer = new Customer();
        $customer->signUp($customer_name, $customer_email, $customer_password_hash, $customer_address, $customer_phone);
        $customerData = $customer->getCustomerEmail($customer_email);
        $verify_token = $customerData['verify_token'];
        // SMTP configuration
        $subject = "Confirm Registration ( Jewelry Shop )";
        $message = "Hello $customer_name,\r\n";
        $message .= "Thank you for registering at our website.\r\n";
        $message .= "Please click the following link to confirm your registration:\r\n";
        $message .= "http://localhost/jewelry_shop/app/views/auth/confirm.php?token=$verify_token";
        // $message .= "https://tungduongsite.id.vn/app/views/auth/confirm.php?token=$verify_token";
        
        // host
        // $message .= "https://ellajewelryshop.000webhostapp/app/views/auth/confirm.php?token=$verify_token";

        $headers = "From: your_email@example.com";
  
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls'; // Use 'ssl' if your server requires SSL instead of TLS
        $mail->SMTPAuth = true;
        $mail->Username = 'tod25504@gmail.com'; // Replace with your Gmail username
        $mail->Password = 'okluuhziccrxwpal'; // Replace with your Gmail password
        $mail->setFrom('tod25504@gmail.com'); // Replace with your Gmail username
        $mail->addAddress($customer_email); // Recipient email address
        $mail->Subject = $subject;
        $mail->Body = $message;
  
        if ($mail->send()) {
            $alerts[] = 'Signup successfully. Please check your email to verify account !';
        } else {
            // Failed to send email
            $alerts[] = 'Failed to send confirmation email. Please try again later.';
        }
        // Redirect to a success page or display a success message
        // header('Location: success.php');
        // exit();
      // $this->render('login');
      }
      $this->render('signup', ['errors' => $errors, 'alerts' => $alerts]);

  }
  }



  public function logout(){
    unset($_SESSION['userLoginStatus']);
    $this->render('login');
  }
}
?>