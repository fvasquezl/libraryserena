@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Categorias',
           'subtitle' => 'Creacion',
           'breadCrumbs' =>['categories','create']
           ])
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Registro de categorias</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.store') }}">

                     @include('admin.categories.partials.form')

                    <button class="btn btn-primary btn-block">Crear Categoria</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
