@extends('layouts.main')
@section('container')
    <header >
        @include('partials.navbar')
        <div class="row h-75  justify-content-center align-items-center">
          <div class="col-md-6  text-center">
            <p>Welcome</p>
            <p>Hotel Ravany</p>
            <p>"Kami Menyediakan Kamar Hotel Terbaik"</p>
          </div>
        </div>
    </header>
    <main>

      {{-- START SECTION FORM-PEMESANAN --}}
        <form action="/pemesanan" method="post">
          @csrf
          <section id="form-pemesanan" class="container ">
              <div class=" row justify-content-center ">
                  <div class="col-md-3">
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Typer Kamar</label>
                          <select class="form-select" name="kamar_id" aria-label="Default select example">
                            @forelse ($kamar as $item)
                              @if (old("kamar_id") == $item->id)
                                  <option selected value="{{ $item->id }}">{{ $item->type }}</option>
                              @else
                                  <option value="{{ $item->id }}">{{ $item->type }}</option>
                              @endif
                            @empty
                                <p>Data Belum Di upload</p>
                            @endforelse
                           
                          </select>
                        </div>
                  </div>
                  <div class="col-md-3">
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tanggal Cek In</label>
                          <input type="datetime-local" name="cekIn" class="form-control @error('cekIn') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tanggal Cek Out</label>
                      <input type="datetime-local" name="cekOut" class="form-control @error('cekOut') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                  </div>
                  </div>
                  <div class="col-md-3">
                      @auth
                      <div class="mb-3">
                        <a type="button" class="button bg-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Pesan
                        </a>
                      </div>
                      @else
                       <div class="mb-3">
                          <a class="button bg-primary" href="/login"><span>Pesan</span></a>
                        </div>
                      @endauth
                     
                  </div>
              </div>
          </section>
          @auth
            @include('partials.modal-form')
          @endauth
        
        </form>
     
        {{-- END SECTION FORM PEMESANAN --}}

        {{-- START SECTION KAMAR --}}
        <section id="about" class="container ">
            <h2 class="text-center">About</h2>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card">
                        <img src="img/logo-hotel-baru.jpg" class="card-img-top" alt="...">
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            Hotel kelas atas dengan bangunan bergaya Spanyol ini menghadap ke Laut Atlantik, serta berjarak 3 km dari Pantai Basque dan 47 km dari Gunung Karang yang berapi. Kamar bernuansa hangat dan suite dilengkapi dengan dekorasi sederhana dan furnitur dari kayu jati, serta menyediakan TV layar datar dan balkon pribadi dengan pemandangan kolam renang atau pedesaan. Hotel bernuansa santai yang terletak di samping Pantai Basque ini berjarak 6 menit berjalan kaki dari Mercusuar Cikoneng.
                        </div>
                      </div>
                </div>
            </div>
        </section>
        {{-- END SECTION KAMAR --}}

        {{-- START KAMAR HOTEL --}}
        <section id="kamar_hotel" class="container mt-3 ">
            <h2 class="pb-5 text-center">Kamar Hotel</h2>
            <div class="row justify-content-center">
              @forelse ($kamar as $item)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        @if ($item->foto != null)
                        <img src="storage/{{ $item->foto }}" class="card-img-top" alt="...">
                        @else
                          <p class="text-center">Foto belum di upload</p>
                        @endif
                      
                        <div class="card-body">
                          <h5 class="card-title text-center">{{ $item->type }}</h5>
                          <p class="card-text">Fasilitas = {{ $item->fasilitas }}</p>
                          <p class="card-text">Harga = {{ $item->harga }}</p>
                          <p class="card-text">Jumlah Kamar = {{ $item->jumlah }}</p>
                          <div class="d-grid gap-2">
                            @if ($item->status != "Ready")
                            <p class="btn btn-danger">{{ $item->status }}</p>
                            @else
                            <p class="btn btn-primary">{{ $item->status }}</p>
                            @endif
                         
                          </div>
                        </div>
                      </div>
                </div>
              @empty
                  <p class="text-center">Data Kamar Belum Ada</p>
              @endforelse
                
            </div>
        </section>
        {{-- END KAMAR HOTEL --}}

        {{-- START FASILITAS HOTEL --}}
        <section id="fasilitas" class="container m-5">
            <h2 class="pb-5 text-center">Fasilitas Hotel</h2>
            <div class="row  justify-content-center align-items-center">
               @forelse ($fasilitas as $item)
                  <div class="col-md-4">
                    <div class="card border" style="width: 18rem;">
                        <img src="{{ asset("storage/".$item->foto) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text text-center">{{ $item->nama }}</p>
                          <p class="card-text text-center">{{ $item->keterangan }}</p>
                        </div>
                      </div>
                  </div>
               @empty
                <p class="text-center">Data Fasilitas Belum Ada</p>
               @endforelse
                
                
                
                
                
            </div>
        </section>
        {{-- END FASILITAS HOTEL --}}
    </main>

    
    <footer>
        <div class="card text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
              <h5 class="card-title">Social Media</h5>
              <a href="" class=" d-inline-block m-2 p-3"><i class="bi bi-twitter-x"></i></a>
              <a href="" class=" d-inline-block m-2 p-3"><i class="bi bi-instagram"></i></a>
              <a href="" class=" d-inline-block m-2 p-3"><i class="bi bi-whatsapp"></i></a>
              <a href="" class=" d-inline-block m-2 p-3"><i class="bi bi-facebook"></i></a>
            </div>
            <div class="card-footer text-body-secondary">
                Create Love By Rafif Rabbani
            </div>
          </div>
    </footer>
@endsection