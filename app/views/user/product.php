<div class="wrapper">
<?php
@include('partials/header.php');
?>
    <main class="">
      <div class="container">
        <div class="title_main_product text-center slogan">
          <h2 class="slogan fs-1 py-5">
            <span class="text_color_title slogan fs-1">All The <?= $categoryName['category_name'] ?> </span> We
            Have
          </h2>
        </div>
        <div class="intro_product">
          <p class="text-center">
            Our engagement and wedding rings are as unique as they get -
            handmade from scratch, with conflict free stones and recycled 18k
            solid gold. The designs are like nothing you've seen before and we
            always keep the handmade feeling after finishing the product. Choose
            from brilliant cut or rose cut diamonds, sapphires in all the
            rainbows colours and mix it with 18k solid white or red gold. Stack
            it up or keep it clean. Whatever way you want to go - we are there
            to help you find your perfect fit.
          </p>
        </div>
        <div class="product_list py-5">
          <div class="container">
            <div
              class="row d-flex justify-content-center justify-content-xl-start column-gap-4 row-gap-4"
            >
              <?php 
                foreach($rowsByCategory as $rowByCategory){
              ?>    
              <div class="card col-sm-6 col-lg-4" style="width: 18rem">
                <img src="public/images/products/<?= $rowByCategory['product_img'] ?>" class="card-img-top" alt="..." />
                <div class="card-body text-center">
                  <h5 class="card-title"><?= $rowByCategory['product_name'] ?></h5>
                  <p>$<?= $rowByCategory['product_price'] ?></p>
                  <div class="d-flex justify-content-around align-items-center">

                        <a href="?controller=home&action=viewProductDetails&id=<?= $rowByCategory['product_id'] ?>" class="btn btn-outline-search btn_2">Shop Now</a>


                  </div>
                </div>
              </div>
             <?php 
            }
            ?>
              <div>
                  Page:
                  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                      <a class="text-decoration-none  <?php echo (isset($_GET['page']) && $i == $_GET['page']) ? 'active' : ''; ?>" href="?controller=home&action=viewProduct&id=<?= $rowByCategory['category_id'] ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                  <?php endfor; ?>
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