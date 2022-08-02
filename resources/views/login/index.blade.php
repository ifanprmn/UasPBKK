@extends('layout.main')
@section('container')

<div class="row justify-content-center">

    <div class="row justify-content-center">
      <div class="col-md-8">
        @if( session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show text-center fw-bolder" role="alert">
          {{ session('berhasil') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif 

        @if(session()->has('errorLogin'))
        <div class="alert alert-danger alert-dismissible fade show text-center fw-bolder" role="alert">
          {{ session('errorLogin') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
      </div>
    </div>  
  
    <div class="col-md-4">
        <main class="form-signin">
            <form action="/login" method="post">
              @csrf
              <img class="mb-3 rounded mx-auto d-block" style="background-color: rgba(0,0,0,0.2)" src="../css/icons/box-arrow-in-right.svg" alt="" width="72" height="57">
              <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
          
              <div class="form-floating">
                <input type="email" class="form-control @error ('email') is-invalid @enderror " name="email" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
              </div>
              @error('email')
                <div class="invalid-feedback" id="email">
                    {{ $message }} 
                </div>
              @enderror

              <div class="form-floating">
                <input type="password" class="form-control @error ('password')is-invalid @enderror" name="password" id="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              @error('password')
                  <div class="invalid-feedback" id="password">
                    {{ $message }}
                  </div> 
              @enderror
              <div class="d-grid gap-2">
                <button class="btn btn-lg btn-primary" type="submit">Login</button>
              </div>
              <small class="d-block text-center mt-3">Register To Our Website <a href="/register">In Here</a></small>

              <p class="mt-5 mb-3 text-muted">&copy;</p>
            </form>
        </main>
    </div>
</div>

@endsection

