@extends('Dashboard.layouts.main')
@section('container')
<form action="/dashboard/store" method="POST" class=" mt-5 p-3" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="mb-3 col-md-6">
      <label for=type class="form-label">Type Kamar</label>
      <input type="text" name="type" value="{{ old("type") }}" class="form-control @error('type') is-invalid @enderror" id="type" aria-describedby="emailHelp">
      @error("type")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" name="slug" value="{{ old("slug") }}" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="emailHelp">
      @error("slug")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
      <label for="fasilitas" class="form-label">Fasilitas</label>
      <input type="text" name="fasilitas" value="{{ old("fasilitas") }}" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" aria-describedby="emailHelp">
      @error("fasilitas")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="text" name="jumlah" value="{{ old("jumlah") }}" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" aria-describedby="emailHelp">
      @error("jumlah")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    
    <div class="mb-3 col-md-6">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" aria-label="Default select example">
        @if (old("status") == "Ready")
        <option value="Ready" selected>Ready</option>
        <option value="Sold " >Sold</option>
        @else
        <option value="Ready" >Ready</option>
        <option value="Sold " selected >Sold</option>
        @endif
      
      </select>
      @error("status")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

     <div class="mb-3 col-md-6">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" aria-describedby="emailHelp" value="{{ old("harga") }}">
      @error("harga")
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
      <label for="formFile" class="form-label">Foto</label>
      <img class="img-preview img-fluid col-sm-6 mb-3" alt="">
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
        const type = document.querySelector("#type");
        const slug = document.querySelector("#slug");

        type.addEventListener("change", function(){
            let value = type.value;
            fetch(`/dashboard/checkSlug?type=${value}`)
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