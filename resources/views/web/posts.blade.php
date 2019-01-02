@extends('layouts.app')

@section('content')
    
<div class="blog-home2 spacer">
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                <h2 class="title">Recent Blogs</h2>
                <h6 class="subtitle">You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time</h6>
                </div>
        </div>
        <div class="row m-t-40">
        @foreach ($posts as $post)
        
            <div class="col-md-4">
                <div class="card" data-aos="flip-left" data-aos-duration="1200">
                    <a href="{{ route('post', $post->slug) }}"><img class="card-img-top" src="{{ $post->file }}" alt="{{ $post->name }}"></a>
                    <!-- <div class="date-pos bg-info-gradiant">Oct<span>23</span></div> -->
                    <h5 class="font-medium m-t-30"><a href="#" class="link">{{ $post->name }}</a></h5>
                    <p class="m-t-20">{{ $post->excerpt }}</p>    
                    <a data-toggle="collapse" href="{{ route('post', $post->slug) }}" class="linking text-themecolor m-t-10">Leer más <i class="ti-arrow-right"></i></a>
                </div>
            </div>
        
        @endforeach
        {{ $posts->render() }}
        </div>
    </div>
</div>
    


@endsection