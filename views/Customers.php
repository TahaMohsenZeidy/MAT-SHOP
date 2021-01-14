<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include"head.php";?>
<body>
<?php include"headerAdmin.html";?>
<div class="main_slider">
  <div class="container-fluid">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="modifproduit.php">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Customers.php">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categoryadmin.php">
                <span data-feather="bar-chart-2"></span>
                categorie
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajouteradmin.php">
                <span data-feather="bar-chart-2"></span>
                ajouter admin
              </a>
            </li>

        </div>
      </nav>
<?php
$data=$model->getCustomer();
$resultat ="
<h2 class='h2'>Table des clients</h2>
<div class='col-sm'>
<div class='mx-auto' style='width: 1000px;'>
<table class='table table-dark'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>id</th>
      <th scope='col'>firstname</th>
      <th scope='col'>lastname</th>
      <th scope='col'>telephone</th>
      <th scope='col'>email</th>
    </tr>
  </thead>";
  foreach ($data as $key => $value) {
$resultat .="<tbody>
      <tr>
        <th scope='row'>".$key=($key+1)."</th>
        <td>".$value["id"]."</td>
        <td>".$value["firstname"]."</td>
        <td>".$value["lastname"]."</td>
        <td>".$value["tel"]."</td>
        <td>".$value["email"]."</td>
      </tr>
      ";
  }
  $resultat .="</tbody></table></div></div>";?>
<br>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<?php echo $resultat ?>
</main>
</div>
</div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
    </body>

    </html>
