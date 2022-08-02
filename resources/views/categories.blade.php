

@extends('layout.main')
@section('container')
    
<h1> Kategori Artikel</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category )
        <div class="col-md-4">
            <div class="card bg-dark text-white my-3">
                <img src="https://source.unsplash.com/1600x600?{{ $category->name }}" alt="{{ $category->name }}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill " style="background-color: rgba(0,0,0,0.2)" ><a style="color: aliceblue" href="/blog?category={{ $category->slug }}">{{ $category->name }}</a></h5>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

{{-- @foreach ($categories as $category)

    <ul>
        <li>
            <h5><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></h5>
        </li>
    </ul>

@endforeach --}}
@endsection

