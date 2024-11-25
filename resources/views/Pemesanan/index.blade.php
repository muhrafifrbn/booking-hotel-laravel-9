@extends('Pemesanan.layouts.main')

@section('container')
  @if (session("sukses"))
    <div class="alert alert-success" role="alert">
    {{ session("sukses") }}
  </div>
  @endif
  @if (session("gagal"))
    <div class="alert alert-danger" role="alert">
    {{ session("gagal") }}
  </div>
  @endif
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Type Kamar</th>
        <th scope="col">Tangggal Cek In</th>
        <th scope="col">Tanggal Cek Out</th>
        <th scope="col">Status Pemesanan</th>
        <th scope="col">Lakukan Pembayaran</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($pemesanan as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kamar->type }}</td>
            <td>{{ $item->cekIn }}</td>
            <td>{{ $item->cekOut }}</td>
            @if ($item->status == 1)
            <td ><p class="badge bg-success">Sudah di konfirmasi</p></td>
            @else
            <td ><p class="badge bg-danger">Belum di konfirmasi</p></td>
            @endif

                  @if ($item->transaksi)
                    <td>
                      <x-pemesanan.button konten="Bukti Pembayaran" idButton="#bukti{{ $item->transaksi->id }}"/>
                    </td>
                  @else
                        @if ($item->kamar->jumlah == 0)
                          <td>
                            <p type="button" class="badge bg-danger  btn-sm">
                              Maaf data kamar yang anda pesan habis!
                            </p>
                          </td>
                        @else
                          <td>
                            <x-pemesanan.button konten="Melakukan Pembayaran" idButton="#pembayaran{{ $item->id }}"/>
                          </td>
                        @endif
                    
                    @endif 

            <td>
                <a href="{{ route('pemesanan.show', $item->id) }}" class="badge bg-info">Detail</a>
                <a href="" class="badge bg-warning">Edit</a>
                <form class="d-inline" action="{{ route("pemesanan.destroy", $item->id) }}" method="post">
                  @csrf
                  @method("delete")
                  <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin data dihapus? ')">Hapus Data</button>
                </form>
            </td>
      </tr>
    @empty
        <tr>
          <td colspan="8" class="text-center">Tidak Ada Ada</td>
        </tr>
    @endforelse
      
    </tbody>
  </table>
  
  @foreach ($pemesanan as $item)
      @if ($item->transaksi)
        @include('Pemesanan.partials.modal-buktiTranfers')
      @else
        @include('Pemesanan.partials.modal-pembayaran')
        
      @endif
      
  @endforeach
 

  
@endsection