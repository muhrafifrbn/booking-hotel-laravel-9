<div class="row justify-content-center p-2">
    <div class="col-sm-3">
        <a href="{{ route('fasilitas.create') }}" class="btn btn-primary d-block">Tambah Data</a>
    </div>
</div>

<table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($fasilitas as $item)
            
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->keterangan }}</td>
          <td>
            <a href="{{ route('fasilitas.show', $item->slug) }}" class="badge bg-info">Detail</a>
            <a href="{{ route("fasilitas.edit", $item->slug) }}" class="badge bg-warning">Edit</a>
             <form class="d-inline" action="{{ route('fasilitas.destroy', $item->slug) }}" method="post">
              @csrf
              @method("delete")
              <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin data dihapus? ')">Hapus Data</button>
            </form>
          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>