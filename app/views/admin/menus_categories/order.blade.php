@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Ordenar
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{-- GALLERY --}}
<!-- fancyBox -->
{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Ordenar</h1>
    <div class="alert alert-dismissable"></div>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary tabtop">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="tab-pane active gallery-padding">
                                    <div class="col-md-12">

                                        <ul id="listPhotos" data-url="{{ route('administrador.menus_categories.orderForm') }}">

                                            @foreach($photos as $item)

                                            <li id="listPhoto_{{ $item->id }}" class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">

                                                <img height="100" width="100" src="http://placehold.it/100x100?text={{ $item->titulo }}" class="gallery-style" alt="Image">
                                                <p>{{ $item->titulo }}</p>

                                                <div class="slider-options">
                                                    <a class="photos-move handle" title="Mover {{ $item->nombre." ".$item->apellidos }}">
                                                        <span class="glyphicon glyphicon-move"></span>
                                                    </a>
                                                </div>

                                            </li>

                                            @endforeach

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script>
$(document).on("ready", function(){
    $('.alert').hide();
    $("#listPhotos").sortable({
        handle : '.handle',
        serialize: { key: 'listPhoto' },
        revert: true,
        stop: function(evt, ui){
            var sorted =  $("#listPhotos").sortable('serialize');
            var gotoURL = $(this).data('url');
            $.ajax({
                url: gotoURL,
                data: sorted,
                type: 'POST',
                success: function(success) {
                    $(".alert").show().addClass('alert-success').text('Los cambios se realizaron con éxito.');
                }, error: function (xhr, textStatus, thrownError) {
                    $(".alert").show().addClass('alert-danger').text("Error");
                }
            });
        }
    });
});
</script>

{{ HTML::script('admin/vendors/gallery/basic/source/jquery.fancybox.pack.js?v=2.1.5') }}
{{ HTML::script('admin/vendors/gallery/basic/lib/jquery.mousewheel.pack.js?v=3.1.3') }}
<script>
$(document).ready(function() {
      $(".fancybox-effects-a").fancybox({
          helpers: {
              title: {
                  type: 'outside'
              },
              overlay: {
                  speedOut: 0
              }
          }
      });
});
</script>
@stop