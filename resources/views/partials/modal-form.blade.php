<!-- Button trigger modal -->


  
  <!-- Modal Pesan-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="mb-3 col-sm-6">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" value="{{ $user->name }}" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="mb-3 col-sm-6">
                  <label for="nama" class="form-label">Email</label>
                  <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="mb-3 col-sm-6">
                  <label for="noHp" class="form-label">Nomor Telepon</label>
                  <input type="number" name="noHp" value="{{ old("noHp") }}" class="form-control @error('noHp') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('noHp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="mb-3 col-sm-6">
                  <label for="nama_tamu" class="form-label">Nama Tamu</label>
                  <input type="text" name="nama_tamu" value="{{ old("nama_tamu") }}" class="form-control @error('nama_tamu') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('nama_tamu')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="mb-3 col-sm-6">
                  <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                  <input type="text" name="jumlah_kamar" value="{{ old("jumlah_kamar") }}" class="form-control @error('jumlah_kamar') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('jumlah_kamar')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                 
              </div>
              <div class="mb-3 col-sm-6">
                  <label for="noKtp" class="form-label">Nomor KTP</label>
                  <input type="text" name="noKtp" value="{{ old("noKtp") }}" class="form-control @error('noKtp') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('noKtp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
              </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Pesan Kamar</button>
        </div>
      </div>
    </div>
  </div>