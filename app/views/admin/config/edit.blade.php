@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Editar registro
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!-- daterange picker -->
<link href="{{ asset('admin/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />

{{-- SELECT  --}}
{{ HTML::style('admin/vendors/select2/select2.css') }}
{{ HTML::style('admin/vendors/select2/select2-bootstrap.css') }}

<!--clock face css-->
<link href="{{ asset('admin/vendors/iCheck/skins/all.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/css/pages/formelements.css') }}" rel="stylesheet" />
@stop


{{-- Page content --}}
@section('content_admin')
<section class="content-header">
	<!--section starts-->
	<h1>Editar registro</h1>
</section>
<!--section ends-->
<section class="content">
	<!--main content-->
	<div class="row">
		<!--row starts-->
		<div class="col-lg-12">

			<!--basic form starts-->
			<div class="panel panel-danger">
				<div class="panel-body border">
					{{ Form::model($config, ['route' => ['administrador.config.update', 1], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                        <div class="form-group @if($errors->has('titulo')) has-error @endif">
                            {{ Form::label('titulo', 'Titulo', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::text('titulo', null, ['class' => 'form-control']) }}
                                {{ $errors->first('titulo', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('dominio')) has-error @endif">
                            {{ Form::label('dominio', 'Dominio', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::text('dominio', null, ['class' => 'form-control']) }}
                                {{ $errors->first('dominio', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('descripcion')) has-error @endif">
                            {{ Form::label('descripcion', 'Descripción', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) }}
                                {{ $errors->first('descripcion', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('keywords')) has-error @endif">
                            {{ Form::label('keywords', 'Palabras Clave', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::textarea('keywords', null, ['class' => 'form-control', 'rows' => '3']) }}
                                {{ $errors->first('keywords', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('imagen')) has-error @endif">
                            {{ Form::label('imagen_actual', 'Icono actual', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                <a class="fancybox" href="/upload/{{ $config->icon }}" title="{{ $config ->titulo }}">
                                    <img src="/upload/{{ $config->icon }}" alt="" width="100"/>
                                </a>
                                {{ Form::hidden('imagen_actual', $config->icon) }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('imagen')) has-error @endif">
                            {{ Form::label('imagen', 'Icono', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::file('imagen') }}
                                {{ $errors->first('imagen', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                {{ Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                            </div>
                        </div>

					{{ Form::close() }}
				</div>
			</div>

		</div>
		<!--md-6 ends-->

	</div>
	<!--main content ends-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
{{-- SELECT --}}
{{ HTML::script('admin/vendors/select2/select2.js') }}
<script>
    var placeholder = "Select a State";

    $('.select2, .select2-multiple').select2({
        placeholder: placeholder
    });

    $('.select2-allow-clear').select2({
        allowClear: true,
        placeholder: placeholder
    });

    var select2OpenEventName = "select2-open";

    $(':checkbox').on("click", function() {
        $(this).parent().nextAll('select').select2("enable", this.checked);
    });

    $(".select2, .select2-multiple, .select2-allow-clear, .select2-remote").on(select2OpenEventName, function() {
        if ($(this).parents('[class*="has-"]').length) {
            var classNames = $(this).parents('[class*="has-"]')[0].className.split(/\s+/);
            for (var i = 0; i < classNames.length; ++i) {
                if (classNames[i].match("has-")) {
                    $('#select2-drop').addClass(classNames[i]);
                }
            }
        }
    });
</script>
@stop