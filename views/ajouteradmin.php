<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include"head.php";?>
<body>
<?php include"headerAdmin.html";?>
<div class="main_slider">
  <div class="container-fluid">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <span data-feather="home"></span>
              <i class="fas fa-tachometer-alt"></i>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modifproduit.php">
              <span data-feather="shopping-cart"></span>
              <i class="fas fa-cubes"></i>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Customers.php">
              <span data-feather="users"></span>
              <i class="fas fa-user"></i>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categoryadmin.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-cog"></i>
              catégories
            </a>
          </li>
          <?php /*if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
          $a=$model->getAdmin($_SESSION["emailadmin"]);
          if($a[0]["priorite"]==1):*/
          ?>
          <li class="nav-item">
            <a class="nav-link" href="ajouteradmin.php">
              <span data-feather="bar-chart-2"></span>
             <i class="far fa-user"></i>
              ajouter admin
            </a>
          </li>
        <?php //endif; ?>
        </ul>

      </div>
    </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $a=$model->getAdmin($_SESSION["emailadmin"]);
        if($a[0]["priorite"]==1):?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                 <h2 class="h2">Ajouter admin</h2>
        </div>

        <div class='mx-auto' style='width: 500px;'>
  <div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
  <div class="card-body">
    <h5 class="card-title text-white">Ajouter admin</h5>
        <form  method='post'>

          <!-- Input -->
          <div class='mb-3'>
            <div class='input-group input-group form'>
              <input type='email' class='form-control' name='email'  placeholder='Entrez votre adresse email' aria-label='Entrez votre adresse email'>
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class='mb-3'>
            <div class='input-group input-group form'>
              <input type='password' class='form-control' name='password'   placeholder='Entrez votre mot de passe' aria-label='Entrez votre mot de passe'>
            </div>
          </div>
          <!-- End Input -->

          <button type='submit' name='ajouter' value='ajouter' class='btn btn-block btn-primary'>ajouter</button>
        </form>
      </div>
    </div>
      </div>
<?php endif;?>

<br>
<?php
$resultat ="
<div class='col-sm'>
<h2 class='h2'>Table des categories</h2>
<div class='mx-auto' style='width: 1000px;'>
<table class='table table-dark'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>id</th>
      <th scope='col'>email</th>
    </tr>
  </thead>";
  $data=$model->getadmins();
  foreach ($data as $key => $value) {
    $id=$value["id_root"];
    if($a[0]["priorite"]==1){
    $sup="<form method='post'>
    <td><button type='submit' name='supp' value='$id' onClick='confirmer()' class='btn btn-danger'>supprimer</button></td>";
  }else{$sup="";}
$resultat .="<tbody>
      <tr>
        <th scope='row'>".$key=($key+1)."</th>
        <td>".$value["id_root"]."</td>
        <td>".$value["email"]."</td>
        <td>".$sup."</td>
        </form>
      </tr>
      ";
  }
  $resultat .="</tbody></table></div></div>";?>
<br>
<div class="row mb-3">
<?php echo $resultat ?>
</div>
</main>
</div>
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

      <?php
      if(isset($_POST["ajouter"])) {
        //print_r($_POST);
        $model->createAdmin($_POST["email"],$_POST["password"]);
        //header( "Location: ajouteradmin.php" );
        //exit(0);
      }
      if(isset($_POST["supp"])){
        echo "<script>
        var res = confirm('Êtes-vous sûr de vouloir supprimer  ?');
          if(res==true){
             ". $model->deleteadmin($_POST['supp']) ."
          }
         </script>";
         header( "Location: categoryadmin.php" );
         exit(0);
      }


      ?>
