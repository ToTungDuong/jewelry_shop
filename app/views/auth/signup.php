
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/template_jewelry_shop/src/main.css" />
    <link rel="stylesheet" href="public/template_jewelry_shop/src/css/index.css" />
    <link rel="stylesheet" href="public/template_jewelry_shop/src/css/loginandsignup.css" />
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
    <title>Ella Jewelry</title>
  </head>
  <body class="bg_2">
  <div class="header">
        <div class="alert_top alert bg_1">
          <div class="container">
            <div class="row text-light">
              <div class="d-flex justify-content-center">
                <a href="?controller=auth&action=viewSignUp">
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
        <h3 class="fw-bold text-center" id="formTitle">SignUp Form</h3>

        <!-- SIGNUPFORM -->
          <form class="form_input pt-3" action = "?controller=auth&action=signup" method = "POST" id="signupForm">
            <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label fw-bold"
              >Your Name</label
            >
            <input
            type="text"
            name = "customer_name"
            class="form-control"
            id="formGroupExampleInput"
            placeholder="Please enter your name"
            />
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label fw-bold"
            >Your Email (*Account)</label
            >
            <input
              type="text"
              name = "customer_email"
              class="form-control"
              id="formGroupExampleInput2"
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
            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label fw-bold"
              >Retype Password</label
              >
              <input
              type="password"
              name = "customer_rpassword"
              class="form-control"
              id="formGroupExampleInput2"
              placeholder="Please enter password"
              />
          </div>
          <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label fw-bold"
              >Your Address</label
              >
              <input
              type="text"
              name = "customer_address"
              class="form-control"
              id="formGroupExampleInput2"
              placeholder="Please enter yout address"
              />
          </div>
          <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label fw-bold"
              >Your Phone</label
              >
              <input
              type="text"
              name = "customer_phone"
              class="form-control"
              id="formGroupExampleInput2"
              placeholder="Please enter your phone"
              />
          </div>
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

            <?php if (!empty($alerts)): ?>
                <div class="alert alert-success" role="alert">
                    <?php foreach ($alerts as $alert): ?>
                        <?php echo $alert; ?><br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
          <input type="submit" class="bg_1 text-light" value="Sign Up" />
          <p class="mt-4">
            Do you have an account? <a href="?controller=auth&action=viewLogin" class="text_color_title py-3">Login Now</a>
          </p>
        </form>
      </div>
    </div>
  </body>
</html>


