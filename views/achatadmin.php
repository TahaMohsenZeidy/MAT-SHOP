<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include"head.php";?>
<body>
<?php include"headerAdmin.html";?>
<div class="main_slider">
  <div class="container-fluid">
    <?php //include "../head.php";
    //include "../data/DataLayer.php";
    //$model=new DataLayer();//instance de DataLayer
    $data=$model->getorders();
    $resultat ="

    <div class='col-sm'>
    <div class='mx-auto' style='width: 600px;'>
    <table class='table table-dark'>
      <thead>
        <tr>
          <th scope='col'>#</th>
          <th scope='col'>id</th>
          <th scope='col'>id_customers</th>
          <th scope='col'>id_product</th>
          <th scope='col'>quantity</th>
          <th scope='col'>price</th>
          <th scope='col'>created_at</th>
        </tr>
      </thead>";
      $a1=0;
      $a2=0;
      $a3=0;
      $a4=0;
      $a5=0;
      $a6=0;
      $a7=0;
      $a8=0;
      $a9=0;
      $a10=0;
      $a11=0;
      $a12=0;
      foreach ($data as $key => $value) {
        $resultat .="<tbody>
          <tr>
            <th scope='row'>".$key=($key+1)."</th>
            <td>".$value["id"]."</td>
            <td>".$value["id_customers"]."</td>
            <td>".$value["id_product"]."</td>
            <td>".$value["quantity"]."</td>
            <td>".$value["price"]."</td>
            <td>".$value["created_at"]."</td>
          </tr>

          ";
      }
      $resultat .="</tbody></table></div></div></div>";

    ?>
<br>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<?php echo $resultat; ?>
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
