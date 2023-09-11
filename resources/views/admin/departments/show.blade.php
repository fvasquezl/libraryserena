@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Departamentos',
           'subtitle' => 'Mostrar',
           'breadCrumbs' =>['departments','show']
           ])
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/departamento.png')}}"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $department->name }}</h3>

                    <p class="text-muted text-center">{{ $department->display_name }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <i class="fas fa-users"></i> <b>Empleados</b> <a class="float-right">{{ $department->users()?  $department->users->count():'0' }}</a>
                        </li>
                    </ul>

                    <a href="{{ route('admin.departments.edit',$department)}}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.card -->
         <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-users"></i> Empleados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @forelse($department->users as $user)
                        <i class="fas fa-user"></i><a href="{{ route('admin.users.show',$user) }}" target="_blank">
                            {{ $user->name }}
                        </a>
                        <br>
                        <small class="text-muted">{{ $user->getRoleDisplayName() }}</small>
                        <br>
                        <small class="text-muted">{{ $user->created_at->format('M d Y')}}</small>
                    @unless ($loop->last)
                        <hr>
                    @endunless
                    @empty
                        <small class="text-muted">No tiene ninguna Empleado</small>
                    @endforelse
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

