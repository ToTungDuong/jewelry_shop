
<?php
$controllers = array(
  'home' => ['index', 'viewCart','viewProduct', 'viewProductDetails','viewOrder', 'detailOrder','error'],
  'auth' => ['login','viewLogin','viewSignUp','logout','signup','error'],
  'admin' => ['index', 'logout'],
  'product' => ['index', 'viewAdd', 'add', 'delete', 'remove', 'viewEdit', 'update', 'sortPriceDesc', 'sortPriceAsc', 'search'],
  'category' => ['index', 'viewAdd', 'add', 'viewEdit', 'update', 'delete'],
  'cart' => ['addToCart', 'removeFromCart', 'checkOut'],
  'order' => ['index', 'confirm', 'cancel', 'detailOrder', 'search'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'home';
  $action = 'error';
}


// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('app/controllers/' . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$controller->$action($page);
