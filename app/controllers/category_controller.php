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
      $this->categories = $this->categoryModel->all();
  
    }

    public function index($page)
    {
        $limit = 10; 
        $start = ($page - 1) * $limit;
        $totalRows = $this->categoryModel->getTotalRows();
        $rows = $this->categoryModel->getRows($start, $limit);
        $totalPages = ceil($totalRows / $limit);
    
        $data = array('rows' => $rows, 'totalPages' => $totalPages);
        $this->renderAdmin('categories', $data);
    }

    public function viewAdd()
    {
        $this->renderAdmin('add_category');
    }

    public function add()
    {
        $errors = [];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "public/images/categories/" . $filename;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $category_name = $_POST['category_name'];
            if(empty($category_name) || empty($filename)){
                $errors[] = "Input can't empty";
            }else{
                $this->categoryModel->addCategory($category_name, $filename);
                move_uploaded_file($tempname, $folder);
            }
        }
        $data = array( 'errors' => $errors);
        $this->renderAdmin('add_category', $data);
      echo '<script>showSuccessMessage("Category inserted successfully.");</script>';

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
        $alerts = []; 
        $errors = [];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "public/images/categories/" . $filename;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['category_id'];
            $category_name = $_POST['category_name'];
            if($filename){
                $this->categoryModel->update($id, $category_name, $filename);
                move_uploaded_file($tempname, $folder);
            }else{
                $this->categoryModel->updateWithoutImg($id, $category_name);

            }
            
            $categoryByID = $this->categoryModel->getCategoryByID($id);
            $data = array('categoryByID' => $categoryByID, 'alerts' => $alerts, 'errors' => $errors);
        }
        $this->renderAdmin('edit_category', $data );
      echo '<script>showSuccessMessage("Category updated successfully.");</script>';

    }

    public function delete(){
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $this->categoryModel->deleteCategory($id);
          if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = (int)$_GET['page'];
          } else {
              $page = 1; // Default to page 1 if 'page' is not set or not numeric
          }
    
          $this->index($page);
      echo '<script>showSuccessMessage("Category deleted successfully.");</script>';
        }
      }
}
?>