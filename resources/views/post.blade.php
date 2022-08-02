@extends('layout.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                                <h3 class="mb-5">{{ $post->title }}</h3>
                        
                                <h5 class="mb-3"> Artikel ini ditulis oleh <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }} </a>Berkategorikan <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }} </a></h5>
                                @if ($post->image)
                                <div style="max-height: 350px; overflow:hidden;">
                                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                                </div>
                                @else
                                        <img src="https://source.unsplash.com/1600x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                                @endif
                                <article class="my-2">
                                        {!! $post->body!!}
                                </article>
                                
                        <a class="mt-4" href="/blog"> Back To Post</a>
                </div>
        </div>
</div>

    
@endsection