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
    <h1>Categorías</h1>
    <a href="{{ route('administrador.menus_categories.create') }}" class="btn btn-md btn-default">
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
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>

                                <th>Titulo</th>
                                <th>Publicar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $item)
                            <tr>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $item->publicar ? 'Publicado' : 'No publicado' }}</td>
                                <td>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <a href="#" class="button button-rounded">
                                            Acciones
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('administrador.menus_categories.show', $item->id) }}">Ver</a></li>
                                            <li><a href="{{ route('administrador.menus_categories.edit', $item->id) }}">Editar</a></li>
                                            <li><a href="{{ route('administrador.menus_categories.destroy', $item->id) }}">Eliminar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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