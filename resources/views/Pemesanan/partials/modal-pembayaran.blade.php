
{{-- RANDOM REKENING BANK --}}
@php
    $bca = mt_rand(1000, 20000);
    $mandiri = mt_rand(1000, 20000);
    $bni = mt_rand(1000, 20000);
@endphp

<div class="modal fade" id="pembayaran{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form action="{{ route("pemesanan.transaksi", $item->id) }}" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pembayaran Untuk Kamar Type {{ $item->kamar->type }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Pilih bank untuk melakukan transfer</li>
                    <li class="list-group-item">Upload bukti transfer</li>
                    <li class="list-group-item">Resepsionis akan melakukan konfirmasi jika pembayaran berhasil</li>
                  </ol>
                @csrf
                <div class="row mt-2">
                        <div class="mb-3 col-sm-6">
                            <label for="nama" class="form-label">Transfer Ke Bank</label>
                            <select name="nama_bank" class="form-select" aria-label="Default select example">
                                <option value="BCA">BCA | No Rek. {{ $bca }}</option>
                                <option value="Mandiri">Mandiri | No Rek.{{ $mandiri }}</option>
                                <option value="BNI">BNI | No Rek. {{ $bni }}</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="foto" class="form-label">Upload Bukti Transfer</label>
                            <input type="file" onchange="previewImage()" name="foto" class="form-control" id="foto" >
                              
                          </div>
                </div>

                <h5>Foto Bukti Pembayaran</h5>
                <img class="img-preview img-fluid col-sm-3 mb-3" alt="">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </div>
    </form>
    </div>
  </div>

<script>
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