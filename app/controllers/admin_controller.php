
<?php
require_once('app/controllers/base_controller.php');
require_once('app/controllers/auth_controller.php');


class AdminController extends BaseController
{
  function __construct()
  {
    $this->folder = 'admin';
  }

  public function index()
  {
    $this->renderAdmin('index');
  }

  public function logout()
  {
    unset($_SESSION['userLoginStatus']);
    $authController = new AuthController();
    $authController->viewLogin();
  }
}
