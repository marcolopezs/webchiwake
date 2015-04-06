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
{{ HTML::style('admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}

{{-- DATETIME PICKER --}}
{{ HTML::style('admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}

{{-- TAGS --}}
{{ HTML::style('admin/vendors/tags/bower_components/bootstrap/assets/css/docs.css') }}
{{ HTML::style('admin/vendors/tags/dist/bootstrap-tagsinput.css') }}
{{ HTML::style('admin/vendors/tags/assets/app.css') }}
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
					{{ Form::model($post, ['route' => ['administrador.posts.update', $post->id], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                        <div class="form-group @if($errors->has('titulo')) has-error @endif">
                            {{ Form::label('titulo', 'Titulo', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::text('titulo', null, ['class' => 'form-control']) }}
                                {{ $errors->first('titulo', '<span class="help-block">:message</span>') }}
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

                        <div class="form-group @if($errors->has('contenido')) has-error @endif">
                            {{ Form::label('contenido', 'Contenido', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::textarea('contenido', null, ['id' => 'ckeditor_full', 'class' => 'form-control']) }}
                                {{ $errors->first('contenido', '<span class="help-block">:message</span>') }}
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

                        <div class="form-group">
                            {{ Form::label('video_actual', 'Video actual', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                @if ($post->video <> "")
                                <iframe width="400" height="200" src="//www.youtube.com/embed/{{ $post->video }}" frameborder="0" allowfullscreen></iframe>
                                @else
                                No hay video
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('video')) has-error @endif">
                            {{ Form::label('video', 'Video (Youtube)', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-6">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                    {{ Form::text('video', null, ['class' => 'form-control']) }}
                                </div>
                                {{ $errors->first('video', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('categoria')) has-error @endif">
                            {{ Form::label('categoria', 'Categoría', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::select('categoria', [''=>'Seleccionar'] + $category, $post->category_id, ['class' => 'form-control']) }}
                                {{ $errors->first('categoria', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('tags')) has-error @endif">
                            {{ Form::label('tags', 'Etiquetas', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                <select name="tags[]" class="form-control selectMultiple" multiple>
                                    @foreach($tags as $item1)
                                        @foreach($tags_select as $item2 )
                                            <option value="{{ $item1->id }}" @if($item1 == $item2) selected @endif>{{ $item1->titulo }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                                {{ $errors->first('tags', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('published_at')) has-error @endif">
                            {{ Form::label('published_at', 'Fecha de publicación', ['class' => 'col-md-3 control-label']) }}

                            <div class="col-md-5 input-group date form_datetime4" data-date-format="dd MM yyyy - HH:ii p">
                                {{ Form::text(null, null, ['class' => 'form-control col-md-6', 'readonly']) }}
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                {{ Form::hidden('published_at', null, ['id' => 'mirror_field', 'class' => 'form-control', 'readonly']) }}
                                {{ $errors->first('published_at', '<span class="help-block">:message</span>') }}
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
                                <a href="{{ route('administrador.posts.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
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

{{-- CKEDITOR --}}}
{{ HTML::script('admin/vendors/ckeditor/ckeditor.js') }}
{{ HTML::script('admin/vendors/ckeditor/adapters/jquery.js') }}
{{ HTML::script('admin/js/pages/editor.js') }}

{{-- DATETIME PICKER --}}
{{ HTML::script('admin/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}
<script>
$(".form_datetime4").datetimepicker({
	  format: "dd MM yyyy - hh:ii",
	  linkField: "mirror_field",
	  linkFormat: "yyyy-mm-dd hh:ii:00"
});
</script>

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

{{-- TAGS --}}
{{ HTML::script('admin/js/forms/jquery.tagsinput.min.js') }}
{{ HTML::script('admin/js/forms/jquery.select2.min.js') }}
<script>
$(".selectMultiple").select2();
</script>
@stop