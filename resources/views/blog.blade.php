

@extends('layout.main')
@section('container')
    
<h1> {{ $title }} </h1><br>

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog" method="get">
                    @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}" >
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
            @if ($blog->count())
            <div class="card mb-4">
                @if ($blog[0]->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/'.$blog[0]->image) }}" alt="{{ $blog[0]->category->name }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1600x400?{{ $blog[0]->category->name }}" class="card-img-top" alt="{{ $blog[0]->category->name }}">
                @endif
                
                <div class="card-body text-center">
                <h3 class="card-title" ><a class="td" href="/blog/{{ $blog[0]->slug }}">{{ $blog[0]->title }}</a></h3>
                <h6>
                    <small class="text-muted">
                        Artikel ini ditulis oleh <a href="/blog?author={{ $blog[0]->author->username }}">{{ $blog[0]->author->name }} </a>berkategorikan <a href="/blog?category={{ $blog[0]->category->slug }}">{{ $blog[0]->category->name }}</a>  {{ $blog[0]->created_at->diffForHumans() }}
                    </small>
                    </h6>
                <p class="card-text">{!! $blog[0]->excerpt !!}</p>
                <a href="/blog/{{ $blog[0]->slug }}" class="btn btn-primary">read more</a>
                </div>
            </div>

            <div class="contaner">
                <div class="row">
                    @foreach ($blog->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card" >
                            <div class="position-absolute px-2 py-1 text-white" style="background-color: rgba(0, 0, 0, 0.699)"><a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>

                            @if ($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                            @else
                                <img src="https://source.unsplash.com/600x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            
                            <div class="card-body">
                              <h5 class="card-title"><a href="/blog/{!! $post->slug !!}">{!! $post->title !!}</a></h5>
                                <h6>
                                <small class="text-muted">
                                    Artikel ini ditulis oleh <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }} </a>{{ $post->created_at->diffForHumans() }}
                                </small>
                                </h6>
                                <p class="card-text" >{!! $post->excerpt !!}</p>
                              <a href="/blog/{{ $post->slug }}" class="btn btn-primary">read more</a>
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @else 
           <h3 class="text-center">No Post Found</h3> 
        @endif

                {{ $blog->links() }}

@endsection

