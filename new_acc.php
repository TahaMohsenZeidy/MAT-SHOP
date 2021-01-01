<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>



<body>
    <?php require_once('header.php'); ?>

    <div style="padding: 160px;" class="super_container">
        <!-- Header -->
        
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar_section">
                <div class="sidebar_title">
                    <h5>Categories</h5>
                </div>
                <ul class="sidebar_categories">
                    <li class="active"><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Offres</a></li>
                    <?php foreach($category as $id => $name): ?>
                        <li><a href="<?php echo $id + 1; ?>"><?php echo $name['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- Price Range Filtering -->
            <div class="sidebar_section">
				<div class="sidebar_title">
                    <h5>Filtrer par prix</h5>
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
                    <li class="active"><input type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span> &nbsp;&nbsp;&nbsp; Acer</span></li>
                    <li><input onchange="mainInfo(this.value);" type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span>&nbsp;&nbsp;&nbsp; Adata</span></li>
                    <li><input type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span> &nbsp;&nbsp;&nbsp;Advanvce</span></li>
                    <li><input type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span>&nbsp;&nbsp;&nbsp;HaveIt</span></li>
                    <li><input type="checkbox" class="fa fa-square-o" aria-hidden="true"></input><span>&nbsp;&nbsp;&nbsp;AlsEye</span></li>
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
                                    <span class="type_sorting_text">Default Sorting</span>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="sorting_type">
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Show</span>
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
                                <div class="container fill_height">
                                    <div class="row align-items-center fill_height">
                                        <div class="col">
                                            <div class="main_slider_content">
                                                <h6>Obtenez les meilleurs produits en un seul clic</h6>
                                                <h2>Réductions jusqu'a</h2>
                                                <h1 style="left: 50px">50 %</h1>
                                                <div class="red_button shop_now_button" style="top:-30px;"><a href="#">shop now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h1 style="color: red;" style="text-align: center; color:red;"><a href="#">Get Discounts Now</a></h1>
                                </div>
                            </div>
                            <!--------Slider Ends---------->

                            <!------Another Slider Begins--->

                            <!-- New Arrivals -->

                            <div class="new_arrivals">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <div class="section_title new_arrivals_title">
                                                <h2 id="arrivals_changing">New Arrivals</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col text-center">
                                            <div class="new_arrivals_sorting">
                                                <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women's</li>
                                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li>
                                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">men's</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------Another Slider Ends--->

                        </div>
                        <!-- Product Grid -->

                        <div class="product-grid">

                            <!-- Product 1 -->
                            <div class="super_container">
                            <?php echo produit(); ?>
                            </div>
                        <!-- Product Sorting -->

                        <div class="product_sorting_container product_sorting_container_bottom clearfix">
                            <ul class="product_sorting">
                                <li>
                                    <span>Show:</span>
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
                            <span class="showing_results">Showing 1–3 of 12 results</span>
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
                        <img src="images/deal_ofthe_week.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
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

                            <div class="owl-item product_slider_item">
                                <div class="product-item">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="images/product_1.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                            <div class="product_price">$520.00<span>$590.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_2.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                            <div class="product_price">$610.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_3.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                                            <div class="product_price">$120.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_4.png" alt="">
                                        </div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                            <div class="product_price">$410.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_5.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                            <div class="product_price">$180.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="images/product_6.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                            <div class="product_price">$520.00<span>$590.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 7 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_7.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                            <div class="product_price">$610.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 8 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_8.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                                            <div class="product_price">$120.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 9 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_9.png" alt="">
                                        </div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                            <div class="product_price">$410.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 10 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_10.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                            <div class="product_price">$180.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <h2>Latest Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_1.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_2.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_3.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
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
            data: "mainid =" + id,
            success: function(result) {
                $(".new_arrivals_title").html(result);
                alert(data);
            }
        });
    };
    </script>
    <?php
    echo "am here";
    if(isset($_GET['mainid'])){
        echo "am not here though";
        mainInfo($_GET['mainid']);
    }
?>
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


</body>
</html>