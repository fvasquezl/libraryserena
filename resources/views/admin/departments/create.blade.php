@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Departamentos',
           'subtitle' => 'Creacion',
           'breadCrumbs' =>['departments','create']
           ])
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Registro de departamentos</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.departments.store') }}">

                     @include('admin.departments.partials.form')

                    <button class="btn btn-primary btn-block">Crear Departamento</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
