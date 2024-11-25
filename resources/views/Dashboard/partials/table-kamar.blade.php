<div class="row justify-content-center p-2">
  <div class="col-sm-3">
      <a href="/dashboard/create" class="btn btn-primary d-block">Tambah Data</a>
  </div>
</div>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Type Kamar</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kamars as $item)
          
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->type }}</td>
        <td>{{ $item->status }}</td>
        <td>
          <a href="/dashboard/detail/{{ $item->slug }}" class="badge bg-info">Detail</a>
          <a href="/dashboard/edit/{{ $item->slug }}" class="badge bg-warning">Edit</a>
           <form class="d-inline" action="/dashboard/hapus/{{ $item->slug }}" method="post">
            @csrf
            @method("delete")
            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin data dihapus? ')">Hapus Data</button>
          </form>
        </td>
      </tr>
      @endforeach
     
    </tbody>
  </table>