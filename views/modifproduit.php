<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include"head.php";?>
<body>
<?php include"header.php";?>
<div class="main_slider">
  <div class="container-fluid">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
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
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <script>
      <?php
      $data=$model->getorders();
      foreach ($data as $key => $value) {
        $redon[$key]=$value["id_product"];
      }
      $result=array_count_values($redon);//[id_product]=>nbre de redon

      foreach ($result as $key => $value) {
        $oneprod=$model->getProduct(null,null,$key);
        $nom[$key]=$oneprod[0]['name'];
      }

      ?>

window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "les 3 meilleurs produits achetés id_produit-%"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
      <?php $i=0;
      arsort($result);
       foreach ($result as $key => $value) {
         $a=$nom[$key];?>
			{ y: <?php echo $value; ?>, label: <?php echo $key; ?> },
			<?php $i++;
    if($i == 3){break;}  }?>
		]
	}]
});
chart.render();

}
</script>
<div class="row">
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
<div class="row">
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                 <h2 class="h2">Ajouter des produits</h2>
        </div>
               <form method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                      <div class="col">
                        <input type="text" name="nomprod" class="form-control" placeholder="nom du produit">
                      </div>
                      <div class="col">
                        <input type="text" name="description" class="form-control" placeholder="description">
                      </div>
  					<div class="col">
                        <input type="text" name="aprix" class="form-control" placeholder="prix">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col">
                        <input type="text" name="stock" class="form-control" placeholder="stock">
                      </div>
                      <div class="col">
                        <input type="text" name="categ" class="form-control" placeholder="categorie:1,2,3..">
                      </div>
  					<div class="col">
                        <input type="file" name="img" class="form-control" >
                      </div>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary">
              </form>


<br>
<?php
$data=$model->getProduct();
$resultat ="
<h2 class='h2'>Table des produits</h2>
<div class='col-sm'>
<div class='mx-auto' style='width: 1000px;'>
<table class='table table-dark'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>id</th>
      <th scope='col'>nom du produit</th>
      <th scope='col'>prix</th>
      <th scope='col'>quantité</th>
      <th scope='col'>image</th>
    </tr>
  </thead>";
  foreach ($data as $key => $value) {
    $img='produit'.'/'.$value["image"];
$resultat .="<tbody>
      <tr>
        <th scope='row'>".$key=($key+1)."</th>
        <td>".$value["id"]."</td>
        <td>".$value["name"]."</td>
        <td>".$value["price"]."</td>
        <td>".$value["stock"]."</td>
        <td><img src=$img alt=''></td>
      </tr>
      ";
  }
  $resultat .="</tbody></table></div></div>";?>
<br>
<?php echo $resultat ?>
</main>
</div>
</div>
    <?php include"footer.php"?>

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
       $target_dir = "produit/";
      if(isset($_POST["submit"])) {
      	//print_r($_FILES["img"]);
      	move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir.$_FILES["img"]["name"]);
        //print_r($_POST);
        $var=$_FILES["img"]["name"];
        $model->insertProduct($_POST["nomprod"],$_POST["description"],$_POST["aprix"],$_POST["stock"],$_POST["categ"],$var);
      }


      ?>
