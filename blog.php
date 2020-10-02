<?php require("./head.php")?>

<?php

ob_start();
require("admin/functions/db.php");

$sql = "SELECT * FROM blog";
$result = mysqli_query($conn, $sql);

?>


<div class="about container pdg50 pdgb100">
        <center>

            <h2 class=" pdg25">Blogs</h1>
            <h4 class=" mrg5">Stay In The Loop</h5>

        </center>
        <div class="row ">



        <?php
          if($result)
          while ($row = mysqli_fetch_array($result)) {
              if($row["title"])
              echo ' <div class="col-sm-4 mrg50">
              <div class="card">
                <div class="card-body">
                      <center><img src="img/blog/'.$row["img"].'" width="100%"></center>
  
  
                      <h4 class="card-title mrg25">'.$row['title'].'</h4>
                      <a href="post.php?id='.$row['id'].'"><button class="btn btn-8 mrg15">Read More <i class="fas fa-backward"></i></button></a>
                  </div>
                </div>
              </div>
          ';
            }
          ?>
        </div>
    </div>


<?php require('./footer.php')?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/1b1497c545.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.min.js"></script>
    
    <script src="js/script.js"></script>
  </body>
</html>