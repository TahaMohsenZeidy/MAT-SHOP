<!-- Header -->
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
	<header class="header trans_300">
		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">
							<?php
              //print_r($_SESSION);
							if(isset($_SESSION["connect"] )){
                //print_r($_SESSION);
								$msg="welcome ".$_SESSION["nom"];
							}else{
								$msg="";
							}
							echo $msg;
							?>
						</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->

								<li class="currency">
									<a href="#">
										TND
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">USD</a></li>
										<li><a href="#">EUR</a></li>
									</ul>
								</li>
								<li class="language">
									<a href="#">
										Francias
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">English</a></li>
										<li><a href="#">Arabe</a></li>

									</ul>
								</li>
								<li class="account">
									<a href="account.php">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<?php if(empty($_SESSION["connect"]) ):?>
										<li><a href="connecter.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<?php endif; ?>
										<?php
										 if(empty($_SESSION["connect"]) ):   ?>
										<li><a href="inscription.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
										<?php endif; ?>
										<?php if(isset($_SESSION["connect"])):?>
										<li><a href="deconnecter.php"><i class="fa fa-user" aria-hidden="true"></i>Sign out</a></li>
										<?php endif; ?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container" style="text-decoration:none;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container" >
							<a id="yeah" href="http://localhost/MVC/">MAT<span>SHOP</span></a>
							<style>
								#yeah:hover{
									text-decoration:none;
									color:red;
								}
								#yeah span:hover{
									color:black;
								}
								#yeah li a:hover{
									text-decoration:none;
									color:black;
									font-weight:bold;
								}
							</style>

						</div>
						<nav class="navbar" style="height:70px;">
							<ul class="navbar_menu" id="yeah">
								<li><a href="<?php echo "http://localhost/MVC/"; ?>">Home</a></li>

								<li><a href="produit.php">Produits</a></li>
								<li><a href="promotion.php">Promotion</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li style="postision:relative;"> <form method="post" action="recherche.php">

								<input style="position:relative; height:37px; top:2px;" size='30' type="text" name="recherche" class=" auto-save form-control"   placeholder="Rechercher un produit " ></li>

								<li ><button id="boo" class='btn btn-danger' style="width: 65px; height:35px; background: #fe4c50 margin:0px;" type="submit"><i class="fa fa-search"  aria-hidden="true"></i></button>
								<style>
								#boo:hover{
									color:red;
								}
								</style>
								</li>
							    </form>
							</ul>
							<ul class="navbar_user">


								<li class="checkout">
									<a href="showpanier.php">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items"><?php if(isset($_SESSION['size'])) {echo $_SESSION['size'];} else{echo '0';} ?></span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>
