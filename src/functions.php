<?php
require"head.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function produit(){
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

function inscription(){
    $result = '<div class="mx-auto" style="width: 500px;">
    <div class="card text-white bg-primary mb-3" style="max-width: 30rem;">
  <div class="card-body">
    <h5 class="card-title text-white">registrer</h5>
    <form class="" action="ajouter.php" method="post">
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
    </div>
    </div>
  </div>';
    return $result;
}

function ajouter (){
  global $model;
  $firstname = $_POST["nom"];
$email = $_POST["email"];
$password = $_POST["password"];
$data = $model->createCustomers($firstname,$email,$password);
//session_start();
if(isset($data)){
$_SESSION["nom"]=$firstname;
$_SESSION["email"]=$email;
$_SESSION["connect"]="oui";
Header("Location:/MVC");}
}

function deconnecter(){
  session_start();
  session_unset();
  session_destroy();
  Header("Location:/MVC");
}

function connecter(){
  $resultat="<br><br>
  <div class='mx-auto' style='width: 500px;'>
  <div class='card text-white bg-primary' style='width: 30rem;'>
  <div class='card-body'>
  <h5 class='card-title text-white'>connexion</h5>";
  if(isset($_SESSION["deconnect"]) ){
    $resultat .='<div class="alert alert-danger" role="alert">
    mot de passe incorrect
    </div>';}

  $resultat .="<form  action='authentifier.php' method='post'>

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
    <a href='mdpoublie.php' class='card-title text-white'>mot de passe oublié</a>
  </form>
  </div>
  </div>
</div>";

return $resultat;
}
function mdpoublie(){
  global $model;
  include "views/mdpoublie.php";
  exit(0);
}

function authentifier(){
  global $model;
  if(isset($_POST["email"]) && isset($_POST["password"])){
$email = $_POST["email"];
$password = $_POST["password"];
$data=$model->authentifier($email,$password);}
if(isset ($data)){
if($data){
//session_start();
$_SESSION["nom"]=$data["firstname"];
$_SESSION["email"]=$data["email"];
$_SESSION["connect"]="oui";
//print_r($_SESSION);
//exit(0);
Header("Location:/MVC");
}
else{
  $_SESSION["deconnect"]="oui";
  Header("Location:/MVC/connecter.php");
}
}
}

function showpanier(){
  //tr :ligne
  global $model;
  //ini_set( "display_errors", 0);
  //session_start();
  $result = '
  <div class="super_container">
  <div class="mx-auto" style="width: 1000px;">
  <div class="card text-white " style="width: 60rem;">
  <div class="card-body">
  <table class="table">
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
  $redon=(array_count_values($_SESSION['panier']));//qte de chaque id; id=>qte
  $unique = array_unique((array)$_SESSION['panier']);//nbr de id sans redon
   $total_price = 0;
   $_SESSION["total"]=array();
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
      <td><img src=$img width=225 height=225 /></td>
  	<td>".$prix*$qte."</td>
  	<td>".$qte."
    </td>
    <td>
    <form style=".'float:right; padding:1 0px;'." action='achat.php' method='post'>
    <input type='hidden' name='qte' value=$qte />
    <button type='submit' class='btn btn-success' name='id1' value=$id  >acheter</button>
    </form>
    <form style=".'float:right; padding:10px;'." action='supprimer.php' method='post'>
    <button type='submit' class='btn btn-danger' name='supp' value=$key  >supprimer</button>
    </form>
    </td>
    </tr>";
    array_push($_SESSION["total"],$qte);
    $total_price +=  $table["price"]*$redon[$value];

  }
    $result .= "<tr><td></td><td></td><td></td><td>Prix total (HT)</td><td>".number_format($total_price,2)."dt
    <form action='achat.php' method='post'>
    <button type='submit' class='btn btn-success' name='id2' value=$total_price >acheter</button>
    </form>
    </td><td></td></tr>
    </div>
    </div>
    </div>
    </div>
    <style>
    super_container {
  position: absolute;
  top: 50px;
  border: 3px solid green;
}
    <style>
    ";

return $result;
}

function achat(){
  //session_start();
  global $model;
  $email=$_SESSION["email"];
  $tab=$model->getoneCustomer($email);
  $idCustomer=$tab[0]["id"];
  $infoclient=$model->getCustomer($idCustomer);
  $to_email =$email ;
  $subject = "vos achats";
  $body = "dans deux jours sera delivrer \n contact:24******\n";
  $headers = "From: ayoubyaich85@gmail.com";
  if($_SESSION["connect"]!="oui" ){
     Header("Location:/MVC/connecter.php");
  }
  elseif(isset($infoclient["tel"]) && isset($infoclient["lastname"]) && isset($infoclient["adresse"])){
    Header("Location:/MVC/updateprofil.php");
  }

  elseif(isset($_POST["id1"])){
    $data=$model->getProduct(null,null,$_POST["id1"]);
    $idprod=$data["0"]["id"];
    $body .= "nom du produit:".$data["0"]["name"]." |  quantité:".$_POST["qte"];
    $t=$model->createOrders($idCustomer,$idprod,$_POST["qte"],$data["0"]["price"]*$_POST["qte"]);
    mail($to_email, $subject, $body, $headers);
    Header("Location:/MVC/showpanier.php");
  }
  else{
    $total=array_count_values($_SESSION['panier']);//id=>qte
    foreach ($total as $key => $value) {
      $data=$model->getProduct(null,null,$key);
      $body.= "nom du produit:".$data["0"]["name"]." |  quantité:".$value."\n";
      $idprod=$data["0"]["id"];
      $t=$model->createOrders($idCustomer,$idprod,$value,$data["0"]["price"]*$value);
      Header("Location:/MVC/showpanier.php");
    }
    mail($to_email, $subject, $body, $headers);
  }

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
  //error_reporting(0);
  //session_start();
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
//error_reporting(0);
//session_start();
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


}


//this functions gets the products sorted by range

function getPriceRange(){
  global $model;
  $prRangeNum = substr($_POST['amount'], 6);
  $prRangeFloat = floatval($prRangeNum);
  $data = $model->getProductsByPrice($prRangeFloat);
  $resultat="";
  foreach ($data as $value){
    $prix=$value["price"];
    $name=$value["name"];
    $id=$value["id"];
    $img='produit'.'/'.$value["image"];
    $resultat .="
    <div class='product-item men' style='display:inline-block; width:236.8px;'>
      <div class='product discount product_filter'>
        <div class='product_image'>
          <img src=$img alt='' width=225 height=225  >
        </div>
        <div class='favorite favorite_left'></div>
        <div class='product_info'>
          <h6 class='product_name'><a href ='http://localhost/MVC/detail.php?id=$id'> $name </a></h6>
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
    </style>";
    }
return "
<div class='row' style='margin-left:150px;' >
  <div class='col' >
    <div class='product-grid' data-isotope='{ 'itemSelector': '.product-item', 'layoutMode': 'fitRows' }>".$resultat."
    </div>
  </div>
</div> ";
}
/*******profil du client *****/
function account(){
global $model;
//session_start();
$mail=$_SESSION["email"];
$data=$model->getoneCustomer($mail);
    if($data[0]["sexe"]==1){
      $data[0]["sexe"] = "Masculin";
    }else{
      $data["0"]["sexe"] = "Féminin";
    }

//print_r($data);
  $result = '
  <div class="mx-auto" style="width: 500px;">

  <ul class="list-group">
  <li class="list-group-item active">Bienvenu sur votre Profil '.$data[0]["firstname"].'</li>
  <li class="list-group-item"> Sexe : '.$data[0]["sexe"].'</li>
  <li class="list-group-item"> Nom : '.$data[0]["lastname"].'</li>
  <li class="list-group-item"> Prénom : '.$data[0]["firstname"].'</li>
  <li class="list-group-item"> Email : '.$data[0]["email"].'</li>
  <li class="list-group-item"> telephone : '.$data[0]["tel"].'</li>
  <li class="list-group-item"> Adresse Livraison : '.$data[0]["adresse"].'</li>
</ul>


  <div class="mt-2">
  <a href="updateprofil.php" class="btn btn-success">Mettre à jour mes données</a>
  </div>
  </div>
  ';
  return $result;
}
function updateprofil(){
  global $model;
  //session_start();
  $mail=$_SESSION["email"];
  $data=$model->getoneCustomer($mail);
  print_r($data);
  $result = '
  <div class="mx-auto" style="width: 500px;">
  <form action="updateAction.php" method="post">
      <div class="form-row">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Sexe</label>
        </div>
        <select name="sexe" class="custom-select" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="1">Masculin</option>
          <option value="2">Féminin</option>
        </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Nom </label>
      <input type="text" name="firstname" value="'.$data[0]["firstname"].'" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Prénom </label>
      <input type="text" name="lastname" value="'.$data[0]["lastname"].'" class="form-control" id="inputPassword4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email </label>
      <input type="text" name="email" value="'.$data[0]["email"].'" class="form-control" id="inputPassword4">
    </div>

  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputPassword4">Adresse de Livraison </label>
        <input type="text" name="adresse_livraison" value="'.$data[0]["adresse"].'" class="form-control" id="inputPassword4">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Téléphone </label>
        <input type="text" name="tel" value="'.$data[0]["tel"].'" class="form-control" id="inputPassword4">
      </div>
</div>
<input type="submit" name="update" class="btn btn-primary">
</form>
</div>
  ';
return $result;
}
function updateAction(){
  //Header("Location:/MVC/updateprofil.php");
  //print_r($_POST);
  global $model;
  $data=$model->getoneCustomer($_POST["email"]);
  $_POST["id"]=$data[0]["id"];
  $r = $model->updateInfosCustomer($_POST);
if($r){
  $resultat = '<p class="btn btn-success btn-block">Mise à jour réussie</p>';
}else{
  $resultat = '<p class="btn btn-danger btn-block">Mise à jour échouée</p>';
}
Header("Location:/MVC/account.php");
//return $resultat;
}

/************     partie admin    *******************/
function admin(){
  $resultat="
  <div class='mx-auto' style='width: 500px;'>
  <div class='card text-white bg-primary' style='width: 30rem;'>
  <div class='card-body'>
  <h5 class='card-title text-white'>inscrivez-vous</h5>";
  if(isset($_SESSION["falsemdp"]) ){
    $resultat .='<div class="alert alert-danger" role="alert">
    mot de passe incorrect
    </div>';}
  $resultat .="<form  action='authentifieradmin.php' method='post'>
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
  </div>
  </div>
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
//session_start();
//$_SESSION["nom"]=$data["firstname"];
$_SESSION["emailadmin"]=$data["email"];
//$_SESSION["connect"]="oui";
//print_r($_SESSION);
Header("Location:/MVC/dashboard.php");
}
else{
  $_SESSION["falsemdp"]="oui";
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
function categoryadmin(){
global $model;
include "views/categoryadmin.php";
exit(0);
}
function achatadmin(){
global $model;
include "views/achatadmin.php";
exit(0);
}
function ajouteradmin(){
global $model;
include "views/ajouteradmin.php";
exit(0);
}
function promotion(){
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
$data=$model->promotion();
//print_r($data);
//exit(0);
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