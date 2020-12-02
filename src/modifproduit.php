
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

                 <h2 class="h2">Ajouter des produits</h2>
        </div>
               <form method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                      <div class="col">
                        <input type="text" name="nomprod" class="form-control" placeholder="nom du produit">
                      </div>
                      <div class="col">
                        <input type="text" name="description" class="form-control" placeholder="description">
                      </div>
  					<div class="col">
                        <input type="text" name="aprix" class="form-control" placeholder="prix">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col">
                        <input type="text" name="stock" class="form-control" placeholder="stock">
                      </div>
                      <div class="col">
                        <input type="text" name="categ" class="form-control" placeholder="categorie:1,2,3..">
                      </div>
  					<div class="col">
                        <input type="file" name="img" class="form-control" >
                      </div>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary">
              </form>
</main>

    </div>

      <?php
       $target_dir = "produit/";
      if(isset($_POST["submit"])) {
      	//print_r($_FILES["img"]);
      	move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir.$_FILES["img"]["name"]);
        //print_r($_POST);
        $var=$_FILES["img"]["name"];
        $model->insertProduct($_POST["nomprod"],$_POST["description"],$_POST["aprix"],$_POST["stock"],$_POST["categ"],$var);

      }
      ?>
