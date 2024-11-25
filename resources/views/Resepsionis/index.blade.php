@extends('Resepsionis.layouts.main')

@section('container')
  @if (session("sukses"))
      <div class="alert alert-success" role="alert">
        {{ session("sukses") }}
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
        <th scope="col">Bukti Pembayaran</th>
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
                <button type="button" class="button bg-primary btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bukti{{ $item->transaksi->id }}">
                  Konfirmasi
                </button>
              </td>
            @else
              <td>
                <p class="badge bg-danger" >Belum Melakukan Pembayaran</p>
              </td>
            @endif
            <td>
              <a href="{{ route('pemesanan.show', $item->id) }}" class="badge bg-info">Detail</a>
              <a href="" class="badge bg-warning">Edit</a>
               <form class="d-inline" action="" method="post">
                @csrf
                @method("delete")
                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin data dihapus? ')">Hapus Data</button>
              </form>
            </td>
      </tr>
    @empty
        
    @endforelse
      
    </tbody>
  </table>

  @foreach ($pemesanan as $item)
      @if ($item->transaksi)
        @include('Resepsionis.partials.modal-buktiBayar')   
      @endif   
  @endforeach

@endsection