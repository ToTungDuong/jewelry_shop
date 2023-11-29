<?php
@include('partials/header.php');
?>
<body class="d-flex flex-column min-vh-100">
    <div class="container px-5 wrapper flex-grow-1" >
        <div class="title_main_product text-center slogan">
            <h2 class="slogan fs-1 py-5">Order</h2>
        </div>
        <div class="infor_order">
            <h5 class = 'fw-bold'>Order ID: <span class = "fw-normal"><?= $orderByID['order_id'] ?></span></h5>
            <h5 class = 'fw-bold'>Guest Name: <span class = "fw-normal"><?= $orderByID['guest_name'] ?></span></h5>
            <h5 class = 'fw-bold'>Guest Phone: <span class = "fw-normal"><?= $orderByID['guest_phone'] ?></span></h5>
            <h5 class = 'fw-bold'>Guest Email: <span class = "fw-normal"><?= $orderByID['guest_email'] ?></span></h5>
            <h5 class = 'fw-bold'>Guest Address: <span class = "fw-normal"><?= $orderByID['guest_address'] ?></span></h5>
            <h5 class = 'fw-bold'>Date Order: <span class = "fw-normal"><?= $orderByID['order_date'] ?></span></h5>
            <h5 class = 'fw-bold'>Status: <span class = "fw-normal"><?= $orderByID['order_status'] ?></span></h5>

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
                            <td></td>
                            <td></td>
                            <td class="py-5 fw-bold">TOTAL BILL : <span>$<?= 
                                $orderByID['total_amount']
                            ?></span></td>
                        </tr>
                </tbody>
            </table>
        </div> 
    </div>
</body>
<?php
@include('partials/footer.php');
?>