@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 style="text-transform:capitalize" class="h2">my post </h1>
</div>

<div class="table-responsive col-lg-10">

     @if( session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show text-capitalize text-center fw-semibold fs-6" role="alert">
          {{ session('berhasil') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif 

    <a href="/dashboard/posts/create" class="btn btn-success mb-2 mt-1"> Tambah Data Post </a>

    <table class="table table-bordered border-secondary">
      <thead>
        <tr>
          <th scope="col" style="width:1em">No</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th class="text-center" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        
            
        @foreach ($posts as $p)
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td>{{ $p->title }}</td>
          <td>{{ $p->category->name}}</td>
          <td class="text-center">
            <a href="/dashboard/posts/{{ $p->slug }}" class="badge bg-info mx-1 my-0.5">
                <span style="width: 24px; height: 24px; "data-feather="file-text"></span>
            </a>
            
            {{-- <a href="/dashboard/posts/{{ $p->id }}" class="badge bg-success mx-1 my-0.5"><span style="width: 24px; height: 24px;" data-feather="file-plus"></span></a> --}}
            
            <a href="/dashboard/posts/{{ $p->slug }}/edit" class="badge bg-warning mx-1 my-0.5">
                <span  style="width: 24px; height: 24px;" data-feather="edit"></span>
            </a>
            <form action="/dashboard/posts/{{ $p->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger mx-1 my-0.5 border-0" onclick="return confirm('Yakin Akan di Hapus?')" > <span style="width: 24px; height: 24px;" data-feather="delete"></span></button>
            </form>
            {{-- <a href="" class="badge bg-danger mx-1 my-0.5">
                <span style="width: 24px; height: 24px;" data-feather="delete"></span>
            </a> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection