<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">10</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">Ultimas 10 Actualizaciones</span>
        <div class="dropdown-divider"></div>

        {{-- @foreach(auth()->user()->lastTenUpdated() as $lastUpdated)
        <a href="{{route('posts.show',$lastUpdated->slug)}}" target="_blank" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
          <i class="fas fa-envelope-open-text mr-3 fa-2x text-primary"></i>
            <!-- <img src="{{asset('img/correo.png')}}" alt="Documento Nuevo" class="img-size-50 img-circle mr-3"> -->
            <div class="media-body">
              <h3 class="dropdown-item-title">
               {{$lastUpdated->user->name}}
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm"> {{$lastUpdated->title}}</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$lastUpdated->updated_at->diffForHumans()}}</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        @endforeach --}}
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">

        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">5</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Ultimas 5 publicaciones</span>
        <div class="dropdown-divider"></div>

        {{-- @foreach(auth()->user()->lastFivePublished() as $lastpost)
        <a href="{{route('posts.show',$lastpost->slug)}}" target="_blank" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
          <i class="fas fa-envelope-open-text mr-3 fa-2x text-info"></i>
            <!-- <img src="{{asset('img/correo.png')}}" alt="Documento Nuevo" class="img-size-50 img-circle mr-3"> -->
            <div class="media-body">
              <h3 class="dropdown-item-title">
               {{$lastpost->user->name}}
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm"> {{$lastpost->title}}</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$lastpost->created_at->diffForHumans()}}</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        @endforeach --}}
        <div class="dropdown-divider"></div>
        <a href="{{route('home')}}" target="_blank" class="dropdown-item dropdown-footer">Todas las publicaciones</a>
      </div>
    </li>
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="{{asset('img/user4.png')}}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="{{asset('img/user4.png')}}" class="img-circle elevation-2" alt="User Image">

          <p>
            {{ Auth::user()->name }}
            <small>{{ Auth::user()->getRoleDisplayName()}} <br>
                {{ Auth::user()->getDepartmentsName()}} <br>
            Usuario desde {{ Auth::user()->created_at->format('M Y') }}</small>
          </p>
        </li>

        <li class="user-footer">
          <a class="btn btn-success btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Salir del sistema') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
