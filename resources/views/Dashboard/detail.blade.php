@extends('Dashboard.layouts.main')

@section('container')
        <div class="row align-items-center">
            <div class="col-md-6">
                <img style="width: 500px"  src="{{ asset("storage/$kamar->foto") }}"  alt="...">
            </div>
            <div class="col-md-6 row">
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Typer Kamar</h5>
                      <p class="">{{ $kamar->type }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Slug</h5>
                      <p class="">{{ $kamar->slug }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Fasilitas</h5>
                      <p class="">{{ $kamar->fasilitas }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Jumlah</h5>
                      <p class="">{{ $kamar->jumlah }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Status</h5>
                      <p class="">{{ $kamar->status }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Harga</h5>
                      <p class="">{{ $kamar->harga }}</p>
                    </div>
                  </div>
            </div>
          </div>
    
@endsection