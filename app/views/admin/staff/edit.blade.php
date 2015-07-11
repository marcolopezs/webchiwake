@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Editar registro
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}
{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}
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
					{{ Form::model($post, ['route' => ['administrador.staff.update', $post->id], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                        <div class="form-group @if($errors->has('nombre')) has-error @endif">
                            {{ Form::label('nombre', 'Nombre', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::text('nombre', null, ['class' => 'form-control']) }}
                                {{ $errors->first('nombre', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('cargo')) has-error @endif">
                            {{ Form::label('cargo', 'Cargo', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::text('cargo', null, ['class' => 'form-control']) }}
                                {{ $errors->first('cargo', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('descripcion')) has-error @endif">
                            {{ Form::label('descripcion', 'Descripción', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3',
                                'onkeydown' => 'limitText(this.form.descripcion,this.form.countdown,220);',
                                'onkeyup' => 'limitText(this.form.descripcion,this.form.countdown,220);']) }}
                                <span class="help-block">Caracteres permitidos:
                                    <strong>
                                        <input name="countdown" type="text" style="border:none; background:none;" value="220" size="3" readonly id="countdown">
                                    </strong>
                                </span>
                                {{ $errors->first('descripcion', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('imagen')) has-error @endif">
                            {{ Form::label('imagen_actual', 'Imagen actual', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                <a class="fancybox" href="/upload/{{ $post->imagen_carpeta."".$post->imagen }}" title="{{ $post->titulo }}">
                                    <img src="/upload/{{ $post->imagen_carpeta }}200x100/{{ $post->imagen }}" alt="" />
                                </a>
                                {{ Form::hidden('imagen_actual', $post->imagen) }}
                                {{ Form::hidden('imagen_actual_carpeta', $post->imagen_carpeta) }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('imagen')) has-error @endif">
                            {{ Form::label('imagen', 'Imagen', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::file('imagen') }}
                                {{ $errors->first('imagen', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('publicar')) has-error @endif">
                            {{ Form::label('publicar', 'Publicar', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                <label class="checkbox-inline">
                                    {{ Form::radio('publicar', '1', null,  ['id' => 'publicar']) }}
                                    Si
                                </label>
                                <label class="checkbox-inline">
                                    {{ Form::radio('publicar', '0', null,  ['id' => 'publicar']) }}
                                    No
                                </label>
                                {{ $errors->first('publicar', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                {{ Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                <a href="{{ route('administrador.staff.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
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
{{ HTML::script('admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}

{{-- FANCYBOX --}}
{{ HTML::script('admin/vendors/gallery/basic/source/jquery.fancybox.pack.js?v=2.1.5') }}
{{ HTML::script('admin/vendors/gallery/basic/lib/jquery.mousewheel.pack.js?v=3.1.3') }}
<script type="text/javascript">
$(document).ready(function() {
    $(".fancybox").fancybox({
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