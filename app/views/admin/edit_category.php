
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
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <form class="row g-3" action='?controller=category&action=update' method='POST' enctype="multipart/form-data" >
                        <input type="hidden" name="category_id" class="form-control" value='<?=  $categoryByID['category_id'] ?>'>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="name" name="category_name" class="form-control" value='<?=  $categoryByID['category_name'] ?>'>
                    </div>

                    <div class="col-12">
                    <input onclick="return confirm('Are you sure you want to save?')" type="submit" class="waves-effect waves-light btn-info hidden-md-down text-white" value="Save" />

                    </div>
                </form>
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
