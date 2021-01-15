<?php
include"../data/DataLayer.php";//base de donnees
$model=new DataLayer();//instance de DataLayer
//$data=$model->getordersbycustomer(63);
$data2=$model->getorders();
$idclient=array();
foreach ($data2 as $key => $value) {
  array_push($idclient,$value["id_customers"]);
}
$idclient = array_unique($idclient);
$resultat ="
<div class='col-sm'>
<div class='mx-auto' style='width: 1000px;'>
<div id='result'>
<table class='table table-dark'>
  <thead class='tab'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>id _client</th>
      <th scope='col'>id_produit</th>
      <th scope='col'>quantité</th>
      <th scope='col'>prix</th>
      <th scope='col'>date</th>
      <th scope='col'>validation</th>
     </tr>
  </thead>
  <tbody>
  ";
  $i=1;
  foreach ($idclient as $key => $value) {
    $databycustomer=$model->getordersbycustomer($value);
$resultat .="
      <tr>
        <th scope='row'>".$i++."</th>
        <td>".$value."</td>";
        $validation="";
        foreach ($databycustomer as $key => $value) {
          $prod=$model->getProduct(NULL,NULL,$value["id_product"]);
          $stock=$prod[0]["stock"];
          if($stock>=$value["quantity"]){
            $validation="validé";
          }
          else{
            $validation="non validé";
          }
          $resultat .="
          <tr>
          <th scope='row'></th>
          <td></td>
          <td>".$value["id_product"]."</td>
          <td>".$value["quantity"]."</td>
          <td>".$value["price"]."</td>
          <td>".$value["created_at"]."</td>
          <td>".$validation."</td>
          </tr>";
        }

      $resultat .="</tr>";
  }
      $resultat .="</tbody></table></div></div></div>
      ";

echo $resultat;
?>
