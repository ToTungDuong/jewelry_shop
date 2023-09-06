
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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">List Product</h3>

                    </div>
                    <div class="col-md-7 align-self-center">
                        <a href="?controller=product&action=viewAdd"
                            class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Add </a>
                    </div>
                </div>

                <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Sort By : </h5>
                                    </div>
                                    <a class = "ms-2" href="?controller=product&action=sortPriceDesc"> Price: Max - Min |</a>
                                    <a class = "ms-2" href="?controller=product&action=sortPriceAsc"> Price: Min - Max |</a>


                                </div>
                                <div class="table-responsive mt-3 ">
                                    <table class="table vm no-th-brd pro-of-month">
                                        <thead>
                                            <tr>
                                                <!-- colspan = '2' - chieu rong cua cot -->
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Desc</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                var_dump($_GET['action']);
                                            ?>
                                            <?php
                                                foreach ($rows as $product) {
                                            ?>
                                            <tr>
                                                <td><?php echo $product['product_id'] ?></td>
                                                <td style="width:50px; height:50px;"><img class = 'img-fluid' src="public/images/products/<?php echo $product['product_img'] ?>" alt=""></td>
                                                <td>
                                                    <h6><?php echo $product['product_name'] ?></h6><small class="text-muted">Size: <?php echo $product['size'] ?></small>
                                                </td>
                                                <td style="word-wrap: break-all;" ><?php echo $product['product_desc'] ?></td>
                                                <td>$<?php echo $product['product_price'] ?></td>
                                                <td><?php echo $product['category_name'] ?></td>
                                                <td><?php echo $product['product_quantity'] ?></td>
                                                <td>
                                                    <a class = 'mx-1' href="?controller=product&action=viewEdit&id=<?= $product['product_id'] ?>"><img src="public/admin-wrap-lite-master/assets/images/pencil-square.png" alt=""></a>
                                                    <a class = 'mx-1' href="?controller=product&action=delete&id=<?= $product['product_id'] ?>"  onclick="return confirm('Are you sure you want to delete?')"><img src="public/admin-wrap-lite-master/assets/images/trash.png" alt=""></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>

                                    <div>
                                        Page :  
                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <?php if ($_GET['action'] == 'sortPriceDesc'): ?>
                                                <a href="?controller=product&action=sortPriceDesc&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            <?php else: ?>
                                                <a href="?controller=product&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
