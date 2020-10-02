<meta name="viewport" content="width=device-width, initial-scale=1">


<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            {{config('app.name')}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="nav nav-pills">

                <li class="nav-item"><a class="nav-link {{setActive('home')}}" href="{{route('home')}}">@lang('Home')</a></li>
                <li class="nav-item"><a class="nav-link {{setActive('about')}}" href="{{ route('about') }}">@lang('About')</a></li>
                <li class="nav-item"><a class="nav-link {{setActive('contactos')}}" href="{{ route('contactos') }} ">@lang('Contact')</a></li>
                <li class="nav-item"><a class="nav-link {{setActive('portafolio.index')}}" href="{{ route('portafolio.index') }}">@lang('Portafolio')</a></li>
                @guest
                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                @else
                <li class="nav-item"><a class="nav-link {{setActive('portafolio.index')}}" href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Cerrar sesion</a></li>
                @endguest

                @auth
                    <!--if(auth()->user()->role == 2)-->
                    @if(auth()->user()->hasRoles(['Admin']))
                    <li class="nav-item"><a class="nav-link " href="{{ route('roles.index') }}">Usuarios</a></li>
                    @endif
                @endauth
            </ul>
        </div>
        <!--Bienvenido {{ $nombre ?? "Invitado " }}
-->
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>