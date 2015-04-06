@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Drop Zone
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/dropzone/3.11.0/css/dropzone.css') }}
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <h1>Subir fotos</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Este plugin sólo funciona en las últimas versiones de Chrome, Firefox, Safari, Opera e Internet Explorer 10.
            </div>
            <!-- First Basic Table strats here-->
            <div class="panel panel-info" style="overflow:auto;">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="upload-alt" data-size="20" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Seleccionar archivos
                    </h3>
                </div>
                <div class="panel-body" style="padding:0px !important;">
                    <div class="col-md-12" style="padding:30px; float:center;">
                        {{ Form::open(['route' => 'administrador.slider.store', 'method' => 'post', 'class' => 'dropzone']) }}
                        {{ Form::close() }}
                    </div>
                    <div class="col-md-12" style="padding: 0 0 30px 30px;">
                        <a href="{{ route('administrador.slider.index') }}" class="btn btn-md btn-success">Ver sliders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/dropzone/3.11.0/dropzone-amd-module.min.js') }}
@stop