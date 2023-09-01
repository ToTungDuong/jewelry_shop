
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
                        <h3 class="text-themecolor">List Category</h3>

                    </div>
                    <div class="col-md-7 align-self-center">
                        <a href="?controller=category&action=viewAdd"
                            class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Add </a>
                    </div>
                </div>

                <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Projects of the Month</h5>
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
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($categories as $category) {
                                            ?>
                                            <tr>
                                                <td><?php echo $category['category_id'] ?></td>

                                                <td>
                                                    <h6><?php echo $category['category_name'] ?></h6>
                                                </td>
                                                <td>
                                                    <a class = 'mx-1' href="?controller=category&action=viewEdit&id=<?= $category['category_id'] ?>"><img src="public/admin-wrap-lite-master/assets/images/pencil-square.png" alt=""></a>
                                                    <a class = 'mx-1' href="?controller=category&action=delete&id=<?= $category['category_id'] ?>"  onclick="return confirm('Are you sure you want to delete?')"><img src="public/admin-wrap-lite-master/assets/images/trash.png" alt=""></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>

                                    </table>
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
