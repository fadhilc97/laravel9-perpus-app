<div class="modal fade" id="kembali_buku_wizard" tabindex="-1" aria-labelledby="kembali_buku_wizard_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kembali_buku_wizard_label">Kembalikan Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/transaksi/{{ $transaksi->id }}/return" method="post">
          @csrf
          @method('put')
          <input type="hidden" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d', strtotime($transaksi->tanggal_pinjam))) }}">
          <div class="row">
            <label for="tanggal_kembali" class="col-sm-5 col-form-label">Tanggal Kembali</label>
            <div class="col-sm-5">
                <input class="form-control form-control-sm" type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', date('Y-m-d')) }}">
            </div>
          </div>
          <div class="mt-3 row gap-2">
            <div class="col-form-label">
              <button type="submit" class="col-sm-3 btn btn-sm btn-success text-decoration-none">Konfirmasi</button>
              <button type="button" class="col-sm-3 btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>