@extends('layout.main')
@section('container')
    

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-registration">
            <form action="/register" method="post">
                @csrf
              <img class="mb-3 rounded mx-auto d-block" style="background-color: rgba(0,0,0,0.2)" src="../css/icons/box-arrow-in-right.svg" alt="" width="72" height="57">
              <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
          
              <div class="form-floating">
                
                <input type="text"   autocomplete='off' class="form-control @error ('name') is-invalid @enderror" id="name" name="name" placeholder="Name" min="5" value="{{ old('name') }}" >
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback" id="name">
                    {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-floating">
                <input type="text"  autocomplete='off' class="form-control @error ('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" >
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback" id="username">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input type="email" autocomplete='off' class="form-control  @error ('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback" id="email">
                    {{ $message }} 
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input type="password" autocomplete='off' class="form-control @error ('password') is-invalid @enderror" id="password" name="password" placeholder="Password"> 
                <label for="password">Password</label>  
                @error('password')  
                <div class="invalid-feedback" id="password">  
                    {{ $message }} 
                </div>  
                @enderror 

              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-lg btn-primary" type="submit">Register</button>
              </div>
            </form>
        </main>
    </div>
</div>

@endsection

