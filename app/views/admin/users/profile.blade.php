@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Mi Perfil
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/user_profile.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}
<!--end of page level css-->
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <h1>Mi Perfil</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav  nav-tabs ">
                <li class="active">
                    <a href="#tab1" data-toggle="tab"> <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                        Mi Perfil
                    </a>
                </li>
                <li>
                    <a href="#tab2" data-toggle="tab">
                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                        Cambiar contraseña
                    </a>
                </li>
            </ul>

            <div  class="tab-content mar-top">

                <div id="tab1" class="tab-pane fade active in">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">

                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        {{ $user->first_name." ".$user->last_name }}
                                    </h3>
                                </div>

                                <div class="panel-body">

                                    <div class="col-md-4">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-file">
                                                <img data-src="holder.js/100%x100%" alt="..."></div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-max"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new text-center">
                                                        @lang('users/title.select_image')
                                                    </span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="..."></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="panel-body">
                                            <div class="table-responsive">

                                                <table class="table table-bordered table-striped" id="users">
    
                                                    <tr>
                                                        <td>Nombres</td>
                                                        <td>{{ $user->first_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Apellidos</td>
                                                        <td>{{ $user->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Creado desde</td>
                                                        <td>{{{ $user->created_at->diffForHumans() }}}</td>
                                                    </tr> 
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab2" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 pd-top">

                            {{ Form::open(['route' => 'administrador.users.profilePassword', 'method' => 'post', 'class' => 'form-horizontal']) }}

                                <div class="form-body">

                                    <div class="form-group @if($errors->has('password')) has-error @endif">

                                        {{ Form::label('password', 'Contraseña *', ['class' => 'col-md-3 control-label']) }}

                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                </span>
                                                {{ Form::password('password', ['class' => 'form-control']) }}
                                            </div>
                                            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                                        {{ Form::label('password_confirmation', 'Confirmar contraseña *', ['class' => 'col-md-3 control-label']) }}
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                </span>
                                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                                            </div>
                                            {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                                    </div>
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
{{ HTML::script('admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}
@stop