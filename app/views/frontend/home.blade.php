@extends('layouts.frontend')

@section('contenido_frontend')

<!-- HOME MEDIA -->
<section id="home-media" class="home-media section">
    <div class="home-fullscreen tb">
        <div class="awe-parallax bg-1"></div>

        <div class="awe-overlay overlay-default"></div>

        <div class="tb-cell text-center">
            <div class="home-content">
                <div class="ribbon ribbon-1">
                    <h2 class="sm">BIENVENIDO A</h2>
                </div>
                <h1 style="margin-top: 10px;" class="sbig text-uppercase"><img src="images/logo-big.png" alt=""></h1>
            </div>
        </div>
    </div>
</section>
<!-- END / HOME MEDIA -->

<!-- GOOD FOOD -->
<section id="good-food" class="good-food section pd">
    <div class="container">
        <div class="good-food-heading text-center">
            <div class="good-food-title style-2">
                <h6 class="xmd text-uppercase">Nosotros</h6>
                <i class="icon awe_quote_left"></i>
                <h2 class="lg text-capitalize">La Buena Comida es Nuestra Pasión</h2>
                <i class="icon awe_quote_right"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique laoreet metus, sit amet accumsan quam consequat ac. Nulla non nisi placerat, sodales lectus at, congue libero. Vivamus justo nulla, euismod eu ornare vitae, auctor quis leo.</p>
            <a href="about.html" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Nosotros</a>
        </div>
    </div>

    <div class="divider divider-2"></div>
</section>
<!-- END / GOOD FOOD -->

<!-- TESTIMONIAL -->
<section id="testimonial" class="testimonial testimonial-1 section">
    <!-- BACKGROUND -->
    <div class="awe-parallax bg-2"></div>
    <!-- END / BACKGROUND -->

    <!-- OVERLAY -->
    <div class="awe-overlay"></div>
    <!-- END / OVERLAY -->

    <div class="container">
        <div class="testimonial-content">
            <div class="icon-head">
                <i class="icon awe_quote_left"></i>
            </div>

            <blockquote>
                <p>No se trata de nutrientes y calorías.</p>
                <span>Se trata de compartir. Se trata de la disfrutar.</span>
                <div class="test-footer text-right">
                    <span class="sm">Carlos Torres</span>
                </div>
            </blockquote>
        </div>
    </div>
</section>
<!-- END / TESTIMONIAL -->

<!-- FASTFOOD -->
<section id="fastfood" class="fastfood section pd70">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="fastfood-description">
                    <div class="content-heading mt">
                        <h4 class="lg text-uppercase">¿COMIDA RÁPIDA O SALUD? TE OFRECEMOS LOS DOS!</h4>
                        <hr class="_hr">
                    </div>
                    <div class="text-wrap">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique laoreet metus, sit amet accumsan quam consequat ac. Nulla non nisi placerat, sodales lectus at, congue libero. Vivamus justo nulla, euismod eu ornare vitae, auctor quis leo. Vestibulum quis venenatis erat, a rutrum neque.</p>
                    </div>
                    <a href="menu.html" class="awe-btn awe-btn-2 awe-btn-ar text-uppercase">Ver menú</a>
                </div>  
            </div>
            <div class="col-md-6 col-md-offset-1">
                <div class="fastfood-items">
                    <div class="row">
                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="images/fastfood/img-1.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->

                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="images/fastfood/img-2.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->

                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="images/fastfood/img-3.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->

                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="images/fastfood/img-4.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / FASTFOOD -->

<!-- SECTION HIGHLIGHT -->
<section class="section-highlight section">
    <div class="divider divider-2 divider-color"></div>
    <div class="awe-color"></div>
    <div class="container">
        <div class="highlight-content tb">
            <div>
                <p>¿Por qué no encontrar una mesa y guardarla ahora?</p>
            </div>
            <div class="links">
                <div class="reservation-link">
                    <a href="reservation.html" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">RESERVACIÓN</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / SECTION HIGHLIGHT -->

<!-- SECTION BLOG -->
<section id="section-blog" class="section-blog section">
    <div class="divider divider-2"></div>

    <div class="container">
        <div class="row">
            <div class="blog-grid">
                <div class="grid-sizer"></div>
                <!-- BLOG POST -->
                <div class="post post-single w2"> 
                    <div class="post-media">
                        <img src="images/blog/img-1.jpg" alt="">
                    </div>
                    <div class="post-body">
                        <div class="post-title">
                            <h2 class="text-uppercase"><a href="#">AWARD WINNING CHEF</a></h2>
                        </div>
                        <div class="post-content">
                            <p>Macaroon croissant pudding sweet roll. Jelly candy tootsie</p>
                        </div>
                    </div>
                </div>
                <!-- END / BLOG POST -->

                <!-- BLOG POST -->
                <div class="post post-single">
                    <div class="post-media">
                        <img src="images/blog/img-2.jpg" alt="">
                    </div>
                    <div class="post-body">
                        <div class="post-title">
                            <h2 class="text-uppercase"><a href="#">A MULTI-POST STORY</a></h2>
                        </div>
                    </div>
                </div>
                <!-- END / BLOG POST -->

                <!-- BLOG POST -->
                <div class="post post-single">
                    <div class="post-media">
                        <img src="images/blog/img-3.jpg" alt="">
                    </div>
                    <div class="post-body">
                        <div class="post-title">
                            <h2 class="text-uppercase"><a href="#">HOW TO USE CHOPSTICKS</a></h2>
                        </div>
                    </div>
                </div>
                <!-- END / BLOG POST -->

                <!-- BLOG POST -->
                <div class="post post-single">
                    <div class="post-media">
                        <img src="images/blog/img-4.jpg" alt="">
                    </div>
                    <div class="post-body">
                        <div class="post-title">
                            <h2 class="text-uppercase"><a href="#">PHASELLUS JUSTO MAURIS, TEMPUS EGET NISL SIT</a></h2>
                        </div>
                    </div>
                </div>
                <!-- END / BLOG POST -->

                <!-- BLOG POST -->
                <div class="post post-single">
                    <div class="post-media">
                        <img src="images/blog/img-2.jpg" alt="">
                    </div>
                    <div class="post-body">
                        <div class="post-title">
                            <h2 class="text-uppercase"><a href="#">A MULTI-POST STORY</a></h2>
                        </div>
                    </div>

                </div>
                <!-- END / BLOG POST -->
            </div>
        </div>

        <div class="loadmore text-center">
            <a href="#" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">VER MÁS</a>
        </div>

    </div>
</section>
<!-- END / SECTION BLOG -->

<!-- CONTACT US -->
<section id="contact" class="contact section">

    <div class="contact-first">

        <!-- OVERLAY -->
        <div class="awe-overlay overlay-default"></div>
        <!-- END / OVERLAY -->
        
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="contact-body text-center">
                            <h3 class="lg text-uppercase">CONTÁCTENOS</h3>
                            <hr class="_hr">
                            <address class="address-wrap">
                                <span class="address">Av. Arequipa 915</span>
                                <span class="phone">3792 - 7384 - 8459</span>
                            </address>
                        </div>

                        <div class="see-map text-center">
                            <a href="#" data-see-contact="Ver contacto" data-see-map="Ver locación en mapa" class="awe-btn awe-btn-5 awe-btn-default text-uppercase"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAP -->
        <div id="map" data-map-zoom="14" data-map-latlng="-12.073780, -77.036211" data-snazzy-map-theme="grayscale" data-map-marker="images/marker.png" data-map-marker-size="200*60"></div>
        <!-- END / MAP -->
    </div>

    <div class="contact-second tb">
        <!-- CONTACT FORM -->
        <div class="tb-cell">
            <div class="contact-form contact-form-1">
                <div class="inner wow fadeInUp" data-wow-delay=".3s">
                    <form id="send-message-form" action="processContact.php" method="post">
                        <div class="form-item form-textarea">
                            <textarea placeholder="Your Message" name="message"></textarea>
                        </div>
                        <div class="form-item form-type-name">
                            <input type="text" placeholder="Your Name" name="name">
                        </div>
                        <div class="form-item form-type-email">
                            <input type="text" placeholder="Your Email" name="email">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-actions text-center">
                            <input type="submit" value="Enviar mensaje" class="contact-submit awe-btn awe-btn-6 awe-btn-default text-uppercase">
                        </div>
                        <div id="contact-content"></div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END / CONTACT FORM -->
    
        <!-- NEWS LETTER -->
        <div class="tb-cell">
            <div class="news-letter text-center">
                <div class="inner wow fadeInUp" data-wow-delay=".6s">
                    <div class="letter-heading">
                        <h4 class="sm text-uppercase">RECIBE NOTICIAS DE NOSOTROS</h4>
                        <p>Doner filet mignon bacon corned beef rump, frankfurter sirloin</p>
                    </div>
                    <form>
                        <div class="form-item">
                            <input type="text" placeholder="Your email" class="text-uppercase" name="email">
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Subscribe" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END / NEWS LETTER -->
    </div>

</section>

<!-- END / CONTACT US -->

@stop