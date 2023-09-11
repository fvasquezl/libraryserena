@extends('layouts.master')

@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Usuarios',
           'subtitle' => 'Edicion',
           'breadCrumbs' =>['users','edit']
           ])
@stop

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Datos Personales</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name',$user->name) }}"
                            class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Nombre de Usuario:</label>
                        <input name="username" value="{{ old('username',$user->username) }}"
                               class="form-control  @error('username') is-invalid @enderror">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email',$user->email) }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Contrasena:</label>
                        <input name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Contrasena">
                        <span class="text-muted">Dejar en blanco si no se quiere cambiar la contrasena</span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Repita la contrasena:</label>
                        <input name="password_confirmation" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Repite la contrasena">

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar Usuario</button>
                </form>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Departmentos</h3>
            </div>
            <div class="card-body">
                @role('Admin')
                <form method="POST" action="{{ route('admin.users.departments.update',$user) }}">
                    @csrf
                    @method('PUT')

                    @include('admin.departments.partials.checkboxes')

                    <button class="btn btn-primary btn-block">Actualizar departamentos</button>
                </form>
                @else
                <ul class="list-group">
                    @forelse ($user->departments as $department)
                    <li class="list-group-item">
                        {{ $department->name }}
                    </li>
                    @empty
                    <li class="list-group-item">
                        No tiene departments
                    </li>
                    @endforelse
                </ul>
                @endrole
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Roles</h3>
            </div>
            <div class="card-body">
                @role('Admin')
                <form method="POST" action="{{ route('admin.users.roles.update',$user) }}">
                    @csrf
                    @method('PUT')

                    @include('admin.roles.partials.checkboxes')

                    <button class="btn btn-primary btn-block">Actualizar roles</button>
                </form>
                @else
                <ul class="list-group">
                    @forelse ($user->roles as $role)
                    <li class="list-group-item">
                        {{ $role->name }}
                    </li>
                    @empty
                    <li class="list-group-item">
                        No tiene roles
                    </li>
                    @endforelse
                </ul>
                @endrole
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Permisos</h3>
            </div>
            <div class="card-body">
                @role('Admin')
                <form method="POST" action="{{ route('admin.users.permissions.update',$user) }}">
                    @csrf
                    @method('PUT')

                    @include('admin.permissions.partials.checkboxes',['model'=> $user])

                    <button class="btn btn-primary btn-block">Actualizar permisos</button>
                </form>
                @else
                <ul class="list-group">
                    @forelse ($user->permissions as $permission)
                    <li class="list-group-item">
                        {{ $permission->name }}
                    </li>
                    @empty
                    <li class="list-group-item">
                        No tiene permisos
                    </li>
                    @endforelse
                </ul>
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
