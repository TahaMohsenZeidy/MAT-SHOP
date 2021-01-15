<?php
include"../data/DataLayer.php";//base de donnees
$model=new DataLayer();//instance de DataLayer
$client=$model->getCustomer($_GET["code"]);
$id=$client[0]["id"];
$name=$client[0]["firstname"];
//print_r($orders);
$orders=$model->getordersbycustomer($id);
$resultat='<table class="table table-bordered border-primary">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">id</th>
    <th scope="col">Firstname</th>
    <th scope="col">Lastname</th>
    <th scope="col">telephone</th>
    <th scope="col">adresse</th>
  </tr>
</thead><tbody>';
$resultat .='
    <tr>
    <th scope="row">client</th>
      <td>'.$id.'</td>
      <td>'.$client[0]["firstname"].'</td>
      <td>'.$client[0]["lastname"].'</td>
      <td>'.$client[0]["tel"].'</td>
      <td>'.$client[0]["adresse"].'</td>
    </tr></tbody></table>';
    $resultat .='
    <table class="table table-bordered border-primary">
    <thead>
    <tr>
    <th scope="row">id_commande</th>
    <th scope="row">id_produit</th>
    <th scope="col">quantité</th>
    <th scope="col">prix</th>
    <th scope="col">date</th>
    </tr>
     ';
    foreach ($orders as $key => $value) {
      $resultat .='<tr>
      <td>'.$value["id"].'</td>
      <td>'.$value["id_product"].'</td>
      <td>'.$value["quantity"].'</td>
      <td>'.$value["price"].'</td>
      <td>'.$value["created_at"].'</td>';
    }
    $resultat .='</tr></tbody></table>';
    echo $resultat;
?>
