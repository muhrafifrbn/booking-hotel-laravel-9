@extends('Pemesanan.layouts.main')

@section('container')
        <div class="row align-items-center">
            <div class="col-md-6">
                @if ($pemesanan->transaksi)
                  <img style="width: 500px"  src="{{ asset("storage/".$pemesanan->transaksi->foto) }}"  alt="...">
                @else
                    <p>Pembayaran belum dilakukan</p>
                @endif
                
            </div>
            <div class="col-md-6 row">
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Nama</h5>
                      <p class="">{{ $pemesanan->nama }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Nomor KTP</h5>
                      <p class="">{{ $pemesanan->noKtp }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Email</h5>
                      <p class="">{{ $pemesanan->email }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">No Hp</h5>
                      <p class="">{{ $pemesanan->noHp }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Nama Tamu</h5>
                      <p class="">{{ $pemesanan->nama_tamu }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Tanggal CekIn</h5>
                      <p class="">{{ $pemesanan->cekIn }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Tanggal CekOut</h5>
                      <p class="">{{ $pemesanan->cekOut }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Jumlah Kamar</h5>
                      <p class="">{{ $pemesanan->jumlah_kamar }}</p>
                    </div>
                  </div>
                <div class="card col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Status</h5>
                      @if ($pemesanan->status == 1)
                      <p class="badge bg-success">Sudah Dikonfirmasi</p>
                      @else
                      <p class="badge bg-danger">Belum Dikonfirmasi</p>
                      @endif
                   
                    </div>
                  </div>
              
            </div>
          </div>
    
@endsection