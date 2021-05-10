<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
</head>
<body>
    <div id="app">
    <nav>
  
    <div id="logodiv">
    <a  href="/"> <img id="logo"  href="/" src="images/logo.png" alt="alforno"></a>
      </div>
    <ul id="navlist">
    <li>
            @auth
            <a href=/home>Saldo: {{$user->saldo}} zł</a>
            @endauth
        </li> 
    <li class="dropParent">
            @guest
            @if (url()->current()=='http://localhost:8000/login')
            <a href=/register>Zarejestruj się</a>
            @endif
            @if (url()->current()=='http://localhost:8000/register')
            <a href=/login>Zaloguj się</a>
            @endif
            @endguest
            @auth
            <a href=/home>Witaj ponownie, {{$user->name}} </a>
            <div class="dropdown">
            <a href="{{ url('/logout') }}"> Wyloguj się </a>
 
            </div>
            @endauth
        </li>
      <li >
        <a href="kontakt">Kontakt</a>
      </li>
      <li>
        <a  class="zamowtopls"  href="zamowienia">Zamów online</a>
      </li>
      <li>
        <a href="/#miesne">Menu</a>
      </li>
       <li>
        <a  href="/">Strona Główna  </a>
      </li>
    </ul>
  </nav>
                       
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
               
            
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
