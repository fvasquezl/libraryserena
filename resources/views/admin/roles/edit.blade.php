@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Roles',
           'subtitle' => 'Edicion',
           'breadCrumbs' =>['roles','edit']
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
                <h3>Actualizar Role</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.update',$role) }}">
                    @method('PUT')

                    @include('admin.roles.partials.form')

                    <button class="btn btn-primary btn-block">Actualizar Role</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
