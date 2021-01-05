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

        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                 <h2 class="h2">Ajouter des categories</h2>
        </div>
               <form  method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                      <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="nom du categorie">
                  </div>
                  <div class="col">
                  <input type="submit" name="submit" value="ajouter" class="btn btn-primary">
                </div>
              </form>


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
      <th scope='col'>nom du categorie</th>
    </tr>
  </thead>";
  $data=$model->getCategory();
  foreach ($data as $key => $value) {
    $id=$value["id"];
$resultat .="<tbody>
      <tr>
        <th scope='row'>".$key=($key+1)."</th>
        <td>".$value["id"]."</td>
        <td>".$value["name"]."</td>
        <form method='post'>
        <td><button type='submit' name='supp' value='$id' onClick='confirmer()' class='btn btn-danger'>supprimer</button></td>
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
      if(isset($_POST["submit"])) {
        $model->insertCategory($_POST["name"]);
        header( "Location: categoryadmin.php" );
        exit(0);
      }
      if(isset($_POST["supp"])){
        echo "<script>
        var res = confirm('Êtes-vous sûr de vouloir supprimer  ?');
          if(res==true){
             ". $model->deletecategory($_POST['supp']) ."
          }
          else{
            //confirm('Êtes ');
          }
         </script>";
         header( "Location: categoryadmin.php" );
         exit(0);
      }


      ?>
