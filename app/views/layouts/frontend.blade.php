<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="es"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <title>Chiwake</title>

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.min.css">

    <!-- AWE FONT -->
    <link rel="stylesheet" type="text/css" href="css/awe-fonts.css">

    <!-- PAGE STYLE -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    @yield('script_header')
    
</head>
<body class="home">

<!-- PRELOADER -->
<div class="preloader">
    <div class="inner">
        <div class="item item1"></div>
        <div class="item item2"></div>
        <div class="item item3"></div>
    </div>
</div>
<!-- END / PRELOADER -->

<!-- PAGE WRAP -->
<div id="page-wrap">
    
    <!-- HEADER -->
    <header id="header" class="header header-1">
        <div class="container">
            <!-- LOGO -->
            <div class="logo"><a href="/"><img src="images/logo.png" alt=""></a></div>
            <!-- END / LOGO -->

            <!-- OPEN MENU MOBILE -->
            <div class="open-menu-mobile">
                <span>Activar menú de móvil</span>
            </div>
            <!-- END / OPEN MENU MOBILE -->

            <!-- NAVIGATION -->
            <nav class="navigation text-right" data-menu-type="1200">
                <!-- NAV -->
                <ul class="nav text-uppercase">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="nosotros">Nosotros</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="reservacion">Reservación</a></li>
                    <li><a href="contacto">Contactenos</a></li>
                </ul>
                <!-- END / NAV -->
                
                <!-- SOCIAL -->
                <div class="head-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>                    
                </div>
                <!-- END / SOCIAL -->
            </nav>
            <!-- END / NAVIGATION -->
        </div>

    </header>
    <!-- END / HEADER -->

    @yield('contenido_frontend')

    <!-- FOOTER -->
    <footer id="footer" class="footer">
        <div class="divider divider-1 divider-color"></div>
        <div class="awe-color"></div>
        <div class="container">
            <div class="copyright text-center">
                © 2015 Chiwake
            </div>
        </div>
    </footer>
    <!-- END / FOOTER -->

</div>
<!-- END / PAGE WRAP -->

<!-- LOAD JQUERY -->
<script type="text/javascript" src="js/lib/jquery-1.11.2.min.js"></script>

<!-- GOOGLE MAP -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.owl.carousel.min.js"></script>
<script type="text/javascript" src="js/lib/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="js/lib/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="js/lib/retina.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

@yield('script_footer')

</body>
</html>