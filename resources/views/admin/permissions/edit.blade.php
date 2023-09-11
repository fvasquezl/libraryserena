@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Permisos',
           'subtitle' => 'Edicion',
           'breadCrumbs' =>['permissions','edit']
           ])
@stop

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Actualizar Permiso</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.permissions.update',$permission) }}">
                    @csrf @method('PUT')

                    <div class="form-group">
                        <label for="name">Identificador:</label>
                        <input name="name" value="{{ $permission->name }}"
                            class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label for="display_name">Nombre:</label>
                        <input name="display_name" value="{{ old('display_name', $permission->display_name) }}"
                            class="form-control  @error('display_name') is-invalid @enderror">
                        @error('display_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar Permiso</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
