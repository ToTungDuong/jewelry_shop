
<div class="wrapper">
<?php
@include('partials/header.php');
?>
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  me-auto mb-2 mb-lg-0 mx-5 color_navlink">
                <li class="nav-item px-3">
                  <a class="nav-link active" aria-current="page" href="#"
                    >HOME</a
                  >
                </li>
                <li class="nav-item px-3">
                  <a
                    class="nav-link"
                    aria-current="page"
                    href="#top_product"
                    >TOP PRODUCT
                  </a>
                </li>
                <li class="nav-item px-3">
                  <a
                    class="nav-link"
                    aria-current="page"
                    href="#new_arrivals"
                    >NEW ARRIVALS</a
                  >
                </li>
                <li class="nav-item px-3">
                  <a
                    class="nav-link"
                    aria-current="page"
                    href="#collection"
                    >COLLECTIONS</a
                  >
                </li>
                <li class="nav-item px-3">
                  <a
                    class="nav-link"
                    aria-current="page"
                    href="#category"
                    >CATEGORY
                  </a>
                </li>
                <li class="nav-item px-3">
                  <a
                    class="nav-link"
                    aria-current="page"
                    href="#musthave"
                    >MUST HAVE
                  </a>
                </li>
                <?php
                  if($_SESSION){
                ?>
                <li class="nav-item px-3">
                  <a href="?controller=home&action=viewOrder"
                  class="btn nav-link btn btn_main hidden-sm-down"> My Order </a>
                </li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>
        </nav>
      <main>
        <div
          id="carouselExampleIndicators"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/template_jewelry_shop/img/hero.png" class="d-block w-100" alt="..." />
              <div class="carousel-caption">
                <h5 class="title">NEW ARRIVALS __</h5>
                <h1 class="title_home">Milancélos</h1>
                <p class="home_infor">
                  Quisquemos sodale suscipit delio condiment cosmo lacus
                  meleifend blanditos.
                </p>
                <a href="">
                  <button class="btn btn_big bg_1 my-5">SHOP NOW</button>
                </a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="public/template_jewelry_shop/img/hero2.webp" class="d-block w-100" alt="..." />
              <div class="carousel-caption">
                <h5 class="title">NEW ARRIVALS __</h5>
                <h1 class="title_home">Milancélos</h1>
                <p class="home_infor">
                  Quisquemos sodale suscipit delio condiment cosmo lacus
                  meleifend blanditos.
                </p>
                <a href="">
                  <button class="btn btn_big bg_1 my-5">SHOP NOW</button>
                </a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="public/template_jewelry_shop/img/hero4.jpg" class="d-block w-100" alt="..." />
              <div class="carousel-caption">
                <h5 class="title">NEW ARRIVALS __</h5>
                <h1 class="title_home">Milancélos</h1>
                <p class="home_infor">
                  Quisquemos sodale suscipit delio condiment cosmo lacus
                  meleifend blanditos.
                </p>
                <a href="">
                  <button class="btn btn_big bg_1 my-5">SHOP NOW</button>
                </a>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <section class="top_product py-5" id="top_product">
          <div class="container">
            <div class="area_top text-center text-lg-start d-block d-lg-flex">
              <h4 class="title_main fw-semibold text_color_title col-lg-8">
                Top Product
              </h4>
              <div class="d-flex justify-content-center d-lg-block">
                <nav aria-label="Page navigation example">
                  <ul class=" pagination">
                    <li class="page-item">
                      <a class="nav-link page-link active" href="#" data-target="rings">Diamond Ring</a>
                    </li>
                    <li class="page-item">
                      <a class="nav-link page-link" href="#" data-target="bracelets">Bracelet</a>
                    </li>
                    <li class="page-item">
                      <a class="nav-link page-link" href="#" data-target="earrings">Earring</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div
              class="list_top row d-flex justify-content-center  column-gap-5" id = "rings"
            >
              <?php
                    foreach ($topofrings as $ring) {
              ?>
              <div class="card col-sm-6 col-lg-4" style="width: 18rem">
                <img src="public/images/products/<?= $ring['product_img'] ?>" class="card-img-top" alt="..." />
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $ring['product_name'] ?></h5>
                  <?php
                    if ($userLoginStatus) {
                      ?>
                        <a href="?controller=home&action=viewProductDetails&id=<?= $ring['product_id'] ?>" class="btn btn-outline-search">Shop Now</a>
                      <?php
                      }
                    else {
                      ?>
                        <a href="?controller=auth&action=viewLogin" class="btn btn-outline-search">Shop Now</a>
                    <?php
                      }
                    ?>
                </div>
              </div>

            <?php
                    }
            ?>
            </div>

            <div
              class="list_top row d-flex d-none justify-content-center column-gap-5" id = "bracelets"
            >
              <?php
                    foreach ($topofbracelets as $bracelet) {
              ?>
              <div class="card col-sm-6 col-lg-4" style="width: 18rem">
                <img src="public/images/products/<?= $bracelet['product_img'] ?>" class="card-img-top" alt="..." />
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $bracelet['product_name'] ?></h5>
                  <?php
                    if ($userLoginStatus) {
                      ?>
                        <a href="?controller=home&action=viewProductDetails&id=<?= $bracelet['product_id'] ?>" class="btn btn-outline-search">Shop Now</a>
                      <?php
                      }
                    else {
                      ?>
                        <a href="?controller=auth&action=viewLogin" class="btn btn-outline-search">Shop Now</a>
                    <?php
                      }
                    ?>
                </div>
              </div>
            <?php
                    }
            ?>
            </div>

            <div
              class="list_top row d-flex d-none justify-content-center column-gap-5" id = "earrings"
            >
              <?php
                    foreach ($topofearrings as $earring) {
              ?>
              <div class="card col-sm-6 col-lg-4" style="width: 18rem">
                <img src="public/images/products/<?= $earring['product_img'] ?>" class="card-img-top" alt="..." />
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $earring['product_name'] ?></h5>
                  <?php
                    if ($userLoginStatus) {
                      ?>
                        <a href="?controller=home&action=viewProductDetails&id=<?= $earring['product_id'] ?>" class="btn btn-outline-search">Shop Now</a>
                      <?php
                      }
                    else {
                      ?>
                        <a href="?controller=auth&action=viewLogin" class="btn btn-outline-search">Shop Now</a>
                    <?php
                      }
                    ?>
                </div>
              </div>

            <?php
                    }
            ?>
            </div>

          </div>
        </section>

        <section class="new_arrivals py-5 bg_2" id="new_arrivals">
          <div class="container">
            <h4
              class="title_main fw-semibold text_color_title text-center pb-5"
            >
              New Arrivals
            </h4>
            <div
              class="row d-flex justify-content-center justify-content-lg-between column-gap-xxl-1 row-gap-3"
            >
            <?php
              foreach($newarrivals as $product_new){
            ?>
              
              <div class="card" style="width: 25.5rem">
                <img
                  src="public/images/products/<?= $product_new['product_img'] ?>"
                  class="card-img-new"
                  alt="..."
                />
                <div class="card-body-new border-top">
                  <div class="price py-2">
                    <span class="price_saled text_color_title">$<?php echo $product_new['product_price'] ?>.00</span>
                  </div>
                  <div class="card_footer pb-4 row">
                    <h5 class="card-title col-10"><?php echo $product_new['product_name'] ?></h5>
                    <?php
                    if ($userLoginStatus) {
                      ?>
                        <a href="?controller=home&action=viewProductDetails&id=<?= $product_new['product_id'] ?>" class="col-2"><img src="public/template_jewelry_shop/img/shopping-bag.png" alt=""
                    /></a>
                      <?php
                      }
                    else {
                      ?>
                        <a href="?controller=auth&action=viewLogin" class="col-2"><img src="public/template_jewelry_shop/img/shopping-bag.png" alt=""
                    /></a>
                    <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            <?php
              }
            ?>



            </div>
            <div class="new_arrivals_footer text-center pt-5">
              <button class="btn btn_view_all">View All</button>
            </div>
          </div>
        </section>

        <section class="collection py-5" id="collection">
          <div class="container">
            <div class="row pb-5">
              <div
                class="collection_item col-lg-6 position-relative py-lg-0 py-5"
              >
                <img class="img-fluid" src="public/template_jewelry_shop/img/Rectangle 32.png" alt="" />
                <div
                  class="card_collection bg_2 py-5 px-3 w-50 text-center position-absolute top-50 end-0"
                >
                  <span class="text_color_title">MUST SEE NEW STYLE</span>
                  <h4 class="card_collection_title mt-4">
                    Birthday Collection
                  </h4>
                  <a href="#"
                    ><button class="btn btn-outline-search mt-5">
                      Shop Now
                    </button></a
                  >
                </div>
              </div>
              <div
                class="collection_item col-lg-6 position-relative py-lg-0 py-5"
              >
                <img class="img-fluid" src="public/template_jewelry_shop/img/Rectangle 34.png" alt="" />
                <div
                  class="card_collection bg_2 py-5 px-3 w-50 text-center position-absolute top-50 end-0"
                >
                  <span class="text_color_title">NEW COLLECTION</span>
                  <h4 class="card_collection_title mt-4">Summer Essentials</h4>
                  <a href="#"
                    ><button class="btn btn-outline-search mt-5">
                      Shop Now
                    </button></a
                  >
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="featured_products bg_2 py-5" id="category">
          <div class="container">
            <h4
              class="title_main fw-semibold text_color_title text-center pb-5"
            >
              CATEGORY
            </h4>
            <div class="owl-carousel owl-theme">
              <?php
              foreach($categories as $category){
              ?>
              <div class="item px-3">
                <div class="card btn cursor-pointer" >
                  <img
                    src="public/template_jewelry_shop/img/Rectangle 22.png"
                    class="card-img-new img-fluid"
                    alt="..."
                  />
                  <div class="card-body-new border-top px-4">
                    <div class="card_footer row">
                      <!-- <h5 class="card-title text-center py-3 slogan"> -->
                        <a href="?controller=home&action=viewProduct&id=<?= $category['category_id'] ?>" class = "category_name slogan py-3 text-decoration-none text_color_title ">
                          <?php echo $category['category_name'] ?>
                        </a>
                      <!-- </h5> -->
                    </div>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>



            </div>
            <div class="featured_product_footer text-center pt-5">
              <button class="btn btn_view_all">View All</button>
            </div>
          </div>
        </section>

        <section class="must_have py-5" id="musthave">
          <div class="container">
            <h4
              class="title_main fw-semibold text_color_title text-center pb-5"
            >
              Must Have
            </h4>
            <div class="row">
              <div class="col-md-6">
                <div
                  id="carouselExampleIndicators1"
                  class="carousel slide"
                  data-bs-ride="carousel"
                >
                  <div class="carousel-indicators">
                    <button
                      type="button"
                      data-bs-target="#carouselExampleIndicators1"
                      data-bs-slide-to="0"
                      class="active mb-2"
                      aria-current="true"
                      aria-label="Slide 1"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselExampleIndicators1"
                      data-bs-slide-to="1"
                      aria-label="Slide 2"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselExampleIndicators1"
                      data-bs-slide-to="2"
                      aria-label="Slide 3"
                    ></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img
                        src="public/template_jewelry_shop/img/Rectangle 32.png"
                        class="d-block w-100"
                        alt="..."
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="public/template_jewelry_shop/img/Rectangle 34.png"
                        class="d-block w-100"
                        alt="..."
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="public/template_jewelry_shop/img/Rectangle 37.png"
                        class="d-block w-100"
                        alt="..."
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col-12 col-md-6 d-md-flex align-items-center justify-content-center mt-5"
              >
                <div class="text-center text-md-start">
                  <span class="text_color_title">SALE UP TO 30% OFF</span>
                  <h4 class="w-50 card_collection_title mt-4">
                    18k Gold Bracelets
                  </h4>
                  <a href="">
                    <button class="btn btn_big btn_shop_now bg_1 my-5">
                      SHOP NOW
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="service py-sm-5">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <div class="service_item d-md-flex justify-content-evenly">
                  <img
                    src="public/template_jewelry_shop/img/truck.png"
                    style="width: 55px; height: 55px"
                    alt=""
                  />
                  <div class="service_title">
                    <h5 class="fw-bold">FREE SHIPPING</h5>
                    <p>Lorem ipsum dolor sit amet,.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="service_item d-md-flex justify-content-evenly">
                  <img
                    src="public/template_jewelry_shop/img/package.png"
                    style="width: 55px; height: 55px"
                    alt=""
                  />
                  <div class="service_title">
                    <h5 class="fw-bold">FREE IN STORE RETURN</h5>
                    <p>Lorem ipsum dolor sit amet,.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="service_item d-md-flex justify-content-evenly">
                  <img
                    src="public/template_jewelry_shop/img/secure.png"
                    style="width: 55px; height: 55px"
                    alt=""
                  />
                  <div class="service_title">
                    <h5 class="fw-bold">100%SECURE CHECKOUT</h5>
                    <p>Lorem ipsum dolor sit amet,.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
<?php
@include('partials/footer.php');
?>
</div>

