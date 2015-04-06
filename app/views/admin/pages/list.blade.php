@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Advanced Data Tables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{{ HTML::style('admin/vendors/datatables/css/dataTables.colReorder.min.css') }}
{{ HTML::style('admin/vendors/datatables/css/dataTables.scroller.min.css') }}
{{ HTML::style('admin/vendors/datatables/css/dataTables.bootstrap.css') }}
{{ HTML::style('admin/css/pages/tables.css') }}
{{ HTML::style('admin/vendors/Buttons-master/css/buttons.css') }}
<!--end of page level css-->
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Páginas</h1>
    <a href="{{ route('administrador.pages.create') }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar nuevo registro
    </a>
</section>
<!--section ends-->
<section class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-body">

                    {{ Form::model(Input::all(), ['route' => 'administrador.pages.index', 'method' => 'GET', 'class' => 'form-horizontal']) }}

                        <div class="form-group">
                            <div class="col-md-2">
                                {{ Form::text('search', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-2">
                                {{ Form::select('publicar', ['' => 'Seleccionar estado', '0' => 'No publicado', '1' => 'Publicado'], null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-1">
                                {{ Form::button('Buscar', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('administrador.pages.index') }}" class="btn btn-danger">Borrar busqueda</a>
                            </div>
                        </div>

                    {{ Form::close() }}

                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>

                                <th>Titulo</th>
                                <th>Publicar</th>
                                <th>Fecha publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $item)
                            <tr>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $item->publicar ? 'Publicado' : 'No publicado' }}</td>
                                <td>{{ $item->published_at }}</td>
                                <td>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <a href="#" class="button button-rounded">
                                            Acciones
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('administrador.pages.show', $item->id) }}">Ver</a></li>
                                            <li><a href="{{ route('administrador.pages.edit', $item->id) }}">Editar</a></li>
                                            <li><a href="{{ route('administrador.pages.destroy', $item->id) }}">Eliminar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row">

                        <div class="col-md-5 col-sm-12">
                            <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">Total de registros: {{ $pages->getTotal() }}</div>
                        </div>

                        <div class="col-md-7 col-sm-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                {{ $pages->links() }}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--delete modal starts here-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">
                        Delete this entry
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <span class="glyphicon glyphicon-warning-sign"></span>
                        Are you sure you want to delete this Record?
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-ok-sign"></span>
                        Yes
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal ends here -->

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
{{ HTML::script('admin/vendors/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.tableTools.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.colReorder.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.scroller.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.bootstrap.js') }}
{{ HTML::script('admin/js/pages/table-advanced.js') }}
{{ HTML::script('admin/vendors/Buttons-master/js/vendor/scrollto.js') }}
{{ HTML::script('admin/vendors/Buttons-master/js/main.js') }}
{{ HTML::script('admin/vendors/Buttons-master/js/buttons.js') }}
@stop