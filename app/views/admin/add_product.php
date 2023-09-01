
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
                        <h3 class="text-themecolor">Add Product</h3>

                    </div>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <form class="row g-3" action='?controller=product&action=add' method='POST' enctype="multipart/form-data" >
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="name" name="product_name" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Price</label>
                        <input type="text" name="product_price" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Quantity</label>
                        <input type="number" name="product_quantity" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Size</label>
                        <select id="inputState" name="product_size" class="form-select">
                        <option selected>Choose size</option>
                        <?php
                            foreach ($sizes as $size) {
                        ?>
                                <option value = "<?php echo $size['product_size_id'] ?>"><?php echo $size['size'] ?></option>
                        <?php        
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Category</label>
                        <select id="inputState"  name="category_name" class="form-select">
                            <option selected>Choose category</option>
                        <?php
                            foreach ($categories as $category) {
                        ?>
                                <option value = '<?php echo $category['category_id'] ?>'><?php echo $category['category_name'] ?></option>
                        <?php        
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Image</label>
                        <input type="file" name = "uploadfile" class="form-control" id="inputPassword4">

                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Description</label>
                        <textarea name="product_desc" id="" cols="160" rows="5"></textarea>
                    </div>

                    <div class="col-12">
                    <input type="submit" class="waves-effect waves-light btn-info hidden-md-down text-white" value="Add Product" />

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
