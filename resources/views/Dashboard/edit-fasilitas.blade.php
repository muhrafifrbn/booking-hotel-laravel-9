@extends('Dashboard.layouts.main')
@section('container')
<form action="{{ route('fasilitas.update',$fasilitas->slug) }}" method="POST" class=" mt-5 p-3" enctype="multipart/form-data">
  @csrf
  @method("put")
  <div class="row">
    <div class="mb-3 col-md-6">
      <label for=type class="form-label">Nama Fasilitas</label>
      <input type="text" name="nama" value="{{ old("nama", $fasilitas->nama) }}" class="form-control @error('nama') is-invalid @enderror" id="nama" aria-describedby="emailHelp">
      @error("nama")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" name="slug" value="{{ old("slug", $fasilitas->slug) }}" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="emailHelp">
      @error("slug")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
      <label for="fasilitas" class="form-label">Keterangan</label>
      <input type="text" name="keterangan" value="{{ old("keterangan", $fasilitas->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror" id="fasilitas" aria-describedby="emailHelp">
      @error("keterangan")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
   
    

    <div class="mb-3 col-md-6">
      <label for="formFile" class="form-label">Foto</label>
      @if ($fasilitas->foto)
        <img src="{{ asset("storage/$fasilitas->foto") }}" class="img-preview img-fluid col-sm-6 mb-3" alt="">
        @else
        <img class="img-preview img-fluid col-sm-6 mb-3" alt="">
        @endif
      <input onchange="previewImage()" class="form-control @error('harga') is-invalid @enderror" name="foto" type="file" id="foto">
      @error("foto")
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
    <div class="d-grid gap-2">
     
      <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
  </form>

  <script>
        const type = document.querySelector("#nama");
        const slug = document.querySelector("#slug");

        type.addEventListener("change", function(){
            let value = type.value;
            fetch(`/dashboard/checkSlug?nama=${value}`)
            .then(response => response.json())
            .then(data => slug.value = data.slug )
        })

        function previewImage(){
          let image = document.querySelector("#foto")
          let imgPreview = document.querySelector(".img-preview")

          imgPreview.style.display = "block";

          const oFReader = new FileReader()
          oFReader.readAsDataURL(image.files[0])
          
          oFReader.onload = function(orFREvent){
            imgPreview.src = orFREvent.target.result
          }
        }

  </script>
@endsection