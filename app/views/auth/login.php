
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/template_jewelry_shop/src/main.css" />
    <link rel="stylesheet" href="public/template_jewelry_shop/src/css/index.css" />
    <link rel="stylesheet" href="public/template_jewelry_shop/src/css/loginandsignup.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="public/template_jewelry_shop/img/logo.png">

    <script src="bootstrap.bundle.min.js"></script>
    <!-- include owl carousel Min.css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
      integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- include owl carousel theme -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
      integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Auth - Ella Jewelry</title>
  </head>
  <body class="bg_2">
  <div class="header">
        <div class="alert_top alert bg_1">
          <div class="container">
            <div class="row text-light">
              <div class="d-flex justify-content-center">
                <a href="?controller=auth&action=viewLogin">
                    <img src="public/template_jewelry_shop/img/logo_light.png" class="img-fluid" alt="" />
                </a>
              </div>
          </div>
        </div>   
    </div>
  </div>
    <div
      class="wrapper container d-flex justify-content-center py-5"
    > 
      
      <div class="form bg-light">
        <h3 class="fw-bold text-center" id="formTitle">Login Form</h3>
        <!-- LOGIN FORM -->

        <form class="form_input pt-3" action = "?controller=auth&action=login" method = "POST" id="loginForm">
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label fw-bold"
              >Email Address</label
              >
              <input
              type="email"
              name = "customer_email"
              class="form-control"
              id="formGroupExampleInput"
              placeholder="Please enter your email"
              />
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label fw-bold"
              >Password</label
              >
              <input
              type="password"
              name = "customer_password"

              class="form-control"
              id="formGroupExampleInput2"
              placeholder="Please enter password"
              />
            </div>
            <p>Forgot password?</p>
            <!-- Display error messages -->
            <?php if (!empty($errors)): ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <input type="submit" name="login_submit" class="bg_1 text-light" value="Login" />
            <p class="mt-4">
              Not a member? <a href="?controller=auth&action=viewSignUp" class="text_color_title py-3">SignUp Now</a>
            </p>
        </form>
      </div>
    </div>
  </body>
</html>
