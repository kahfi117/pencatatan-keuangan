<div class="modal fade" id="modal_laporan" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Buat Laporan Penjualan
        </h5>
      </div>
      <form action="{{route('penjualan.buatLaporan')}}" method="GET">
        
      <div class="modal-body">
        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input type="date" class="form-control" name="tanggal_mulai" required>
          <div class="invalid-feedback">
            Something Else
          </div>
        </div>
        <div class="form-group">
          <label>Tanggal Selesai</label>
          <input type="date" class="form-control" name="tanggal_selesai" required>
          <div class="invalid-feedback">
            Something Else
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@foreach ($data as $item)
<div class="modal fade" id="modalDelete_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button> --}}
        </div>
        <form action="{{ route('penjualan.destroy',$item->id) }}" method="post">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $item->id }}">
          <div class="modal-body">
            Anda yakin ingin menghapus Data <b>{{ $item->nama_penyewa }}</b>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-info" data-dismiss="modal">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Tutup</span>
            </button>
            <button type="submit" class="btn btn-outline-danger ml-1" id="btn-save">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Yakin</span>
            </button>
          </div>
        </form>
      </div>
    </div>
</div>
@endforeach