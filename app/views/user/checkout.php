<?php
@include('partials/header.php');
?>
<body class="d-flex flex-column min-vh-100">
    <div class="container px-5 wrapper flex-grow-1" >
        <div class="title_main_product text-center slogan">
            <h2 class="slogan fs-1 py-5">Order</h2>
        </div>
        <div class="intro_product">
          <p class="text-center">
          Please fill in all information before paying for the order .
          </p>
        </div>
        <div class="infor_order">
            <?php
                if($userLoginStatus){
            ?>
            <section class="order-form m-4">
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-12 px-4">
                            <h1>Order Information</h1>
                        </div>
                        <div class="col-12">
                            
                            <div class="row mt-3 mx-4"> 
                                <div class="col-12">
                                    <label class="order-form-label">Customer Name</label>
                                    <input type="text" id="form7" class="form-control order-form-input" value='<?= $customer['customer_name'] ?>' disabled />
                                </div>
                            </div>

                            <div class="row mx-4">
                                <div class="col-sm-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form1">Email</label>
                                        <input type="text" id="form1" class="form-control order-form-input" value='<?= $customer['customer_email'] ?>' disabled />
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <div class="form-outline">
                                        <label class="form-label" for="form2">Phone Number</label>
                                        <input type="text" id="form2" class="form-control order-form-input" value='<?= $customer['customer_phone'] ?>' disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mx-4">
                                <div class="col-12">
                                    <label class="order-form-label">Adress</label>
                                        <input type="text" id="form2" class="form-control order-form-input" value='<?= $customer['customer_address'] ?>' disabled />
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
        </section>
        <?php
            } else {
                
        ?>
            <form id="formOrderGuest" action="?controller=cart&action=createGuestOrder" method="POST">
                    <section class="order-form m-4">
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-12 px-4">
                            <h1>Order Information</h1>
                        </div>
                        <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <div class="col-12">
                            
                            <div class="row mt-3 mx-4"> 
                                <div class="col-12">
                                    <label class="order-form-label">Customer Name</label>
                                    <input type="text" name="guest_name" id="form7" class="form-control order-form-input" />
                                </div>
                            </div>

                            <div class="row mx-4">
                                <div class="col-sm-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form1">Email</label>
                                        <input type="text" name="guest_email" id="form1" class="form-control order-form-input" />
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <div class="form-outline">
                                        <label class="form-label" for="form2">Phone Number</label>
                                        <input type="text" name="guest_phone" id="form2" class="form-control order-form-input" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mx-4">
                                <div class="col-12">
                                    <label class="order-form-label">Adress</label>
                                    <input type="text" name="guest_address" id="form7" class="form-control order-form-input" />
                                </div>
                            </div>


                            </div>
                        </div>
                    </div>
                </section>
            </form>

        <?php
            }
        ?>

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
                    $total = 0;
                    if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                ?>
                        <tr>
                        <td><?= $value['product_id'] ?></td>
                        <td style="width:50px; height:50px;"><img class = 'img-fluid' src="public/images/products/<?php echo $value['product_img'] ?>" alt=""></td>
                        <td>
                            <h6><?= $value['product_name'] ?></h6><small class="text-muted">Size: <?= $value['product_size'] ?></small>
                        </td>
                        <td>$<?= $value['product_price'] ?></td>
                        <td><?= $value['product_quantity'] ?></td>
                        <td>$<?php echo number_format($value['product_price'] * $value['product_quantity'], 2) ?></td>
                        
                        </tr>
                <?php      
                    $total = $total + $value['product_quantity'] * $value['product_price'];

                    }
                    }
                ?>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="py-5 fw-bold">TOTAL BILL : <span>$<?php 
                            if($total != 0){
                                echo number_format($total, 2);
                            }
                            ?></span></td>
                        </tr>
                </tbody>
            </table>
        </div> 
        <div
            class="btn_pay d-flex justify-content-center justify-content-md-end py-5"
          >
            <?php
                if($userLoginStatus){
            ?>
            <a class="btn_big bg_1 text-light border-0" href = '#' onclick="confirmCheckOut()">Pay Now</a>
            <?php
            } else {
            ?>
            <a class="btn_big bg_1 text-light border-0" href = '#' onclick="confirmCheckoutGuest()">Pay Now</a>
            <?php
                }
            ?>
          </div>
    </div>
</body>
<?php
@include('partials/footer.php');
?>
<script>
    function confirmCheckOut() {
        showConfirmation("Are you sure you want check out this order?", function() {
            // Execute the insert product action here, e.g., submit a form
            window.location.href = "?controller=cart&action=orderNowUser";
        });
    }
    function confirmCheckoutGuest() {
        showConfirmation("Are you sure you want order?", function() {
            // Execute the insert product action here, e.g., submit a form
            window.location.href = "?controller=cart&action=createGuestOrder";
            document.querySelector('#formOrderGuest').submit(); // Replace with your form ID
        });
    }
</script>
