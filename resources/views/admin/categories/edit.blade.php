@extends('layouts.master')

@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Categorias',
           'subtitle' => 'Edicion',
           'breadCrumbs' =>['categories','edit']
           ])
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Edicion de categorias</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.update',$category) }}">
                    @method('PUT')

                     @include('admin.categories.partials.form')

                    <button class="btn btn-primary btn-block">Actualizar categoria</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
