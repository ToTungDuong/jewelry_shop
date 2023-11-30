<?php
@include('partials/header.php');
?>
<body class="d-flex flex-column min-vh-100">
    <div class="container px-5 wrapper flex-grow-1" >
        <div class="title_main_product text-center slogan">
            <h2 class="slogan fs-1 py-5">Thanks you for choosing us among thousands of choices</h2>
        </div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Pay Successfully!</h4>
            <p>Your order request has been sent. Please check your order status regulary. We will process your request as soon as possible.</p>
            <hr>
            <p>Your's code order : <span class = "fw-bold"><?= $order_id['order_id'] ?></span>. Plesea rememmber it to search information your's order. Thanks you!</p>
            <p class="mb-0">Whenever you need, please contact us via hotline: <span class = "fw-bold">0866617666</span> or email: <span class = "fw-bold">tod25504@gmail.com</span> .</p>
        </div>
    </div>
</body>
<?php
@include('partials/footer.php');
?>