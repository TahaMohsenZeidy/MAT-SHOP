<!DOCTYPE html>
<html lang="en">
<?php include('head.php');
require_once('src/functions.php');
?>
<body>
    <div style="padding: 160px;" class="super_container">
        <!-- Header -->
        <?php require_once('header.php'); ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar_section">
                <div class="sidebar_title">
                    <h4>Categories</h4>
                </div>
                <ul class="sidebar_categories">
                    <li class="active" ><a id="cats" href="#" style="font-size:20px;"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Offres</a></li>
                    <?php foreach($category as $id => $name): ?>
                        <li><a id="cats" style="font-size:15px;" href="<?php echo $id + 1; ?>"><?php echo $name['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <style>
                #cats:hover{
                    color:blue!important;
                    font-size:25px;
                    text-decoration:none;
                }
            </style>
            <!-- Price Range Filtering -->
            <div class="sidebar_section">
				<div class="sidebar_title">
                    <h5 id="fab">Filtrer par prix</h5>
				</div>
					<p>
                    <form method="POST" action="getPriceRange.php">
						<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" name="amount">
					</p>
					<div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 58%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 58%;"></span></div>
                <div class="filter_button"><span><button style="border:none; background-color:transparent; color:white; font-size:20px;" type="submit">Filtrer</button></span></div>
                </form>
			</div>

            <!-- Sizes -->
            <div class="sidebar_section">
                <div class="sidebar_title">
                    <h5>Fabricant</h5>
                </div>
                <ul class="checkboxes">
                    <li class="active">
                    <input name="Samsung" type="checkbox" onchange="mainInfo(name);" class="fa fa-square-o" aria-hidden="true"></input><span> &nbsp;&nbsp;&nbsp; Samsung</span></li>
                    <li><input name="Toshiba" onchange="mainInfo(name);" type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span>&nbsp;&nbsp;&nbsp; Toshiba</span></li>
                    <li><input name="Advance" onchange="mainInfo(name);" type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span> &nbsp;&nbsp;&nbsp;Advanvce</span></li>
                    <li><input name="HaveIt" onchange="mainInfo(name);" type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span>&nbsp;&nbsp;&nbsp;HaveIt</span></li>
                    <li id="color"><input name="Dell" onchange="mainInfo(name);" type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span>&nbsp;&nbsp;&nbsp;Dell</span></li>
                </ul>
            </div>
            <style>
                input[type=checkbox] {
                background-color: transparent;
                color:red;
                }
            </style>
            <!-- Color -->
            <div class="sidebar_section">
                <div class="sidebar_title">
                    <h5>Color</h5>
                </div>
                <ul class="checkboxes">
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Black</span></li>
                    <li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Pink</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                    <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                </ul>
                <div class="show_more">
                    <span><span>+</span>Show More</span>
                </div>
            </div>

        </div>

        <!-- Main Content -->

        <div class="main_content">

            <!-- Products -->

            <div class="products_iso">
                <div class="row">
                    <div class="col">

                        <!-- Product Sorting -->

                        <div class="product_sorting_container product_sorting_container_top">
                            <ul class="product_sorting">
                                <li>
                                    <span class="type_sorting_text">Filtre Par Défaut</span>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="sorting_type">
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span><a>Filtre Par Défaut</a></span></li>
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span><a href="#prix">Filtre Par Prix</a></span></li>
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span><a href="#color">Filtre Par Couleur</a></span></li>
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span><a href="#fab">Filtre Par Fabricant</a></span></li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Vue</span>
                                    <span class="num_sorting_text">6</span>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="sorting_num">
                                        <li class="num_sorting_btn"><span>6</span></li>
                                        <li class="num_sorting_btn"><span>12</span></li>
                                        <li class="num_sorting_btn"><span>24</span></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="pages d-flex flex-row align-items-center">
                                <div class="page_current">
                                    <span>1</span>
                                    <ul class="page_selection">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                    </ul>
                                </div>
                                <div class="page_total"><span>of</span> 3</div>
                                <div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                            </div>

                            <!-- Slider -->
                            <div class="main_slider" style="background-image:url(images/gad5.jpg); top:-130px; height:450px; left:70px; width:900px;">
                                <div class="container fill_height" >
                                    <div class="row align-items-center fill_height">
                                        <div class="col">
                                            <div class="main_slider_content" style="top:-30px;">
                                                <h6>Obtenez les meilleurs produits en un seul clic</h6>
                                                <h2>Réductions jusqu'a</h2>
                                                <h1 style="left: 50px">50 %</h1>
                                                <div class="red_button shop_now_button" style="top:-30px;"><a id="dogs" href="produit.php">shop now</a></div>
                                            <style>
                                                #dogs:hover{
                                                    text-decoration:none;
                                                    color:white;
                                                    background-color:red;
                                                }
                                            </style>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h1 style="color:red;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#fe4c50;">Merci <span><span style="color:black;"> Pour<span><span style="color:#fe4c50;"> Votre<span><span style="color:black;"> Confiance<span><span style="color:blue;"> .<span></h1>
                                </div>
                            </div>
                            <!--------Slider Ends---------->

                            <!------Another Slider Begins--->

                            <!-- New Arrivals -->

                            <div class="new_arrivals" id="prix" style="top:-24px;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <div class="section_title new_arrivals_title">
                                                <h2 id="arrivals_changing">Nos Produits</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!------Another Slider Ends--->

                        </div>
                        <!-- Product Grid -->
                        <!--Generating Random Products--->
                        <?php
                        echo generateRandomProduct();
                        ?>
                        <div class="product_sorting_container product_sorting_container_bottom clearfix">
                            <ul class="product_sorting">
                                <li>
                                    <span>Vue:</span>
                                    <span class="num_sorting_text">04</span>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="sorting_num">
                                        <li class="num_sorting_btn"><span>01</span></li>
                                        <li class="num_sorting_btn"><span>02</span></li>
                                        <li class="num_sorting_btn"><span>03</span></li>
                                        <li class="num_sorting_btn"><span>04</span></li>
                                    </ul>
                                </li>
                            </ul>
                            <span class="showing_results">Appercu 1–3 de 12 resultats</span>
                            <div class="pages d-flex flex-row align-items-center">
                                <div class="page_current">
                                    <span>1</span>
                                    <ul class="page_selection">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                    </ul>
                                </div>
                                <div class="page_total"><span>De</span> 3</div>
                                <div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!---------This is where products end---------->
    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="image/pc/most.jpg" style="width:550px;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num" style="color:red;">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num" style="color:red;">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num" style="color:red;">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num" style="color:red;">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="1" style="margin:20px;" id="dogs">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!----------hedhy ekher partie m louta----->

    <!-- Best Sellers -->
        

            <!-----khedmet el best sellers------>
            <?php
            getBestSellers();
            
            ?>
            <!-----khedmet el best sellers------>


    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Best Sellers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_slider_container">
                        <div class="owl-carousel owl-theme product_slider">
                            <!-- Slide 1 -->
                            <?php
                                echo getBestSellers();                            
                            ?>
                        </div>
                        <!-- Slider Navigation -->

                        <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Blogs -->

    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title">
                        <h2>Nos Produit Spéciale</h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(image/pc/dell1.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Portables Inspiron optimisés par les processeurs Intel®  CoreTM  7e génération</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="4">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(image/pc/dell2.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Portables Inspiron optimisés par les processeurs Intel®  CoreTM  7e génération</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="4">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(image/pc/dell3.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Portables Inspiron optimisés par les processeurs Intel®  CoreTM  7e génération</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="4">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----------hedhy ekher partie m louta kemlet----->
    <!-- Footer -->
    <?php
    require_once('footer.php');

    ?>
    </div>
    <script>
 


    function mainInfo(id) {
        $.ajax({
            type: "GET",
            url: "dummy.php",
            data: "id =" +id,
            success: function(result) {
                $(".product-grid").html(result);
            }
        });
    };
    </script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="js/categories_custom.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>

    <!----Scripts l footer--->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <div style="right:100px; height:80px;" class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
    <h5>  <span>nombre de visiteurs</span><img src="https://hitwebcounter.com/counter/counter.php?page=7737601&style=0011&nbdigits=5&type=page&initCount=0" title="Free Counter" Alt="web counter"   border="0" />
    </h5>
    </div>
</body>
</html>
