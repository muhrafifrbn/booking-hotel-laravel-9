<!-- Modal -->
<div class="modal fade" id="bukti{{ $item->transaksi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route("pemesanan.konfirmasi", $item->id) }}" method="post">
          @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img  src="{{ asset("storage/".$item->transaksi->foto) }}" alt="" srcset="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if (!$item->status)
                  <button type="submit" class="btn btn-primary">Konfirmasi</button>
                @endif
            
            </div>
        </form>
      </div>
    </div>
  </div>