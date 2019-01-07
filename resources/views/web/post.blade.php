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

@section('scripts')
  <script src="{{ asset('vendor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
  <script>hljs.initHighlightingOnLoad();</script>
@endsection