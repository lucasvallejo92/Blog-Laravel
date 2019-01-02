<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Blog</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index-landingpage/landing-page.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="main-wrapper">
        <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="header1 po-relative bg-dark">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg h2-nav">
                                <a class="navbar-brand" href="{{ url('/') }}"><img src="#" alt="" /></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ti-menu"></span>
                                </button>
                                
                                <div class="collapse navbar-collapse" id="header">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                    <li class="nav-item active"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                                    
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="h1-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Administrar <i class="fa fa-angle-down m-l-5"></i>
                                        </a>
                                        <ul class="b-none dropdown-menu animated fadeInUp">
                                            <li><a class="dropdown-item" href="{{ route('tags.index') }}">Etiquetas</a></li>
                                            <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categorias</a></li>
                                            <li><a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a></li>
    
                                        </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="h1-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }} <i class="fa fa-angle-down m-l-5"></i>
                                        </a>
                                        <ul class="b-none dropdown-menu animated fadeInUp">
                                            
                                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                                            <li class="divider" role="separator"></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                Desconectarse
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>

                                            </li>
    
                                        </ul>
                                        </li>       
                                        
                                    @endguest
                                </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        
        @if(session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($errors))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('scripts')

</body>
</html>
