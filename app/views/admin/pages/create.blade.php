@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Agregar nuevo registro
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{--
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}
{{ HTML::style('admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}
--}}

<!--page level css -->
<link href="{{ asset('admin/vendors/gridmanager/dist/css/jquery.gridmanager.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/vendors/gridmanager/demo.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/css/pages/grid_manager.css') }}" rel="stylesheet" />
<!-- page level css ends-->
@stop


{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>
        Agregar nuevo registro
    </h1>
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
                    {{ Form::open(['route' => 'administrador.pages.store', 'method' => 'POST', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

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

                            <div style="display: none;" class="form-group @if($errors->has('contenido')) has-error @endif">
                                {{ Form::label('contenido', 'Contenido', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::textarea('contenido', null, ['id' => 'ckeditor_full', 'class' => 'form-control']) }}
                                    {{ $errors->first('contenido', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>

                            <div class="row">

                                <div id="mycanvas"></div>

                            </div>

                            <div class="form-group @if($errors->has('imagen')) has-error @endif">
                                {{ Form::label('imagen', 'Imagen', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::file('imagen') }}
                                    {{ $errors->first('imagen', '<span class="help-block">:message</span>') }}
                                </div>
                              </div>

                            <div class="form-group @if($errors->has('published_at')) has-error @endif">
                                    {{ Form::label('published_at', 'Fecha de publicación', ['class' => 'col-md-3 control-label']) }}

                                  <div class="col-md-5 input-group date form_datetime4" data-date-format="dd MM yyyy - HH:ii p">
                                      {{ Form::text(null, null, ['class' => 'form-control col-md-6', 'readonly']) }}
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-remove"></span>
                                      </span>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-th"></span>
                                      </span>
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
                                    {{ Form::submit('Guardar', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                    <a href="{{ route('administrador.pages.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
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
{{ HTML::script('admin/vendors/ckeditor/ckeditor.js') }}
{{ HTML::script('admin/vendors/ckeditor/adapters/jquery.js') }}
{{ HTML::script('admin/js/pages/editor.js') }}

{{-- GRIDMANAGER --}}
<script src="{{ asset('admin/vendors/gridmanager/dist/js/jquery.gridmanager.js') }}"></script>
<script>
$("#mycanvas").gridmanager({
    debug: 1,
    ckeditor: {
        customConfig: "/admin/js/pages/editor.js"
    }
});
</script>

{{-- DATETIME PICKER --}}
{{ HTML::script('admin/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}
<script>
$(".form_datetime4").datetimepicker({
      format: "dd MM yyyy - hh:ii",
      linkField: "mirror_field",
      linkFormat: "yyyy-mm-dd hh:ii:00"
});
</script>
@stop