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
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- Include any necessary HTML structure, head, and navigation here -->

        <div class="container">
            <form action="?controller=product&action=search" class="d-flex" method="POST">
                <div class="input-group rounded mt-2">
                    <input type="text" class="form-control rounded" name="search_query" placeholder="Search by name"
                        aria-label="Search" aria-describedby="search-addon" />

                </div>
                <button type="submit" class="btn btn-info mt-2 text-light">Search</button>
            </form>
            <h2 class="mt-3">Search Results</h2>

            <?php if (empty($search_results)): ?>
            <p>No products found matching your search query.</p>
            <?php else: ?>
            <div class="row mt-3">
                <?php foreach ($search_results as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img height='400' src="public/images/products/<?php echo $product['product_img']; ?>" class="card-img-top"
                            alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                            <p class="card-text text-truncate"><?php echo $product['product_desc']; ?></p>
                            <p class="card-text">Price: $<?php echo $product['product_price']; ?></p>
                            <a class='mx-1'
                                href="?controller=product&action=viewEdit&id=<?= $product['product_id'] ?>"><img
                                    src="public/admin-wrap-lite-master/assets/images/pencil-square.png"
                                    alt=""></a>
                            <a class='mx-1' href="?controller=product&action=delete&id=<?= $product['product_id'] ?>"
                                onclick="return confirm('Are you sure you want to delete?')"><img
                                    src="public/admin-wrap-lite-master/assets/images/trash.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Include any necessary footer or closing tags here -->

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Sales Chart and browser state-->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Sales Chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Projects of the Month -->
    <!-- ============================================================== -->
</div>
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
