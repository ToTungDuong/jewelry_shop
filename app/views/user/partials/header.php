<?php
session_start();
$userLoginStatus = $_SESSION['userLoginStatus'] ?? null;
?>
<div class="header">
        <div class="alert_top alert bg_1">
          <div class="container">
            <div class="row text-light">
              <div class="col-4">
                <a href="?controller=home&action=index">
                    <img src="public/template_jewelry_shop/img/logo_light.png" class="img-fluid" alt="" />
                </a>
              </div>
              <div
                class="slogan col-4 text-center d-flex justify-content-center align-items-center"
              >
                Quality and Reputation
              </div>
              <div
                class="nav_right col-4 d-flex align-items-center justify-content-center"
              >
                <ul class="d-flex">
                  <li class="list-unstyled px-1">
                  <?php
                    if ($userLoginStatus) {
                      ?>
                        <a href="?controller=auth&action=logout"><img src="public/template_jewelry_shop/img/logout.png " alt="" /></a>
                      <?php
                      }
                    else {
                      ?>
                        <a href="?controller=auth&action=viewLogin"><img src="public/template_jewelry_shop/img/user-light.svg" alt="" /></a>
                    <?php
                      }
                    ?>
                  </li>
                  <li class="list-unstyled px-1">
                    <a href=""><img src="public/template_jewelry_shop/img/heart-light.svg" alt="" /></a>
                  </li>
                  <li class="list-unstyled px-1">
                    <a href="?controller=home&action=viewCart"
                      ><img src="public/template_jewelry_shop/img/shopping-bag_light.png" alt=""
                    /></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>