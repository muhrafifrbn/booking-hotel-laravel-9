@extends('layouts.main')
@section('container')
<main class="form-signin border text-center">
    @if (session("sukses"))
    <div class="row justify-content-center">
      <div class="alert alert-success col-md-6" role="alert">
        {{ session("sukses") }}
      </div>
    </div>
    @endif
    @if (session("gagal"))
    <div class="row justify-content-center">
      <div class="alert alert-danger col-md-6" role="alert">
        {{ session("gagal") }}
      </div>
    </div>
    @endif
    <div class="row justify-content-center mt-5">
      <form class="col-md-8" action="/login" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please Login</h1>
        <div class="form-floating mb-2">
          <input type="text"  name="username" value="{{ old("username") }}" class="form-control  @error("username") is-invalid @enderror" id="username" placeholder="name@example.com">
          <label for="floatingInput">Username</label>
          @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="password"  name="password" value="{{ old("password") }}" class="form-control @error("password") is-invalid @enderror" id="password" placeholder="name@example.com">
          <label for="floatingInput">Password</label>
          @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <a href="/registrasi" class="w-100 btn btn-lg btn-warning mt-2">Registrasi</a>
        <a href="/" class="w-100 btn btn-lg btn-danger mt-2" >Kembali</a>
      </form>
    </div>
  </main>
  
@endsection