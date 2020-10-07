<?php
  ob_start();
  require("admin/functions/db.php");

    $err ="";


    if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(empty(trim($_POST["message"]))){

          $err = 'Please enter a message';


      } else{

          $message = trim($_POST["message"]);

      }

      if(empty(trim($_POST["phone"]))){

          $err = 'Please enter a phone number';


      } else{

          $phone = trim($_POST["phone"]);

      }

      if(empty(trim($_POST['name']))){

          $err = 'Please enter your name';


      } else{

          $name = trim($_POST['name']);

      }

      if(!$err)
      {

          $email = trim($_POST['email']);
          $time = trim($_POST['time']);
          $sql = "INSERT INTO appointment (name,phone, email ,time, message) VALUES ('".$name."','".$phone."','".$email."','".$time."','".$message."')";

        if ($conn->query($sql) === TRUE) {
            $err ="Message Sent";
            } else {
            $err= "Message Not Sent";
            }


      }

}



 ?>
<?php require("./head.php")?>


      <section class="about service">
          <div class="container">
            <centeR>
          <h2>GET AN APPOINTMENT</h2>
          
            </center>
            

            <div class="row">
          <div class="col-md-8 offset-md-2">
            <form class="pdg50" action="appointment.php" method="post">
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">

                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="phone" class="form-control" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp">

                </div>
              </div>
              <div class="row">
            <div class="form-group col-sm-6">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">

            </div>
            <div class="form-group col-sm-6">
              <label for="exampleInputEmail1">Time Slot</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="time" aria-describedby="emailHelp">

            </div>
            </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Tell Us About Your Visit</label>
                <textarea type="text" name="message" class="form-control" id="exampleInputPassword1"></textarea>
              </div>
              <center>
              <?php
        
              if($err)
              echo "<br>".$err."</br>";

               ?>
               
              <button type="submit" class="btn btn-3 mrg25">Submit</button>
              </center>
            </form>
          </div>
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
