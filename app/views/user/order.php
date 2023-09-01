<?php
@include('partials/header.php');
?>
<body class="d-flex flex-column min-vh-100">
    <div class="container px-5 wrapper flex-grow-1" >
        <div class="title_main_product text-center slogan">
            <h2 class="slogan fs-1 py-5">Order</h2>
        </div>
        <div class="table-responsive mt-3 ">
            <table class="table vm no-th-brd pro-of-month">
                <thead>
                    <tr>
                        <!-- colspan = '2' - chieu rong cua cot -->
                        <th>ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th> 
                        <td colspan ="1"></td>
                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach($orders as $order){
                ?>        
                        <tr>
                            <td><?= $order['order_id'] ?></td>
                            <td><?= $order['order_date'] ?></td>
                            <td>$<?= $order['total_amount'] ?></td>
                            <td><?= $order['order_status'] ?></td>
                            <td>
                                <a href="?controller=home&action=detailOrder&order_id=<?= $order['order_id'] ?>" class="btn nav-link btn btn_main hidden-sm-down"> Detail </a></td>
                        </tr>
                <?php   
                        }
                ?>
                </tbody>

            </table>
        </div> 
    </div>
</body>
<?php
@include('partials/footer.php');
?>