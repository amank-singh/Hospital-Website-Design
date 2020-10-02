<?php
  ob_start();
  require("admin/functions/db.php");


  $sql = "SELECT * FROM gallery";
  $result = mysqli_query($conn, $sql);



 ?>
<?php require("./head.php")?>


      <section class="about service">
          <div class="container">
            <centeR>
          <h2>GALLERY</h2>
          <h4>Get a better look of apple hospital sikar</h4>
            </center>
            

            <div class="row">
    <?php
    if($result)
    while ($row = mysqli_fetch_array($result)) {
        echo '
        <a href="img/gallery/'.$row['location'].'" data-toggle="lightbox" data-gallery="gallery" class="col-md-3" style="margin-top: 50px;">
          <img src="img/gallery/'.$row['location'].'" class="img-fluid rounded">
        </a>


        ';
      }
    ?>

  </div>

 

            
            
          </div>
</section>


<?php require('./footer.php')?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script src="https://kit.fontawesome.com/1b1497c545.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.min.js"></script>
    <script src="js/gallery.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>