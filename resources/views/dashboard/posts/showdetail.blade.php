@extends('dashboard.layout.main')

@section('container')

    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-5">{{ $post->title }}</h1>
            <div class="text-end
            ">
                <a class="btn btn-success" href="/dashboard/posts">
                    <span style="width: 24px; height: 24px;" class="pt-1" data-feather="arrow-left"></span> Back To Post
                </a>
                <a class="btn btn-secondary" href="/dashboard/posts/{{ $post->slug }}/edit
                    "> Edit
                    <span style="width: 24px; height: 24px;" class="pt-1" data-feather="edit"></span>
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Yakin Akan di Hapus?')" >Delete<span style="width: 24px; height: 24px;" class="ms-1 pt-1" data-feather="delete"></span></button>
                    </form>
                
            </div>
       
    
            <p class="my-3"> Artikel ini berkategorikan <b><a style="text-decoration: none; color:black" href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }} </a></p></b>

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
                            

        </div>
    </div>

@endsection