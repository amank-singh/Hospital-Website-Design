<?php require("./head.php")?>


<?php

ob_start();
require("admin/functions/db.php");

$result;
if($_GET['id'])
{
    $sql = "SELECT * FROM blog where id =".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['title'])
    {
        
    }
    else{
        header("Location: blog.php");
    }
}
else{
    header("Location: blog.php");
}

?>

<div class="container pdg100 pdgb100">
        <div class="row ">
            <div class="col-sm-8 offset-sm-2">
            <!-- <div style="background-image: url('img/blog/<?php echo $row["img"]?>'); width: 100%; height: 200px; background-size: cover;">
            </div>  -->
            <img src="img/blog/<?php echo $row["img"]?>" width="100%">
            <br><br>
            <h3><?php echo $row["title"]?></h3>
            <h6 class="mrg15" style="color: #2369b3;">Posted on <?php echo $row["created_at"]?></h6>
            <br>
            <p class="text-justify"><?php echo $row["description"]?></p>
            </div>
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