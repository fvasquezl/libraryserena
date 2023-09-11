@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Categorias',
           'subtitle' => 'Administracion',
           'breadCrumbs' =>['categories','index']
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
                        Listado de categorias
                    </h3>
                    <div class="card-tools">
                       @can('create',$categories->first())
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                        <i class="fas fa-list-alt nav-icon"></i> Crear Categoria
                        </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="categoriesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha de creacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    @can('update',$category)
                                    <a href="{{ route('admin.categories.edit',$category) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan

                                    @can('delete',$category)
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                        style="display:inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('¿Estas seguro de eliminar esta categoria?')"
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
        $('#categoriesTable').DataTable();
    });
</script>
@endpush
