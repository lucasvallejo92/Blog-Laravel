@extends('layouts.app')

@section('content')
    



<article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              {!! $post->body !!}
            </div>
          </div>
        </div>
      </article>

@endsection