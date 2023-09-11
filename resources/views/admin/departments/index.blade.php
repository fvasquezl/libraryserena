@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Departamentos',
           'subtitle' => 'Administracion',
           'breadCrumbs' =>['departments','index']
           ])
@stop

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="card mb-4 shadow-sm card-outline card-primary">
                <div class="card-header ">
                    <h3 class="card-title mt-1">
                        Listado de departamentos
                    </h3>
                    <div class="card-tools">
                       @can('create',$departments->first())
                        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
                            <i class="fas fa-sitemap"></i> Crear Departmento
                        </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="departmentsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Siglas</th>
                                <th>Nombre</th>
                                <th>Fecha de creacion</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->display_name }}</td>
                                <td>{{ $department->created_at }}</td>
                                <td>
                                    @can('view', $department)
                                    <a href="{{ route('admin.departments.show',$department) }}"
                                        class="btn btn-sm btn-default">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endcan

                                    @can('update',$department)
                                    <a href="{{ route('admin.departments.edit',$department) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan

                                    @can('delete',$department)
                                    <form action="{{ route('admin.departments.destroy', $department) }}" method="POST"
                                        style="display:inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('¿Estas seguro de eliminar este departamento?')"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
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
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#departmentsTable').DataTable();
    });
</script>
@endpush
