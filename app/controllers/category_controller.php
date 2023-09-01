<?php
require_once('app/controllers/base_controller.php');
require_once('app/models/category.php');

class CategoryController extends BaseController
{
    private $categoryModel;

    function __construct()
    {
      $this->folder = 'admin';
      $this->categoryModel = new Category();
    
  
    }

    public function index()
    {   $categories = $this->categoryModel->all();
        $data = array('categories' => $categories);
        $this->renderAdmin('categories', $data);
    }

    public function viewAdd()
    {
        $this->renderAdmin('add_category');
    }

    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $category_name = $_POST['category_name'];
            $this->categoryModel->addCategory($category_name);
            $this->viewAdd();
        }
    }

    public function viewEdit()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoryByID = $this->categoryModel->getCategoryByID($id);
            $data = ['categoryByID' => $categoryByID];
            $this->renderAdmin('edit_category', $data);
        }
    }

    public function update()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['category_id'];
            $category_name = $_POST['category_name'];
            $this->categoryModel->update($id, $category_name);
            $this->index();
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $this->categoryModel->deleteCategory($id);
          $this->index();
        }
      }


}

?>