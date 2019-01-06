@extends('layouts.app')

@section('content')
  

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('post', $post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->name }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->excerpt }}
                        </h3>
                    </a>
                    <small>
                        <a class="badge badge-info" href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
                        @foreach ($post->tags as $tag)
                            <a class="badge badge-secondary" href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                    </small>
                    <p class="post-meta">Creador por
                        <span>{{ $post->user->name }}</span>
                        el día {{ $post->created_at->day }}/{{ $post->created_at->month }}/{{ $post->created_at->year }}</p>
                </div>
                <hr>
            @endforeach
            <!-- Pager -->
            <div class="clearfix">
                @if($posts->currentPage() > 1)
                    <a class="btn btn-primary float-left" href="blog/?page={{ $posts->currentPage()-1 }}">&larr; Anterior</a>
                @endif
                @if($posts->currentPage() < $posts->lastPage())
                    <a class="btn btn-primary float-right" href="blog/?page={{ $posts->currentPage()+1 }}">Siguiente &rarr;</a>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection