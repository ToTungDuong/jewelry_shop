
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
                    

                    <div class="col-md-7 align-self-center">
                        <a href="?controller=category&action=viewAdd"
                            class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Add </a>
                    </div>
                </div>

                <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">

                                <div class="table-responsive mt-3 ">
                                    <table class="table vm no-th-brd pro-of-month">
                                        <thead>
                                            <tr>
                                                <!-- colspan = '2' - chieu rong cua cot -->
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($rows as $category) {
                                            ?>
                                            <tr>
                                                <td><?php echo $category['category_id'] ?></td>
                                                <td style="width:50px; height:50px;"><img class = 'img-fluid' src="public/images/categories/<?php echo $category['category_img'] ?>" alt=""></td>
                                                <td>
                                                    <h6><?php echo $category['category_name'] ?></h6>
                                                </td>
                                                <td>
                                                    <a class = 'mx-1' href="?controller=category&action=viewEdit&id=<?= $category['category_id'] ?>"><img src="public/admin-wrap-lite-master/assets/images/pencil-square.png" alt=""></a>
                                                    <a class='mx-1' href="#" onclick="confirmDeleteCategory(<?php echo $category['category_id']; ?>)">
                                            <img src="public/admin-wrap-lite-master/assets/images/trash.png" alt="">
                                        </a>
                                                </td>
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
                                            <a href="?controller=category&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
