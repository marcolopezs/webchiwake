@extends('layouts.frontend')

@section('contenido_frontend')

<!-- SUB BANNER -->
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-5"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Nosotros</h3>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- ABOUT STORY -->
<section id="about-story" class="about-story section">
    <div class="divider divider-2"></div>
    <div class="container">
        <div class="block-first">
            <div class="row">
                <div class="col-md-4">
                    <div class="image-wrap">
                        <img src="images/about/img-1.jpg" alt="">
                    </div>
                </div>

                <div class="col-md-7 col-md-offset-1">
                    <h4 class="lg text-uppercase">QUIENES SOMOS</h4>
                    <p>Somos personas que engrien personas. Desde nuestro primer colaborador hasta el más distinguido cliente tiene que sentirse engreído. Nos preocupamos porque todos, absolutamente todos, nos beneficiemos de pertenecer a Chiwake. <br/> Chiwake es una familia que como tal se preocupa por su casa y por los que la habitan.</p>
                </div>
            </div>
        </div>

        <div class="block-last">
            <div class="row">
                <div class="col-md-4 col-md-push-8">
                    <div class="image-wrap">
                        <img src="images/about/img-1.jpg" alt="">
                    </div>
                </div>

                <div class="col-md-7 col-md-pull-4">
                    <h4 class="lg text-uppercase">VISIÓN</h4>
                    <p>Que el mundo entero sepa gracias a Chiwake que los peruanos cocinamos como los dioses.</p>
                    <h4 class="lg text-uppercase">MISIÓN</h4>
                    <p>Entregar a los paladares más exigentes del mundo nuestros mejores sabores, tradiciones y el insuperable servicio peruano. Somos personas que engríen personas.</p>
                    <a href="menu" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Ver menú</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT STORY -->

<!-- THE STAFF -->
<section id="the-staff" class="the-staff section">
    <div class="section-heading text-center">
        <!-- BACKGROUND -->
        <div class="awe-parallax bg-4"></div>
        <!-- END / BACKGROUND -->

        <!-- OVERLAY -->
        <div class="awe-overlay"></div>
        <!-- END / OVERLAY -->
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Staff</h3>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="staff-slider">

                    {{-- STAFF ITEM --}}

                    @foreach($staff as $item)
                    {{--*/
                    $imagen = "/imagenes/upload/".$item->imagen;
                    $nombre = $item->nombre;
                    $cargo = $item->cargo;
                    $descripcion = $item->descripcion;
                    /*--}}
                    <div class="staff-item">
                        <div class="staff-heading">
                            <div class="image-wrap">
                                <img src="images/staff/img-1.jpg" alt="">
                            </div>
                        </div>
                    
                        <div class="staff-info">
                            <h4 class="staff-name sm">{{ $nombre }}</h4>
                            <span class="staff-work">{{ $cargo }}</span>
                        </div>
                    
                        <div class="staff-body">
                            <p>{{ $descripcion }}</p>
                        </div>
                    
                    </div>
                    @endforeach

                    {{-- END / STAFF ITEM --}}

                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- END / THE STAFF -->

@stop