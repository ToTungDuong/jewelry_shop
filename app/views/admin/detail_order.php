
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
                        <h3 class="text-themecolor">Detail Order</h3>

                    </div>
                    <div class="col-md-7 align-self-center">
                        <a href="?controller=order&action=index"
                            class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Back </a>
                    </div>
                </div>

                <div class="infor_order">
                    <h5 class = 'fw-bold'>Order ID: <span class = "fw-normal"><?= $orderByID['order_id'] ?></span></h5>
                    <h5 class = 'fw-bold'>Customer Name: <span class = "fw-normal"><?= $orderByID['customer_name'] ?></span></h5>
                    <h5 class = 'fw-bold'>Date Order: <span class = "fw-normal"><?= $orderByID['order_date'] ?></span></h5>
                    <h5 class = 'fw-bold'>Status: <span class = "fw-normal"><?= $orderByID['order_status'] ?></span></h5>

                </div>

                <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Detail Order</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <select class="form-select b-0">
                                            <option selected="">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive mt-3 ">
                                    <table class="table vm no-th-brd pro-of-month">
                                        <thead>
                                            <tr>
                                                <!-- colspan = '2' - chieu rong cua cot -->
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($orderItemByID as $product){
                                        ?>
                                                <tr>
                                                <td><?= $product['product_id'] ?></td>
                                                <td style="width:50px; height:50px;"><img class = 'img-fluid' src="public/images/products/<?php echo $product['product_img'] ?>" alt=""></td>
                                                <td>
                                                    <h6><?= $product['product_name'] ?></h6><small class="text-muted">Size: <?= $product['product_size'] ?></small>
                                                </td>
                                                <td>$<?= $product['product_price'] ?></td>
                                                <td><?= $product['quantity'] ?></td>
                                                <td>$<?php echo number_format($product['product_price'] * $product['quantity'], 2) ?></td>
                                                
                                                </tr>
                                        <?php      
                                            }
                                        ?>
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="py-5 fw-bold">TOTAL BILL : <span>$<?= 
                                                        $orderByID['total_amount']
                                                    ?></span></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                <div>
                                <a href="?controller=order&action=cancel&order_id=<?= $orderByID['order_id']; ?>" class="ms-5 btn waves-effect waves-light btn btn-danger pull-right text-white" onclick="return confirm('Are you sure you want to cancel order?')"> Cancel </a>
                                <a href="?controller=order&action=confirm&order_id=<?= $orderByID['order_id']; ?>"
                                class="btn waves-effect waves-light btn btn-info pull-right text-white" onclick="return confirm('Are you sure you want to confirm order?')"> Confirm </a>
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
