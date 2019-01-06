<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/clean-blog.css') }}" rel="stylesheet">

  </head>

  <body>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand" href="{{ route('blog') }}">Blog</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tags.index') }}">Etiquetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
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
                @endguest
                <li class="nav-item">
                    <form action="#" method="GET">
                        <input type="text" name="search" placeholder="Buscar..." class="form-control mr-sm-2 search-box"/>
                    </form>
                </li>
            </ul>
          </div>
        </div>
    </nav>

    <!-- Page Header -->
    @if(Route::currentRouteName() == 'post')
    <header class="masthead" style="background-image: url('{{ $post->file }}')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <h1>{{ $post->name }}</h1>
                <h2 class="subheading">{{ $post->excerpt }}</h2>
                <small>
                    <a class="badge badge-info" href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
                    @foreach ($post->tags as $tag)
                        <a class="badge badge-secondary" href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach
                </small>
                <span class="meta">Creado por
                  <a href="#">{{ $post->user->name }}</a>
                  el día {{ $post->created_at->day }}/{{ $post->created_at->month }}/{{ $post->created_at->year }}</span>
              </div>
            </div>
          </div>
        </div>
    </header>
    @else
    <header class="masthead" style="background-image: url('{{ asset('img/home-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="site-heading">
                <h1>Simple Blog</h1>
                <span class="subheading">Un pequeño blog para comenzar a escribir</span>
              </div>
            </div>
          </div>
        </div>
    </header>
    @endif


    <!-- Info and errors -->
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

<!-- Contenido -->
@yield('content')
                       
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p class="copyright text-muted">Todos los derechos reservados &copy; ldvallejo.com 2019</p>
            </div>
            </div>
        </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{ asset('js/clean-blog.min.js') }}"></script>

        @yield('scripts')

</body>

</html>
