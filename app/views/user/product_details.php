<div class="wrapper">
<?php
@include('partials/header.php');
?>
    <main class="">
      <div class="container py-5">
        <div class="row">
          <div class="col-md-6">
          <img class="d-block w-100 h-100" src="public/images/products/<?= $productByID['product_img'] ?>" alt="">
        </div>
        <div class="col-md-6 ps-5">
            <div>
              <form method="POST" action="?controller=cart&action=addToCart&id=<?= $productByID['product_id'] ?>">
                
              <input type="hidden" name='product_img' value='<?= $productByID['product_img'] ?>'>
                <h4 class="name_product fw-bold"><?= $productByID['product_name'] ?></h4>
                <input type="hidden" name='product_name' value='<?= $productByID['product_name'] ?>'>
                <p class="price_product">$<?= $productByID['product_price'] ?></p>
                <input type="hidden" name='product_price' value='<?= $productByID['product_price'] ?>'>
                <div class="option_product">
                <select class="form-select" aria-label="Default select example"  name="product_size">
                  <option selected>Size: I need a ring sizer kit</option>
                  <?php
                      foreach ($sizes as $size) {
                        ?>
                      <option value = "<?php echo $size['size'] ?>"><?php echo $size['size'] ?></option>
                      <?php        
                      }
                      ?>
                </select>
                
              </div>
              
              <div class="quantity mt-3">
                <p>Quantity: </p>
                <div
                class="btn-group border"
                role="group"
                aria-label="Counter buttons"
                >
                <!-- <button id="decrementBtn" class="btn">-</button>
                <button type= te id="counterBtn" class="btn">0</button>
                <button id="incrementBtn" class="btn">+</button> -->
                <input type="number" name="product_quantity" min="1" max="10">
              </div>
              </div>
              
              <div class="mt-5">
              <input type="submit" value='ADD TO CART'>
              </div>

            </div>
          </form>

            <div class="desc_product mt-4">
              <h5 class="fw-bold">Description:</h5>
              <p>
                <?= $productByID['product_desc'] ?>
              </p>
            </div>
          </div>
        </div>
        <div class="more_infor py-5">
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#flush-collapseOne"
                  aria-expanded="false"
                  aria-controls="flush-collapseOne"
                >
                  Infor size of ring
                </button>
              </h2>
              <div
                id="flush-collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample"
              >
                <div class="accordion-body text text-center">
                  <img src="public/template_jewelry_shop/img/size_ring.webp" alt="" />
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#flush-collapseTwo"
                  aria-expanded="false"
                  aria-controls="flush-collapseTwo"
                >
                  Return Policy (Products purchased at the store)
                </button>
              </h2>
              <div
                id="flush-collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample"
              >
                <div class="accordion-body">
                  <h5 class="fw-bold">
                    Products without manufacturer defects can only be exchanged
                    if the following conditions are met
                  </h5>
                  <ul>
                    <li>
                      Exchange within 30 days of purchase in the purchase
                      receipt
                    </li>
                    <li>No repair service yet</li>
                    <li>Products purchased at ella stores</li>
                    <li>Full receipt of purchase</li>
                    <li>Not a discount product</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php
@include('partials/footer.php');
?>
</div>