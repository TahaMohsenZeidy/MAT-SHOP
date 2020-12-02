<div class="main_slider">
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
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
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Dashboard</h2>
      </div>
      <h1 class="h2">ventes/mois<h1>
      <?php //include "../head.php";
      //include "../data/DataLayer.php";
      //$model=new DataLayer();//instance de DataLayer
      $data=$model->getorders();
      $resultat ="
      <div class='col'>
      <div class='mx-auto' style='width: 600px;'>
      <table class='table table-dark'>
        <thead>
          <tr>
            <th scope='col'>#</th>
            <th scope='col'>id</th>
            <th scope='col'>id_customers</th>
            <th scope='col'>id_product</th>
      			<th scope='col'>quantity</th>
      			<th scope='col'>price</th>
      			<th scope='col'>created_at</th>
          </tr>
        </thead>";
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



          $resultat .="<tbody>
            <tr>
              <th scope='row'>".$key=($key+1)."</th>
              <td>".$value["id"]."</td>
              <td>".$value["id_customers"]."</td>
              <td>".$value["id_product"]."</td>
      				<td>".$value["quantity"]."</td>
      				<td>".$value["price"]."</td>
      				<td>".$value["created_at"]."</td>
            </tr>

            ";
        }
        $resultat .="</tbody></table></div></div></div>";

      ?>
      <script type="text/javascript">
        window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer",
          {

            axisX:{
             title: "mois",
             gridThickness: 1,
             tickLength: 10
            },

            data: [
            {
              type: "column",
              dataPoints: [
              { x: 1, y: <?php echo $a1; ?> },
              { x: 2, y: <?php echo $a2; ?>},
              { x: 3, y: <?php echo $a3; ?> },
              { x: 4, y: <?php echo $a4; ?> },
              { x: 5, y: <?php echo $a5; ?> },
              { x: 6, y: <?php echo $a6; ?> },
              { x: 7, y: <?php echo $a7; ?> },
              { x: 8, y: <?php echo $a8; ?> },
              { x: 9, y: <?php echo $a9; ?>},
      				{ x: 10, y: <?php echo $a10; ?>},
      				{ x: 11, y: <?php echo $a11; ?>},
      				{ x: 12, y: <?php echo $a12; ?>},
              ]
            }
            ]
          });

          chart.render();
        }
        </script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


        <div id="chartContainer" style="height: 300px; max-width: 920px; margin: 0px auto;">
        </div>

      <br>
      <h1 class="h2">tableau des commandes</h1>
      <?php echo $resultat;?>

    </main>
  </div>
</div>
