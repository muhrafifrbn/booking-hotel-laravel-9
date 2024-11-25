@extends('Dashboard.layouts.main')

@section('container')
        <div class="row align-items-center">
            <div class="col-md-6">
                <img style="width: 500px"  src="{{ asset("storage/$fasilitas->foto") }}"  alt="...">
            </div>
            <div class="col-md-6 row">
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Nama</h5>
                      <p class="">{{ $fasilitas->nama }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Slug</h5>
                      <p class="">{{ $fasilitas->slug }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Fasilitas</h5>
                      <p class="">{{ $fasilitas->keterangan }}</p>
                    </div>
                  </div>
              
            </div>
          </div>
    
@endsection