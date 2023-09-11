@extends('layouts.master')

@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Departamentos',
           'subtitle' => 'Edicion',
           'breadCrumbs' =>['departments','edit']
           ])
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Edicion de departamentos</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.departments.update',$department) }}">
                    @method('PUT')

                     @include('admin.departments.partials.form')

                    <button class="btn btn-primary btn-block">Actualizar Departamento</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
