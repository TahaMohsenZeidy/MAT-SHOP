<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include"head.php";?>
<body>
<?php include"header.php";?>
<br><br><br><br><br><br><br>
<div class="super_container">
  <div class='mx-auto' style='width: 500px;'>
  <div class='card text-white bg-primary' style='width: 30rem;'>
  <div class='card-body'>
  <h5 class='card-title text-white'>connexion</h5>
  <form  action='' method='post'>
    <!-- Input -->
    <div class='mb-3'>
      <div class='input-group input-group form'>
        <input type='email' class='form-control' name='email'  placeholder='Entrez votre adresse email' aria-label='Entrez votre adresse email'>
      </div>
    </div>
    <!-- End Input -->
    <button type='submit' name="submit" value="submit" class='btn btn-block btn-primary'>reccuperer</button>
  </form>
  </div>
  </div>
  </div>
<?php include("footer.php"); ?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
<?php
if(isset($_POST["submit"])){
  $to_email = $_POST["email"];
  $subject = "Your password";
  $data=$model->getpassword($_POST["email"]);
  $body = $data[0]["password"];
  $headers = "From: ayoubyaich85@gmail.com";

  if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
  } else {
    echo "Email sending failed...";
  }
}


?>
