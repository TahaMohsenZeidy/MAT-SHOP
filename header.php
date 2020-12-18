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
										usd
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">cad</a></li>
										<li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li>
									</ul>
								</li>
								<li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li>
								<li class="account">
									<a href="account.php">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<?php if(empty($_SESSION["connect"])):?>
										<li><a href="connecter.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<?php endif; ?>
										<?php
										 if(empty($_SESSION["connect"])):   ?>
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

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">colo<span>shop</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="<?php echo "http://localhost/MVC/"; ?>">Home</a></li>

								<li><a href="produit.php">Produits</a></li>
								<li><a href="">Promotion</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li> <form method="post" action="recherche.php">

								<input size='30' type="text" name="recherche" class=" auto-save form-control"   placeholder="Rechercher un produit " ></li>

								<li><button class='btn btn-danger' style="width: 60px; background: #fe4c50" type="submit"><i class="fa fa-search"  aria-hidden="true"></i></button>
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
