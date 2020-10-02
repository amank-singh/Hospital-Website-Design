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





$sql = "SELECT * FROM contactus";
$result = mysqli_query($conn, $sql);

require("./head.php");
 ?>









      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">

                  <h2>Contact Us</h2>
                  <p class="mb-md-0">All your messages</p>

                </div>
              </div>
            </div>
          </div>



            <br>
            <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">

                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                          <th>First Name</th>
                          
                          <th>Email</th>
                          <th>Phone</th>
                          
                          <th>Message</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($result)
                      while ($row = mysqli_fetch_array($result)) {
                          echo "
                          <tr>
                          <td>".$row['name']."</a></td>
                          
                          <td>".$row['email']."</a></td>
                          <td>".$row['phone']."</a></td>
                          
                          
                          <td>".$row['message']."</td>
                          </tr>

                          ";
                        }
                      ?>
                    </tbody>
                  </table>
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
