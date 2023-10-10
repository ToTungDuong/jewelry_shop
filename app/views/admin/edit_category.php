<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Edit Category</h3>

        </div>
        <?php if (!empty($alerts)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" >
                <ul>
                <?php foreach ($alerts as $alert): ?>
                    <li><?php echo $alert; ?></li>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <form id = "updateCategoryForm" class="row g-3" action='?controller=category&action=update' method='POST' enctype="multipart/form-data">
            <input type="hidden" name="category_id" class="form-control" value='<?= $categoryByID['category_id'] ?>'>
            <div class="col-3">
                <label for="inputAddress" class="form-label">Image Old</label>
                <img class='img-fluid' src="public/images/products/<?= $categoryByID['category_img'] ?>" alt="">
            </div>
            <div class="col-3">
                <label for="inputAddress" class="form-label">Image</label>
                <input type="file" name = "uploadfile" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="name" name="category_name" class="form-control"
                    value='<?= $categoryByID['category_name'] ?>'>
            </div>


        </form>
        <button onclick="confirmUpdateCategory(<?php echo $categoryByID['category_id']; ?>)" class="waves-effect waves-light btn-info hidden-md-down text-white">Save</button>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2021 Adminwrap by <a href="https://www.wrappixel.com/">wrappixel.com</a> </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script>
    function confirmUpdateCategory(categoryId) {
        showConfirmation("Are you sure you want to update this category?", function() {
            // Execute the update category action here, e.g., submit a form
            document.querySelector('#updateCategoryForm').submit(); // Replace with your form ID
        });
    }
</script>