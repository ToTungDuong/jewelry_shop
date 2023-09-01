<?php
require_once('../../models/customer.php');
require_once('../../../connection.php');
    if (isset($_GET['token'])) {

    $token = $_GET['token'];
    $customerModel = new Customer();
    $customer = $customerModel->getCustomerByToken($token);

    if ($customer) {
        // Token is valid, mark user as confirmed and remove the token
        $customerModel->updateToken($customer['customer_id'], null);
        $confirmationMessage = 'Registration confirmed successfully. You can now log in using your credentials.';
    } else {
        $confirmationMessage = 'Invalid token. Please check the link or contact support.';
    }
} else {
    $confirmationMessage = 'No token provided. Please check the link.';
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/template_jewelry_shop/src/main.css" />
    <link rel="stylesheet" href="../../../public/template_jewelry_shop/src/css/index.css" />
    <link rel="stylesheet" href="../../../public/template_jewelry_shop/src/css/loginandsignup.css" />
    <script src="bootstrap.bundle.min.js"></script>
    <title>Ella Jewelry</title>
  </head>
    <body class="bg_2">
        <div class="header">
                <div class="alert_top alert bg_1">
                <div class="container">
                    <div class="row text-light">
                    <div class="d-flex justify-content-center">
                        <a href="#">
                            <img src="../../../public/template_jewelry_shop/img/logo_light.png" class="img-fluid" alt="" />
                        </a>
                    </div>
                </div>
                </div>   
            </div>
        </div>
        <div class="notice-box container">
            <p class="alert alert-success"><?php echo $confirmationMessage; ?></p>
            <a href="../../..?controller=auth&action=viewLogin" class="login-link text_color_title py-3">Login now</a>
        </div>
  </body>
</html>
