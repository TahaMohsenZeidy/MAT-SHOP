<?php
//slt
//ayoub
//include"config/config.php";
include"data/DataLayer.php";//base de donnees
$model=new DataLayer();//instance de DataLayer
$category = $model->getCategory();
//print_r($category);
//exit(0);
include"src/functions.php";//fonctions d'affichage
$url = trim($_SERVER['REQUEST_URI'],'/');//string
$url = explode('/',$url);//tableau
//print_r($url);
//exit(0);
$route = array("produit.php","achat.php","showpanier.php","ajouter.php","authentifier.php","modifierQte.php",
                    "inscription.php","connecter.php","administration.php","deconnecter.php","supprimer.php",
                    "categorie.php","admin.php","authentifieradmin.php","ajouterproduit.php","recherche.php",
                    "modifproduit.php","dashboard.php","Customers.php", "getPriceRange.php","categoryadmin.php",
                  "achatadmin.php","account.php","updateprofil.php","updateAction.php","ajouteradmin.php",
                "mdpoublie.php");
$tabcategory=array();
foreach ($category as $key => $value) {
  array_push($tabcategory,$key);
}
 //print_r($tabcategory);
// exit(0);
    // controller
		if(!isset($url[1]) ){//accede directement a la page d'accueil
			include"new_acc.php";//afficher seullement page accueil
			exit(0);
		}
		else if(in_array($url[1],$route) ){
        $function =$url[1];//function=produit.php
				$rest = substr($function, 0, -4);//retourner url sans .php return produit
        //print_r($url);
        //exit(0);
        $content = $rest();//produit()
    }
    else if(in_array($url[1],$tabcategory)){
      $content = categorie();//produit()
    }
    else if(!in_array($url[1],$route)){
        $content = "URL introuvable !";
    }




include"views/view.php";
 ?>
