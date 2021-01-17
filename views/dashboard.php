<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include"head.php";?>
<body>
<?php include"headerAdmin.html";?>



<div class="main_slider">
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <span data-feather="home"></span>
              <i class="fas fa-tachometer-alt"></i>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modifproduit.php">
              <span data-feather="shopping-cart"></span>
              <i class="fas fa-cubes"></i>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Customers.php">
              <span data-feather="users"></span>
              <i class="fas fa-user"></i>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categoryadmin.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-cog"></i>
              catégories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajouteradmin.php">
              <span data-feather="bar-chart-2"></span>
             <i class="far fa-user"></i>
              ajouter admin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="commandes()" href="#" >
              <span data-feather="bar-chart-2"></span>
             <i class="fab fa-first-order"></i>
              Les commandes
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <h2 class="h2">nombre de visiteurs:<img src="https://hitwebcounter.com/counter/counter.php?page=7739516&style=0011&nbdigits=5&type=ip&initCount=0" title="Free Counter" Alt="web counter"   border="0" /></h2>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 id="title" class="h2">Dashboard</h2>
        <select id='sel' name='choix' onChange="changev(this.value)" class='form-select' aria-label='Default select example'>
        <option value='d' selected>bon de livraison</option>";
        <?php $clients = $model->getCustomer();
        foreach($clients as $key => $value):?>
          <?php $orders=$model->getordersbycustomer($value['id']);
           if(isset($orders[0]['id_customers'])): ?>
            <option value=<?php echo $value['id'] ?>>id:<?php echo $value['id']."  ".$value['firstname']?></option>
          <?php endif; ?>
          <?php endforeach ?>
        </select>
        <style>
        #sel{
          position:absolute;
          right: 30px;
          width:200px;
        }
        </style>
      </div>
      <?php //include "../head.php";
      //include "../data/DataLayer.php";
      //$model=new DataLayer();//instance de DataLayer
      $data=$model->getorders();
      	$a1=0;
      	$a2=0;
      	$a3=0;
      	$a4=0;
      	$a5=0;
      	$a6=0;
      	$a7=0;
      	$a8=0;
      	$a9=0;
      	$a10=0;
      	$a11=0;
      	$a12=0;
        foreach ($data as $key => $value) {
      		$rest = substr($value["created_at"], 5, 2);
      		//echo $rest;
      		if($rest=='08'){
      			$a8++;
      		}
          if($rest=='01'){
      			$a1++;
      		}
          if($rest=='02'){
      			$a2++;
      		}
          if($rest=='03'){
      			$a3++;
      		}
          if($rest=='04'){
      			$a4++;
      		}
          if($rest=='05'){
      			$a5++;
      		}
          if($rest=='06'){
      			$a6++;
      		}
          if($rest=='07'){
      			$a7++;
      		}
          if($rest=='09'){
      			$a9++;
      		}
          if($rest=='10'){
      			$a10++;
      		}
          if($rest=='11'){
      			$a11++;
      		}
          if($rest=='12'){
      			$a12++;
      		}
        }
        $arr=array($a1, $a2, $a3, $a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12);
        $max=max($arr);
        $min=min($arr);
      ?>
      <?php //chartContainer5
      $feedback=$model->getfeedback();
      $postive=array("nice","beautiful","good","like","love","amazing","tres","bien","joli","pas mal");
      $negative=array("boring","bad","not","didn't","don't","ne","pas","jamais","rien");
      $pos=0;
      $neg=0;
      foreach ($feedback as $key => $value) {
        for($i=0;$i<sizeof($postive);$i++){
        if(strpos($value["message"],$postive[$i]) !==false){
          $pos++;
          break;
        }
        if(strpos($value["message"],$negative[$i]) !==false){
          $neg++;
          break;
        }
      }
      }

       ?>
      <?php
      $cat=array();
      foreach ($data as $key => $value) {
        array_push($cat,$model->getProduct(null,null,$value["id_product"])[0]["category"]);
      }
      $categqte=array_count_values($cat);//[id_category]=>qte
      arsort($categqte);
      foreach ($categqte as $key => $value) {
              $nomcatg=$model->getCategoryid($key);
              $tnomcatg[$key]=$nomcatg[0]['name'];
            }

       ?>
<script type="text/javascript">
window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "nombre de ventes par mois",
    horizontalAlign: "left"
	},
  	axisY: {
      includeZero: true
    },
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
      	indexLabelFontSize: 16,
		indexLabelPlacement: "outside",
		dataPoints: [

			{ x: 1 , y: <?php echo $a1 ?> },
			{ x: 2, y: <?php echo $a2 ?> },
			{ x: 3, y: <?php echo $a3 ?> },
			{ x: 4, y: <?php echo $a4 ?> },
			{ x: 5, y: <?php echo $a5 ?> },
			{ x: 6, y: <?php echo $a6 ?> },
			{ x: 7, y: <?php echo $a7 ?> },
			{ x: 8, y: <?php echo $a8 ?>  },
			{ x: 9, y: <?php echo $a9 ?> },
			{ x: 10, y: <?php echo $a10 ?> },
			{ x: 11, y: <?php echo $a11 ?> },
			{ x: 12, y: <?php echo $a12 ?> },

		]
	}]
});
chart.render();

// Best Sellers

<?php
$data=$model->getorders();
//print_r($data);
foreach ($data as $key => $value) {
  $redon[$key]=$value["id_product"];
  $redonclient[$key]=$value["id_customers"];
}
$result=array_count_values($redon);//[id_product]=>nbre de redon
$resultclient=array_count_values($redonclient);
foreach ($result as $key => $value) {
  $oneprod=$model->getProduct(null,null,$key);
  $nom[$key]=$oneprod[0]['name'];
}
foreach ($resultclient as $key => $value) {
  $clientt=$model->getCustomer($key);
  $nomclient[$key]=$clientt[0]['firstname'];
}
?>


var chart = new CanvasJS.Chart("chartContainer2", {
theme: "light1", // "light1", "light2", "dark1", "dark2"
exportEnabled: true,
animationEnabled: true,
title: {
text: "les meilleurs produits achetés ",
horizontalAlign: "left"
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
// sorting ...
arsort($result);
 foreach ($result as $key => $value) {
   $a=$nom[$key];?>
{ y: <?php echo $value; ?>, label: "<?php echo $a ?>" },
<?php $i++;
if($i == 3){break;}  }?>
]
}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	title:{
		text:"les clients fideles",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
      <?php $i=0;
      arsort($resultclient);
       foreach ($resultclient as $key => $value) {
         $n=$nomclient[$key];?>
			{ y: <?php echo $value; ?>, label: '<?php echo "id:".$key." ".$n ?>' },
			<?php $i++;
    if($i == 3){break;}}?>
		]
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer4", {
theme: "light1", // "light1", "light2", "dark1", "dark2"
exportEnabled: true,
animationEnabled: true,
title: {
text: "les meilleurs categories ",
horizontalAlign: "left"
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
 foreach ($categqte as $key => $value) {
   $acatg=$tnomcatg[$key];?>
{ y: <?php echo $value; ?>, label: "<?php echo $acatg ?>" },
<?php $i++;
if($i == 3){break;}  }?>
]
}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "FeedBack",
    horizontalAlign: "left"
	},
  	axisY: {
      includeZero: true
    },
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
      	indexLabelFontSize: 16,
		indexLabelPlacement: "outside",
		dataPoints: [
		{ label: "good(+)", y: <?php echo $pos; ?> },
			{ label: "bad(-)", y: <?php echo $neg; ?> }

		]
	}]
});
chart.render();

}
</script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <?php $id=2; ?>
        <div id="bloc" class="container">
          <div class="row">
            <div class="col">
              <div id="chartContainer1" style="height: 370px; width: 1000px;"></div>
            <br>

          </div>
          <div class="row">
      <div class="card" style="width: 30rem;">
      <div class="card-body">
      <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
    <p class="card-text">  <h3 class='product_name'><a href ='http://localhost/MVC/Customers.php'>voir les clients  </a></h3></p>
  </div>
</div>
      <br><br>
      <div class="card" style="width: 30rem;">
      <div class="card-body">
      <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
    <p class="card-text">  <h3 class='product_name'><a href ='http://localhost/MVC/modifproduit.php'>voir les produits  </a></h3></p>
  </div>
</div>
<div class="card" style="width: 30rem;">
<div class="card-body">
<div id="chartContainer4" style="height: 370px; width: 100%;"></div>
<p class="card-text">  <h3 class='product_name'><a href ='http://localhost/MVC/categoryadmin.php'>voir les categories  </a></h3></p>
</div>
</div>
<div class="card" style="width: 30rem;">
<div class="card-body">
<div id="chartContainer5" style="height: 370px; width: 100%;"></div>
<p class="card-text">  </p>
</div>
</div>
        </div>

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
<script type="text/javascript">
//function to make the request
function commandes(){
  t=document.getElementById("title");
  t.innerHTML="Table des commandes"
  var xhr=new XMLHttpRequest();
  obj=document.getElementById("bloc");
  obj.innerHTML="";
  xhr.open("GET","views/commandeadmin.php",true);
  xhr.send();
  xhr.onreadystatechange=function(){
  if(xhr.readyState ==4 && xhr.status ==200){
  console.log(xhr);
  console.log(this.reponseText);
   obj.innerHTML= xhr.responseText;
  }
  }
}
function changev(code){
  var xhr=new XMLHttpRequest();
  obj=document.getElementById('bloc');
  obj.innerHTML='';
  if(code !='d'){
  xhr.open('GET','views/valide.php?code='+code,true);
  xhr.send();
  xhr.onreadystatechange=function(){
  if(xhr.readyState ==4 && xhr.status ==200){
  console.log('ayoub');
  console.log(this.reponseText);
   obj.innerHTML= xhr.responseText;
  }}}

}
</script>

</body>

</html>
<?php
if(isset($_POST["validite"]) && $_POST["validite"] !="d"){
  $model->updatevalide($_POST["id"],$_POST["validite"]);
}

?>
