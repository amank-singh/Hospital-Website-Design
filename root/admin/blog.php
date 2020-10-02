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



$err ="";


if($_SERVER["REQUEST_METHOD"] == "POST"){



  $target_dir = "./../img/blog/";
  $random = rand(10000000,100000000);
  $target_file = $target_dir.$random.".". pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
  $target_name = $random.".". pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  /*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $err =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }*/

  if ($uploadOk == 0) {
    $err = "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $err = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

      $title = $_POST['title'];
      $description = trim($_POST['description']);


      $sql = "INSERT INTO blog (title, description, img) VALUES ('".$title."','".$description."','".$target_name."')";

      if ($conn->query($sql) === TRUE) {
        $err ="File Uploaded";


        } else {
        $err= "Sorry, there was an error uploading your file. 1";
        unlink($target_file);

        }


    } else {
      $err = "Sorry, there was an error uploading your file.";
    }
  }

}


$sql = "SELECT * FROM blog";
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

                  <h2>Blogs</h2>
                  <p class="mb-md-0">All your blogs</p>

                </div>
              </div>
            </div>
          </div>


          <br>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4>Add New Blog</h4>
                  <br>
                  <?php

                  echo $err.'<br>';
                   ?>


                  <form class="forms-sample" action="blog.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>


            <br>
            <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">

                  <h2>All Blogs</h2>
                  <p class="mb-md-0">All your blogs</p>
                  <br>
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($result)
                      while ($row = mysqli_fetch_array($result)) {
                          echo "
                          <tr>
                          <td>".$row['title']."</a></td>
                          <td>".$row['created_at']."</td>
                          <td><a href='functions/delete_blog.php?id=".$row['id']."&photo=".$row['img']."'>Remove</a></td>
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