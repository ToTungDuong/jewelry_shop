
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
                        <h3 class="text-themecolor">Edit Product</h3>

                    </div>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <form class="row g-3" action='?controller=product&action=update' method='POST' enctype="multipart/form-data" >
                        <input type="hidden" name="product_id" class="form-control" value='<?=  $productByID['product_id'] ?>'>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="name" name="product_name" class="form-control" value='<?=  $productByID['product_name'] ?>'>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Price</label>
                        <input type="text" name="product_price" class="form-control" value='<?=  $productByID['product_price'] ?>'>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Quantity</label>
                        <input type="number" name="product_quantity" class="form-control" value='<?=  $productByID['product_quantity'] ?>'>
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Size</label>
                        <select id="inputState" name="product_size" class="form-select">
                        <?php foreach ($sizes as $size) { ?>
                        <option value="<?= $size['product_size_id'] ?>" <?= $size['size'] == $productByID['size'] ? "selected" : "" ?>>
                            <?= $size['size'] ?>
                        </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Category</label>
                        <select id="inputState"  name="category_name" class="form-select">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['category_id'] ?>" <?= $category['category_name'] == $productByID['category_name'] ? "selected" : "" ?>>
                                <?= $category['category_name'] ?>
                            </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Image Old</label>
                        <img class='img-fluid' src="public/images/products/<?= $productByID['product_img'] ?>" alt="">
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Image</label>
                        <input type="file" name = "uploadfile" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Description</label>
                        <textarea name="product_desc" id="" cols="160" rows="5"><?= $productByID['product_desc'] ?></textarea>
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
