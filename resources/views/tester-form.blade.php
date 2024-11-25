<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Boostrape Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Hotel Ravany</title>
    

  
  </head>
  <body>
    <div class="col-lg-6 m-auto">
    @if ($errors->count() > 1)
    @foreach ($errors->all() as $item)
    {{ $item }}
@endforeach
    @endif
        <form action="/tester/form" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Masuk</label>
                <input type="datetime-local" name="data_masuk" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              @error("data_masuk")
                <div class="invalid-feedback">
                  Hello
                </div>
              @enderror
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Keluar</label>
                <input type="datetime-local" name="data_keluar" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              @error("data_keluar")
              <div class="invalid-feedback">
                Hello
              </div>
              @enderror
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Keluar</label>
                <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              @error("nama")
              <div class="invalid-feedback">
                Hello
              </div>
              @enderror
              </div>
              <button type="submit">Kirim</button>
        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>