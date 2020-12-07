<?php
require"head.php";

function produit(){
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
                         print_r($_POST);
									   array_push($_SESSION["panier"],$_POST["id"]);
									  // print_r($_SESSION["panier"]);
									   $_SESSION['size']=$_SESSION['size']+1;}}

global $model;
$data=$model->getProduct();
//print_r($data);
//exit(0);
//print_r($data);
$resultat="";
foreach ($data as $key => $value){
   $prix=$value["price"];
  $name=$value["name"];
  $id=$value["id"];
  $img='produit'.'/'.$value["image"];
  $resultat .="


             <div class='product-item men' style='display:inline-block; width:236.8px;'>
              <div class='product discount product_filter'>
                <div class='product_image'>
                  <img src=$img alt=''>
                </div>
                <div class='favorite favorite_left'></div>

                <div class='product_info'>
                  <h6 class='product_name'>$name </a></h6>
                  <div class='product_price'>$prix dt</div>
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

function inscription(){
    $result = '<div class="mx-auto" style="width: 500px;">
    <form class="" action="ajouter.php" method="post">
      <div class="mb-4">
        <h2 class="h4">INSCRIPTION</h2>
      </div>

      <!-- Input -->
      <div class=" mb-3">
        <div class="input-group input-group form">
          <input type="text" name="nom" class="form-control "  required="" placeholder="Entrer votre Pseudo" aria-label="Entrer votre Pseudo">
        </div>
      </div>
      <!-- End Input -->

      <!-- Input -->
      <div class=" mb-3">
        <div class="input-group input-group form">
          <input type="email" class="form-control " name="email"  required="" placeholder="Entrez votre adresse email" aria-label="Entrez votre adresse email">
        </div>
      </div>
      <!-- End Input -->

      <!-- Input -->
      <div class=" mb-3">
        <div class="input-group input-group form">
          <input type="password" class="form-control " name="password"  required="" placeholder="Entrez votre mot de passe" aria-label="Entrez votre mot de passe">
        </div>
      </div>
      <!-- End Input -->

      <button type="submit" class="btn btn-block btn-primary">S\'inscrire</button>
    </form>
  </div>';
    return $result;
}

function ajouter (){
  global $model;
  $firstname = $_POST["nom"];
$email = $_POST["email"];
$password = $_POST["password"];
$data = $model->createCustomers($firstname,$email,$password);
session_start();
if(isset($data)){
$_SESSION["nom"]=$firstname;
$_SESSION["email"]=$email;
Header("Location:/MVC");}
}

function deconnecter(){
  session_start();
  session_unset();
  session_destroy();
  Header("Location:/MVC");
}

function connecter(){
  $resultat="<br><br><br><br>
  <div class='mx-auto' style='width: 500px;'>
  <form  action='authentifier.php' method='post'>

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

    <button type='submit' class='btn btn-block btn-primary'>S'inscrire</button>
  </form>
</div>";
return $resultat;
}


function authentifier(){
  global $model;
  if(isset($_POST["email"]) && isset($_POST["password"])){
$email = $_POST["email"];
$password = $_POST["password"];
$data=$model->authentifier($email,$password);}
if(isset ($data)){
if($data){
session_start();
$_SESSION["nom"]=$data["firstname"];
$_SESSION["email"]=$data["email"];
$_SESSION["connect"]="oui";
//print_r($_SESSION);
Header("Location:/MVC");
}}
}

function showpanier(){
  //tr :ligne
  global $model;
  ini_set( "display_errors", 0);
  session_start();
  $result = '<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col" width="500px">Description</th>
        <th scope="col" width="300px">Image</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantité</th>
        <th scope="col" width="220px">Action</th>
      </tr>
    </thead>
    <tbody>
  ';
  $redon=(array_count_values($_SESSION['panier']));//qte de chaque id
  $unique = array_unique((array)$_SESSION['panier']);//nbr de id sans redon
   $total_price = 0;
  foreach($unique as $key => $value){
  	$data = $model->getProduct(null,null,$value);
      $table=$data[0];
      $prix=$table['price'];
      $qte=$redon[$value];
      $id=$table['id'];
      //$_SESSION["0"]=$qte;
  	$img='produit'.'/'.$table["image"];
  		$result .= "<tr>
      <th scope='row'>".$table['id']."</th>
      <td>".$table['name']."</td>
      <td>".$table['description']."</td>
      <td><img src=$img /></td>
  	<td>".$prix*$qte."</td>
  	<td>".$qte."
    </td>
    <td>
    <form style=".'float:right; padding:1 0px;'." action='achat.php' method='post'>
    <button type='submit' class='btn btn-success' name='id1' value=$id  >acheter</button>
    </form>
    <form style=".'float:right; padding:10px;'." action='supprimer.php' method='post'>
    <button type='submit' class='btn btn-success' name='supp' value=$key  >supprimer</button>
    </form>
    </td>
    </tr>";
    $total_price +=  $table["price"]*$redon[$value];

  }
    $result .= "<tr><td></td><td></td><td></td><td>Prix total (HT)</td><td>".number_format($total_price,2)."€
    <form action='achat.php' method='post'>
    <button type='submit' class='btn btn-success' name='id2' value=$total_price >acheter</button>
    </form>
    </td><td></td></tr>";

return $result;
}

function achat(){
  session_start();
  global $model;
//  print_r($_POST["id1"]);
  $data=$model->getProduct(null,null,$_POST["id1"]);
  $email=$_SESSION["email"];
  $tab=$model->getoneCustomer($email);
  $idCustomers=$tab["0"]["id"];
  $idprod=$data["0"]["id"];
  //print_r($_SESSION);
  $t=$model->createOrders($idCustomers,$idprod,"1",$data["0"]["price"]);
  Header("Location:/MVC/showpanier.php");
}

function supprimer(){
  session_start();
  unset($_SESSION["panier"][$_POST["supp"]]);
  $_SESSION["size"]=$_SESSION["size"]-1;
  //print_r($_SESSION);
  //exit(0);

  Header("Location:/MVC/showpanier.php");
}

function categorie(){
  global $url;
  global $model;
  error_reporting(0);
  session_start();
    if(!isset($_SESSION['panier'])){
  	  $tab=array();
      //echo"<br><br><br><br><br> non";
      //print_r($_SESSION);
  	  $_SESSION['panier']=$tab;
  		$_SESSION['size']=0;
    }
    else{
  		if(isset($_POST['id'])){
        // echo"<br><br><br><br><br> oui";
        print_r($_POST);
  			array_push($_SESSION["panier"],$_POST["id"]);
  			// print_r($_SESSION["panier"]);
        $_SESSION['size']=$_SESSION['size']+1;
      }
    }
  $data=$model->getProduct(null,$url[1],null);

  // echo "<pre>";
  // var_dump($data);
  // echo "</pre>";
  // exit(0);
  //print_r($data);
  $resultat="";
  foreach ($data as $key => $value){
    $id=$value["id"];
  	$img='produit'.'/'.$value["image"];
  	$resultat .="
  <div class='card' style='width: 18rem; display:inline-block;'>
          <img src=$img class='card-img-top'>
  		<div class='card-body'>
            <h5 class='card-title'></h5>
  <form  action='' method='post'>
            <a href='' class='btn btn-primary'>Détails</a>
            <button type='submit' class='btn btn-danger' name='id' value=$id>add</button>

  </form>
  		</div>
        </div>";
  }
  return "<div class='container'>".$resultat."</div>";
}

//hedhom li zed'hom taha

function addMessage(){
  global $model;
  $contact_name = $_POST["cname"];
  $contact_email = $_POST["cemail"];
  $contact_message = $_POST["cmessage"];
  $data = $model->createMessage($contact_name, $contact_email, $contact_message);
  //lazemni nziid js alert li yqolou rahou l message wsoll.
  Header("Location:/MVC/contact.php");
}

function newsletter(){
  echo "i am called w nabi";
  $to_email_address = $_POST['newsletter'];
  $subject = 'Welcome to our Site';
  $message = 'we love you';
  $headers = 'From: Taha&Ayoub&Mahdi@ENIS.tn';
  try{
    echo "ena rani lenna";
    mail($to_email_address,$subject,$message,$headers);
  }
  catch(Exception $e){
    echo 'Message: '.$e->getMessage();
  }
  Header('Location:/MVC/contact.php');
}
function recherche(){
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
$data=$model->rechercher($_POST['recherche']);
if(empty($data)){
  $resultat="<br></br><br></br>
  <div style='margin-left:350px;'>

  <h2> <h2 style='color:#fe4c50;'> Oups !<h2> Aucun résultat disponible </h2></br>
  <h4>- Vérifiez que vous n'avez pas fait de faute de frappe </h4>
  <h4>- Essayez avec un autre mot clé ou synonyme</h4>
  </div>
  ";
return $resultat;}
else {
foreach ($data as $key => $value){
  
  $prix=$value["price"];
  $name=$value["name"];
  $id=$value["id"];
  $img='produit'.'/'.$value["image"];
  $resultat .="


             <div class='product-item men' style='display:inline-block; width:236.8px;'>
              <div class='product discount product_filter'>
                <div class='product_image'>
                  <img src=$img alt=''>
                </div>
                <div class='favorite favorite_left'></div>

                <div class='product_info'>
                  <h6 class='product_name'>$name </a></h6>
                  <div class='product_price'>$prix dt</div>
                </div>
              </div>
              <div class='red_button add_to_cart_button'>
              <form  action='produit.php' method='post'>

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


}

/************     partie admin    *******************/
function admin(){
  $resultat="<br><br><br><br>
  <div class='mx-auto' style='width: 500px;'>
  <form  action='authentifieradmin.php' method='post'>

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

    <button type='submit' class='btn btn-block btn-primary'>S'inscrire</button>
  </form>
</div>";
return $resultat;
}

function authentifieradmin(){
  global $model;
  if(isset($_POST["email"]) && isset($_POST["password"])){
$email = $_POST["email"];
$password = $_POST["password"];
$data=$model->authentifierAdmin($email,$password);}
if(isset ($data)){
if($data){
session_start();
$_SESSION["nom"]=$data["firstname"];
$_SESSION["email"]=$data["email"];
$_SESSION["connect"]="oui";
//print_r($_SESSION);
Header("Location:/MVC/dashboard.php");
}
else{
  Header("Location:/MVC/admin.php");
}}
}
function dashboard(){
global $model;
include "views/dashboard.php";
exit(0);
}
function modifproduit(){
global $model;
include "views/modifproduit.php";
exit(0);
}
function Customers(){
global $model;
include "views/Customers.php";
exit(0);
}
