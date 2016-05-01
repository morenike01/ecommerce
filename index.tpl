<!DOCTYPE html>
<html lang="en">
<head>
    {% block head %}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | LEO SHOP</title>

        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/font-awesome.min.css" rel="stylesheet">
        <link href="./css/prettyPhoto.css" rel="stylesheet">
        <link href="./css/price-range.css" rel="stylesheet">
        <link href="./css/animate.css" rel="stylesheet">
        <link href="./css/main.css" rel="stylesheet">
        <link href="./css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="./js/html5shiv.js"></script>
        <script src="./js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
              href="./images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
              href="./images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="./images/ico/apple-touch-icon-57-precomposed.png">
    {% endblock %}
</head><!--/head-->

<body>

<header id="header"><!--header-->
    {% block header %}

        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">

                        <div class="logo pull-left">
                            <a href="index.php"><img src="./images/home/logo.png" alt=""/></a>
                        </div>

                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                        data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                    <li><a href="#">GH</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                        data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                    <li><a href="#">Cedi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <!--<li><a href="#"><i class="fa fa-user"></i> Account</a></li>-->
                                <!--<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>-->
                                <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        {#<div class="mainmenu pull-left">#}
                        {#</div>#}

                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="search.php?price={{glass_price}}" method="get">
                                <input type="text" placeholder="Enter price here" name="search"/>
                                <button type="submit" class="btn" style="background-color: #FE980F; color: #FFFFFF">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->

    {% endblock %}
</header><!--/header-->
<hr>

<section id="slider"><!--slider-->
    {% block slider %}
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">

                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>WELCOME TO LEO SHOP</span></h1>
                                    <h2>Quality Products</h2>
                                    <p>At LEO SHOP we provide you with quality Sun Glass at overly
                                        affordable prices !! </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="./images/home/a-img2.jpg" class="banner img-responsive" alt=""/>

                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Be Your Own Label</span></h1>
                                    <h2>"I am what I am"</h2>
                                    <p>We don't just make you stylish; we make you confident in your guts !!</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="./images/home/girl2.jpg" class="girl img-responsive" alt=""/>
                                    <img src="./images/home/pricing.png" class="pricing" alt=""/>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Isn’t it time you won an Oscar?</span></h1>
                                    <h2>Get ready to face the world</h2>
                                    <p>Impossible is nothing when you shop with Loe Shop.</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="./images/home/girl3.jpg" class="girl img-responsive" alt=""/>
                                    <img src="./images/home/pricing.png" class="pricing" alt=""/>
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    {% endblock %}
</section><!--/slider-->

<section>
    {#{% block category %}#}
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    {#<h2>Category</h2>#}

                    {#<div class="panel-group category-products" id="accordian"><!--category-productsr-->#}
                    {#<div class="panel panel-default">#}
                    {#<div class="panel-heading">#}
                    {#<h4 class="panel-title"><a href="#">All</a></h4>#}
                    {#</div>#}
                    {#</div>#}
                    {#<div class="panel panel-default">#}
                    {#<div class="panel panel-default">#}
                    {#<div class="panel-heading">#}
                    {#<h4 class="panel-title"><a href="#">Shirts</a></h4>#}
                    {#</div>#}
                    {#</div>#}
                    {#</div>#}

                    {#<div class="panel panel-default">#}
                    {#<div class="panel-heading">#}
                    {#<h4 class="panel-title"><a href="#">Skirts</a></h4>#}
                    {#</div>#}
                    {#</div>#}

                    {#<div class="panel panel-default">#}
                    {#<div class="panel-heading">#}
                    {#<h4 class="panel-title"><a href="#">Bags</a></h4>#}
                    {#</div>#}
                    {#</div>#}

                    {#<div class="panel panel-default">#}
                    {#<div class="panel-heading">#}
                    {#<h4 class="panel-title"><a href="#">Make-Up</a></h4>#}
                    {#</div>#}
                    {#</div>#}
                    {#<!--<div class="panel panel-default">-->#}
                    {#<!--<div class="panel-heading">-->#}
                    {#<!--<h4 class="panel-title"><a href="#">Red</a></h4>-->#}
                    {#<!--</div>-->#}
                    {#<!--</div>-->#}
                    {#</div><!--/category-products-->#}

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="index.php"> <span class="pull-right"></span>All</a></li>
                                <li><a href="brand.php?brand=Giorgio Armani"> <span class="pull-right"></span>Giorgio
                                        Armani</a></li>
                                <li><a href="brand.php?brand=Pierre Cardin"> <span class="pull-right"></span>Pierre
                                        Cardin</a></li>
                                <li><a href="brand.php?brand=Versace"> <span class="pull-right"></span>Versace</a></li>
                                <li><a href="brand.php?brand=Prada"> <span class="pull-right"></span>Prada</a></li>
                                <li><a href="brand.php?brand=Gucci"> <span class="pull-right"></span>Gucci</a></li>
                                <li><a href="brand.php?brand=Louis Vuitton"> <span class="pull-right"></span>Louis
                                        Vuitton</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="./images/home/shipping.jpg" alt=""/>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                {# Shirts #}

                {# pagination glasses #}

                {# Glass #}
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">SUNGLASSES</h2>

                    {% for g in glasses %}
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="./images/home/{{ g.pic }}" alt=""/>
                                        <h2>${{ g.price }}</h2>
                                        <p>{{ g.glass_name }}</p>
                                        <p style="color: #FE980F">{{ g.brand_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add
                                            to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>${{ g.price }}</h2>
                                            <p>{{ g.glass_name }}</p>
                                            <p>{{ g.brand_name }}</p>
                                            <a href="product-details.php?id={{ g.glass_id }}"
                                               class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                </div>

                {# pagination sunglasses #}
                <div class="title text-center">

                    {% if total_pages_glass > 0 %}
                        <ul class='pagination pagination-sm' id="pagination">
                            {% for i in 1..total_pages_glass %}

                                {% if loop.first %}
                                    {% if glass == 1 %}
                                        <li class="prev disabled">
                                            <a>
                                                <i class="fa fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li class="prev disabled">
                                            <a>
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                        </li>
                                    {% else %}
                                        <li class="prev">
                                            <a href='index.php?glass={{ 1 }}'>
                                                <i class="fa fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li class="prev">
                                            <a href='index.php?glass={{ glass - 1 }}'>
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                        </li>
                                    {% endif %}
                                {% endif %}

                                {% if loop.last %}
                                    {% if glass == total_pages_glass %}
                                        <li class="next disabled">
                                            <a>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                        <li class="next disabled">
                                            <a>
                                                <i class="fa fa-angle-double-right"></i>
                                            </a>
                                        </li>
                                    {% else %}

                                        <li class="next">
                                            <a href='index.php?glass={{ glass + 1 }}'>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                        <li class="next">
                                            <a href='index.php?glass={{ total_pages_glass }}'>
                                                <i class="fa fa-angle-double-right"></i>
                                            </a>
                                        </li>
                                    {% endif %}
                                {% endif %}

                            {% endfor %}
                        </ul>
                    {% endif %}
                </div>

                {# Bags #}

                {# pagination bag #}

                {# Make-Up #}

                {# pagination makeup #}

            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>LOE</span>SHOP</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="./images/home/iframe1.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="./images/home/iframe2.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="./images/home/iframe3.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="./images/home/iframe4.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="./images/home/map.png" alt=""/>
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="terms.php" target="_blank">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Loe </h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Loe </h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>Get the most recent updates from <br/>our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 Loe Shop Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank"
                                                           href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="./js/jquery.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.scrollUp.min.js"></script>
<script src="./js/price-range.js"></script>
<script src="./js/jquery.prettyPhoto.js"></script>
<script src="./js/main.js"></script>
</body>
</html>
