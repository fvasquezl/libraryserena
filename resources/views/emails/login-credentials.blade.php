@component('mail::message')
# Tus credenciales para ingresar a {{ config('app.name') }}

Utiliza estas credenciales para ingresar al sistema.

@component('mail::table')
|Email or Username   | Password |
| :-----------------|:---------|
| {{ $user->email }} o {{$user->username}} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
