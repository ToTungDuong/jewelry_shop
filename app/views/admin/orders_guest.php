
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
                        <h3 class="text-themecolor">List Order Guest</h3>
                    </div>

                </div>

                <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">
                            <form action="?controller=orderguest&action=search" class="d-flex" method="POST">
                                <div class="input-group rounded mt-2">
                                    <input type="text" class="form-control rounded" name="search_query" placeholder="Search by id order" aria-label="Search" aria-describedby="search-addon" />

                                </div>
                                <button type="submit" class="btn btn-info mt-2 text-light">Search</button>
                            </form>

                                <div class="table-responsive mt-3 ">
                                    <table class="table vm no-th-brd pro-of-month">
                                        <thead>
                                            <tr>
                                                <!-- colspan = '2' - chieu rong cua cot -->
                                                <th>ID</th>
                                                <th>Guest Name</th>
                                                <th>Total</th>
                                                <th>Date</th>
                                                <th>Status</th> 
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            foreach($listOrders as $order){
                                        ?>
                                                <tr>
                                                <td><?= $order['order_id'] ?></td>
                                                <td>
                                                    <h6><?= $order['guest_name'] ?></h6>
                                                </td>
                                                <td>$<?= $order['total_amount'] ?></td>
                                                <td><?= $order['order_date'] ?></td>
                                                <td><?= $order['order_status'] ?></td>
                                                
                                                <td>
                                                <a href="?controller=orderguest&action=detailOrder&order_id=<?= $order['order_id'] ?>" class="btn waves-effect waves-light btn btn-info pull-right text-white"> Detail </a></td>
                                                </tr>
                                        <?php        
                                            }
                                        ?>
                                        </tbody>

                                    </table>
                                    <div>
                                    <?php
                                        if (isset($_GET['page'])) {
                                        ?>
                                            Page : <?php echo $_GET['page'] ?>
                                        <?php
                                        }
                                        else {
                                        ?>
                                            Page : 1
                                        <?php
                                        }
                                    ?>
                                        <div>
                                            Move in :
                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                <a href="?controller=order&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                <?php endfor; ?>
                                        </div>
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
