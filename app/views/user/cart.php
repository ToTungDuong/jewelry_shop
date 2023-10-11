<div class="wrapper">
<?php
@include('partials/header.php');
?>
      <main>
        <div class="container px-5">
          <div class="title_main_product text-center slogan">
            <h2 class="slogan fs-1 py-5">Cart</h2>
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
          <div class="container table-responsive py-5">
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">PRODUCT</th>
                  <th scope="col"></th>
                  <th scope="col">QUANTITY</th>
                  <th scope="col">TOTAL</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $total = 0;
                if (!empty($_SESSION['cart'])) {
                  foreach ($_SESSION['cart'] as $key => $value) {
              ?>
                <tr>
                  <th scope="row">
                    <img
                      class="img-fluid"
                      style="width: 200px; height: 200px"
                      src="public/images/products/<?php echo $value['product_img'] ?>"
                      alt=""
                    />
                  </th>
                  <td>
                    <h5><?= $value['product_name'] ?></h5>
                    <p>Size: <?= $value['product_size'] ?></p>
                    <p>$<?= $value['product_price'] ?></p>
                  </td>
                  <td>
                  <p><?= $value['product_quantity'] ?></p>

                  </td>
                  <td>$<?php echo number_format($value['product_price'] * $value['product_quantity'], 2) ?></td>
                  <td>                                                    

                    <a class='mx-1' href="#" onclick="confirmRemoveItemCart(<?php echo $value['product_id']; ?>)">
                      <img src="public/admin-wrap-lite-master/assets/images/trash.png" alt="">
                    </a>
                  </td>
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
                  <td class="py-5">TOTAL BILL : <span>$<?php 
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
            <a class="btn_big bg_1 text-light border-0" href = '#' onclick="confirmCheckOut()">Pay Now</a>
          </div>
        </div>
      </main>
      <?php
@include('partials/footer.php');
?>
</div>
<script>
    function confirmCheckOut() {
        showConfirmation("Are you sure you want check out this order?", function() {
            // Execute the insert product action here, e.g., submit a form
            window.location.href = "?controller=cart&action=checkOut";
        });
    }
</script>
