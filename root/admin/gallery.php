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



  $target_dir = "./../img/gallery/";
  $random = rand(10000000,100000000);
  $target_file = $target_dir.$random.".". pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
  $target_name = $random.".". pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $err =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

  if ($uploadOk == 0) {
    $err = "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $err = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

      $sql = "INSERT INTO gallery (location) VALUES ('".$target_name."')";

      if ($conn->query($sql) === TRUE) {
        $err ="File Uploaded";
        } else {
        $err= "Sorry, there was an error uploading your file.";
        unlink($target_file);
        }


    } else {
      $err = "Sorry, there was an error uploading your file.";
    }
  }

}


$sql = "SELECT * FROM gallery";
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

                  <h2>Gallery</h2>
                  <p class="mb-md-0">Maintain your gallery</p>

                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4>Add New Photo</h4>
                  <br>
                  <?php

                  echo $err;
                   ?>
                  <form action="gallery.php" method="post" enctype="multipart/form-data">
                  Select image to upload:
                  <input type="file" name="fileToUpload" id="fileToUpload">
                  <input type="submit" value="Upload Image" name="submit">
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

                  <h4>Uploaded photos</h4>
                  <br>
                  <div class="row">

                    <?php
                    if($result)
                    while ($row = mysqli_fetch_array($result)) {
                        echo '

                            <div class="col-sm-3" style="margin-top: 50px;">
                            <img src="../img/gallery/'.$row['location'].'" width="100%">
                            <br>
                            <br>
                            <a class="btn btn-block btn-danger btn-lg" href="functions/delete_img.php?name='.$row['id'].'">DELETE</a>
                            </div>

                        ';
                      }
                    ?>
                  </div>

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
