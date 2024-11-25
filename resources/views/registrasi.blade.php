@extends('layouts.main')
@section('container')
<main class="form-signin border text-center">
    <div class="row justify-content-center mt-5">
      <form class="col-md-8" action="{{ route("registrasi") }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Silahkan Registrasi</h1>
        <div class="form-floating mb-2">
          <input type="text"  name="name" value="{{ old("name") }}" class="form-control  @error("name") is-invalid @enderror" id="name" >
          <label for="floatingInput">Nama</label>
          @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="text"  name="username" value="{{ old("username") }}" class="form-control  @error("username") is-invalid @enderror" id="username">
          <label for="floatingInput">Username</label>
          @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="email"  name="email" value="{{ old("email") }}" class="form-control  @error("username") is-invalid @enderror" id="email" >
          <label for="floatingInput">Email</label>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="password"  name="password" value="{{ old("password") }}" class="form-control @error("password") is-invalid @enderror" id="password" >
          <label for="floatingInput">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
        <a href="/login" class="w-100 btn btn-lg btn-warning mt-2">Login</a>
        <a href="/" class="w-100 btn btn-lg btn-danger mt-2" >Kembali</a>
      </form>
    </div>
  </main>
  
@endsection