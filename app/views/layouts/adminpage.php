

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin - Ella Jewelry</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/template_jewelry_shop/img/logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="public/admin-wrap-lite-master/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/admin-wrap-lite-master/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="public/admin-wrap-lite-master/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="public/admin-wrap-lite-master/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="public/admin-wrap-lite-master/html/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="public/admin-wrap-lite-master/html/css/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">

                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <a href="?controller=admin&action=index">
                                <img src="public/template_jewelry_shop/img/logo.png" alt="homepage" class="dark-logo" />
                            </a>
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a
                                    class="srh-btn"><i class="fa fa-times"></i></a></form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                                id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="public/admin-wrap-lite-master/assets/images/users/1.jpg" alt="user" class="" /> <span
                                    class="hidden-md-down">Mark Sanders &nbsp;</span> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <?= @$content ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="?controller=admin&action=index" aria-expanded="false"><i
                                    class="fa fa-tachometer"></i><span class="hide-menu">Home page</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="?controller=product&action=index" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">Products</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="?controller=category&action=index" aria-expanded="false"><i
                                    class="fa fa-table"></i><span class="hide-menu">Categories</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="icon-fontawesome.html" aria-expanded="false"><i
                                    class="fa fa-smile-o"></i><span class="hide-menu">Collections</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i
                                    class="fa fa-globe"></i><span class="hide-menu">Collection Products</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="?controller=order&action=index" aria-expanded="false"><i
                                    class="fa fa-bookmark-o"></i><span class="hide-menu">Orders</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i
                                    class="fa fa-question-circle"></i><span class="hide-menu">Customer</span></a>
                        </li>
                    </ul>
                    <div class="text-center mt-4">
                        <a href="?controller=admin&action=logout"
                            class="btn waves-effect waves-light btn-info hidden-md-down text-white">Log out</a>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="public/admin-wrap-lite-master/assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="public/admin-wrap-lite-master/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="public/admin-wrap-lite-master/html/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="public/admin-wrap-lite-master/html/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="public/admin-wrap-lite-master/html/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="public/admin-wrap-lite-master/html/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="public/admin-wrap-lite-master/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="public/admin-wrap-lite-master/assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="public/admin-wrap-lite-master/assets/node_modules/d3/d3.min.js"></script>
    <script src="public/admin-wrap-lite-master/assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="public/admin-wrap-lite-master/html/js/dashboard1.js"></script>
    <script src="public/js/admin/product.js"></script>
    
</body>

</html>