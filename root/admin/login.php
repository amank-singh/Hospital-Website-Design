<?php ob_start();
    session_start();



        // LOGIN SCRIPT
      require("functions/db.php");
      // Define variables and initialize with empty values

      $email = $password = "";

      $email_err = $password_err = "";



      // Processing form data when form is submitted

      if($_SERVER["REQUEST_METHOD"] == "POST"){



          // Check if email is empty

          if(empty(trim($_POST["email"]))){

              $email_err = 'Please enter an email address.';

          } else{

              $email = trim($_POST["email"]);

          }



          // Check if password is empty

          if(empty(trim($_POST['password']))){

              $password_err = 'Please enter your password.';

          } else{

              $password = trim($_POST['password']);

          }



          // Validate credentials

          if(empty($email_err) && empty($password_err)){

              // Prepare a select statement

              $sql = "SELECT email, password FROM admin WHERE email = ?";



              if($stmt = mysqli_prepare($conn, $sql)){

                  // Bind variables to the prepared statement as parameters

                  mysqli_stmt_bind_param($stmt, "s", $param_email);

                  // Set parameters

                  $param_email = $email;

                  // Attempt to execute the prepared statement

                  if(mysqli_stmt_execute($stmt)){

                      // Store result

                      mysqli_stmt_store_result($stmt);

                      // Check if email exists, if yes then verify password

                      if(mysqli_stmt_num_rows($stmt) == 1){

                          // Bind result variables

                          mysqli_stmt_bind_result($stmt, $email, $hashed_password);

                          if(mysqli_stmt_fetch($stmt)){

                              if(password_verify($password, $hashed_password)){

                                  /* Password is correct, so start a new session and

                                  save the email to the session */



                                  $_SESSION['email'] = $email;

                                  // $sql = "SELECT department FROM employees WHERE email='$email'" ;
                                  $statement = mysqli_query($conn, $sql);

                                    header("location: index.php");

                                // Close statement

                                //mysqli_stmt_close($statement);

                                //header("location: sales");

                              } else{

                                  // Display an error message if password is not valid

                                  $password_err = 'The password you entered was not valid. Please try again.';

                              }

                          }

                      } else{

                          // Display an error message if email doesn't exist

                          $email_err = 'No account found with that email. Please recheck and try again.';

                      }

                  } else{

                      echo "Oops! Something went wrong. Please try again later.";

                  }

              }



              // Close statement

              mysqli_stmt_close($stmt);

          }



          // Close connection

          mysqli_close($conn);

      }



      ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./css/style.css">
  <!-- endinject -->
  <link rel="icon" href="images/1.png" type="image/png" sizes="32x32">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="./images/16k.png" alt="logo">
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>

              <?php
              echo "<br>";
              echo $email_err;
              echo $password_err;
               ?>

              <form class="pt-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password" placeholder="Password">
                  </div>
                </div>

                <div class="my-3">
                  <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</a>


                </div>

              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  AAA Tech Services.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/template.js"></script>
  <!-- endinject -->
</body>

</html>
