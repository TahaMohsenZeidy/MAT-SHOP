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
                        <!--<input type="text" name="categ" class="form-control" placeholder="categorie:1,2,3..">-->
                        <select name="categ" class="custom-select" id="inputGroupSelect01">
                          <?php $category = $model->getCategory();
                          foreach($category as $id => $name): ?>
                              <li><option value=<?php echo $id+1; ?>><?php echo $name['name'];?></option></li>
                          <?php endforeach; ?>
                        </select>
                      </div>
  					<div class="col">
                        <input type="file" name="img" class="form-control" >
                      </div>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary">
              </form>


<br>
<?php
$resultat ="
<h2 class='h2'>Table des produits</h2>
<div class='col-sm'>
<div class='mx-auto' style='width: 1000px;'>
<table class='table table-dark'>
  <thead class='tab'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>id</th>
      <th scope='col'>nom</th>
      <th scope='col'>prix</th>
      <th scope='col'>quantité</th>
      <th scope='col'>promotion</th>
      <th scope='col'>image</th>
      <th scope='col'>
      <form method='post' action=''>
      <div class='input-group'>
   <input size='30' type='text' id='a' name='recherche' class='form-control'   placeholder='Rechercher un produit ' >
   <span class='input-group-btn'>
        <button class='btn btn-danger' name='rech' style='width: 60px; background: #fe4c50' type='submit'><i class='fa fa-search'  aria-hidden='true'></i></button>
   </span>
   </div>
   </form>
      </th>
     </tr>
  </thead>
  ";
if(!isset($_POST["rech"])){
$data=$model->getProduct();
  foreach ($data as $key => $value) {
    $id=$value["id"];
    $newprix="";
    if(($value['promotion']==null) || ($value['promotion']==0) ){
      $value['promotion']=0;
    }
    else{
      $newprix="prix:";
      $newprix.=$value["price"]-($value["price"]*$value['promotion'])/100 ." dt";
    }
    $img='produit'.'/'.$value["image"];
$resultat .="<tbody>
      <tr>
        <th scope='row'>".$key=($key+1)."</th>
        <td>".$value["id"]."</td>
        <td>".$value["name"]."</td>
        <td>".$value["price"]."dt</td>
        <td>".$value["stock"]."</td>
        <td>".$value["promotion"]."%<br>$newprix</td>
        <td><img src=$img alt='' width=225 height=225></td>
        <form method='post'>
        <td><button type='submit' name='supp' value='$id' onClick='confirmer()' class='btn btn-danger'>supprimer</button>
<br>
        <div class='input-group'>
     <input size='30' type='text' id='a' name='prom' class='form-control'   placeholder='ajouter promotion' >
     <span class='input-group-btn'>
          <button class='btn btn-danger' name='subpro' value=$id style='width: 60px; background: #fe4c50' type='submit'><i class='fas fa-plus'></i></button>
     </span>
     </div>
        </td>
        </form>
      </tr>
      ";
  }
  $resultat .="</tbody></table></div></div>";}
  if(isset($_POST["rech"])){
    $rech=$model->rechercher($_POST["recherche"]);
      foreach ($rech as $key => $value) {
        $id=$value["id"];
        $newprix="";
        if(($value['promotion']==null) || ($value['promotion']==0) ){
          $value['promotion']=0;
        }
        else{
          $newprix="prix:";
          $newprix .=$value["price"]-($value["price"]*$value['promotion'])/100 ." dt";
        }
        $img='produit'.'/'.$value["image"];
    $resultat .="<tbody>
          <tr>
            <th scope='row'>".$key=($key+1)."</th>
            <td>".$value["id"]."</td>
            <td>".$value["name"]."</td>
            <td>".$value["price"]."dt</td>
            <td>".$value["stock"]."</td>
            <td>".$value["promotion"]."%<br>$newprix</td>
            <td><img src=$img alt='' width=225 height=225></td>
            <form method='post'>
            <td><button type='submit' name='supp' value='$id' onClick='confirmer()' class='btn btn-danger'>supprimer</button>
            <div class='input-group'>
         <input size='30' type='text' id='a' name='prom' class='form-control'   placeholder='ajouter promotion ' >
         <span class='input-group-btn'>
              <button class='btn btn-danger' name='subpro' value=$id style='width: 60px; background: #fe4c50' type='submit'><i class='fas fa-plus'></i></button>
            </td>
            </form>
          </tr>
          ";
      }
      $resultat .="</tbody></table></div></div>";

  }
  ?>
<br>
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

      <?php
       $target_dir = "produit/";
      if(isset($_POST["submit"])) {
      	//print_r($_FILES["img"]);
      	move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir.$_FILES["img"]["name"]);
        //print_r($_POST);
        $var=$_FILES["img"]["name"];
        $model->insertProduct($_POST["nomprod"],$_POST["description"],$_POST["aprix"],$_POST["stock"],$_POST["categ"],$var);
      }?>
      <?php if(isset($_POST["supp"])){$model->deleteprod($_POST['supp']);}
            if(isset($_POST["subpro"])){$model->updatePromotion($_POST['prom'],$_POST["subpro"]);}


      ?>
