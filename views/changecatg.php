<?php
include"../data/DataLayer.php";//base de donnees
$model=new DataLayer();//instance de DataLayer
$data=$model->getProduct(null,$_GET["code"],null);
$resultat ="
<div class='col-sm'>
<div class='mx-auto' style='width: 1000px;'>
<div id='result'>
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
        <td>"
        .$value["stock"]
        ."<form action='modifproduit.php' method='POST'>
        <input placeholder='modifier qte en stock' id='number' name='newstock' type='number' min='0'>
        <input type='hidden' name='idstock'  value=$id>
        </form>
        </td>
        <td>".$value["promotion"]."%<br>$newprix.<br>
        <form action='modifproduit.php' method='POST'>
        <input size='30' type='number' min='0' id='a' name='prom' class='form-control' placeholder='ajouter promotion' >
        <input type='hidden' name='subpro'  value=$id>
        </form>
        </td>
        <td><img src=$img alt='' width=225 height=225></td>
        <form method='post'>
        <td><button type='submit' name='supp' value='$id' onClick='confirmer()' class='btn btn-danger'>supprimer</button>
        </td>
        </form>
      </tr>
      ";
  }
  $resultat .="</tbody></table></div></div></div>";
  if(isset($_POST["supp"])){$model->deleteprod($_POST['supp']);}
        if(isset($_POST["subpro"])){$model->updatePromotion($_POST['prom'],$_POST["subpro"]);}
        if(isset($_POST["newstock"])){
          $model->updatestock($_POST['idstock'],$_POST["newstock"]);
        }

echo $resultat;



?>
