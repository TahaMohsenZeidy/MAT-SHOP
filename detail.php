<?php 
require'header.php';
require'head.php';
include"data/DataLayer.php";//base de donnees
$model=new DataLayer();//instance de DataLayer
//$category = $model->getCategory();
include"src/functions.php";//fonctions d'affichage


?>
<html>
<body>
<br>
</br>
<br>
</br>
<br>
</br>

<?php 
error_reporting(0);
session_start();
  if(!isset($_SESSION['panier'])){
	                                 $tab=array();
                                   //echo"<br><br><br><br><br> non";
                                   //print_r($_SESSION);
	                                 $_SESSION['panier']=$tab;
									                 $_SESSION['size']=0;
                                       }else{
										   if(isset($_POST['id'])){
                        // echo"<br><br><br><br><br> oui";
                        
									   array_push($_SESSION["panier"],$_POST["id"]);
									  // print_r($_SESSION["panier"]);
									   $_SESSION['size']=$_SESSION['size']+1;}}
 
global $model;
$data=$model->getProduct(null,null,$_GET['id']);
foreach ($data as $key => $value){
  $prix=$value["price"];
  $name=$value["name"];
  $id=$value["id"];
  $description=$value["description"];
  $img='produit'.'/'.$value["image"];}
echo " 

<div class='container'style='margin-top:50px;'>

  <div class='row'> 
    <div class='col-4'>

      <img src=$img style='height:350px;' />
    </div>  
    <div class='product-item men' style='display:inline-block; width:650px;height:350px;'>
    <div style='margin-left:20px;margin-right:20px;'>

     <h4 style='margin-top:20px;'>$description</h4>
     <h2 style='margin-top:50px; color:#fe4c50';>$prix dt</h2>
     <form  action='' method='post'>
     <button  type='submit' class='button' name='id' value=$id style='margin-top:30px;'><i class='fa fa-shopping-cart'></i> J'ACHETE
     </button>
     </form>
    </div>
  </div>
 </div>
</div>

<style>
.button {
  width:600px;
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

?>
</body>
<?php
require 'footer.php';
?>


</html>