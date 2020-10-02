<?php


ob_start();
require_once "functions/db.php";

// Initialize the session

session_start();

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: login.php");

  exit;
}

require("./head.php");
 ?>









      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">

                  <h2>Welcome Back</h2>
                  <p class="mb-md-0">This is where the magic happens!</p>

                </div>
              </div>
            </div>
          </div>





        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->




<?php

require("./foot.php");


 ?>
