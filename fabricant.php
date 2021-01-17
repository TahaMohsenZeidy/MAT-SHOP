<?php
include"data/DataLayer.php";//base de donnees
$model=new DataLayer();//instance de DataLayer

// $path = $_SERVER['DOCUMENT_ROOT'];
// $path .= "/MVC/src/functions.php";
// require_once($path);


function getProductsByFab(){
  global $model;
  foreach ($_GET as $key => $el){
    $id = $el;
}
  $data = $model->getProductsByF($id);
  //print_r($data);
  $resultat="";
foreach ($data as $key => $value){
  $prix=$value["price"];
  $name=$value["name"];
  $id=$value["id"];
  $promotion=$value["promotion"];
  $new_prix=$prix-($prix*$promotion)/100;
  $img='produit'.'/'.$value["image"];
  $resultat .="
             <div class='product-item men' style='display:inline-block; width:236.8px;'>
              <div class='product discount product_filter'>
                <div class='product_image'>
                  <img src=$img alt='' width=225 height=225  >
                </div>
                <div class='favorite favorite_left'></div>";
                if ($promotion!= null) {

                    $resultat.= "<div class='product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center'><span>-$promotion % </span></div>";
                  }
                  $resultat.="
                <div class='product_info'>

                  <h6 class='product_name'><a href ='http://localhost/MVC/detail.php?id=$id'> $name </a></h6>";
                   if ($promotion!= null) {
                    $resultat.="<div class='product_price'>$new_prix dt<span>$prix dt</span></div>";}

                   else{
                  $resultat.=" <div class='product_price'>$prix dt</div>";}
                  $resultat.="
                </div>
              </div>
              <div class='red_button add_to_cart_button'>
              <form  action='' method='post'>

                <button type='submit'  class='button' name='id' value=$id>Ajouter au panier </button>

              </form>

              </div>
            </div>
            <style>
.button {
  width:236.8;
  height:40px;
  background-color:#fe4c50;
  border: none;
  color: white;
  padding: 1px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;


</style>
           ";

}
return "
<div class='row' style='margin-left:150px;' >
      <div class='col' >
          <div class='product-grid' data-isotope='{ 'itemSelector': '.product-item', 'layoutMode': 'fitRows' }>".$resultat."</div> </div></div> ";


}

echo "<div class=".'super_container'.">";
echo getProductsByFab();
echo "</div></div>";

