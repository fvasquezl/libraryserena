@extends('layouts.master')



@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Permisos',
           'subtitle' => 'Administracion',
           'breadCrumbs' =>['permissions','index']
           ])
@stop

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 my-3">
        <div class="card mb-4 shadow-sm card-outline card-primary">
            <div class="card-header ">
                <h3 class="card-title mt-1">
                    Listado de permisos
                </h3>

            </div>

            <div class="card-body">
                <table class="table table-striped table-hover table-bordered" id="permissionsTable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>
                                @can('update',$permission)
                                    <a href="{{ route('admin.permissions.edit',$permission) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#permissionsTable').DataTable();
    });
</script>
@endpush
