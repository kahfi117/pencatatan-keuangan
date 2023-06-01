@foreach ($data as $item)

@isset($item->id)
{{-- Modal Edit --}}
<div class="modal fade" id="modalEdit_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lunasi Data</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button> --}}
        </div>
        <form action="{{ route('bm.update',$item->id) }}" method="post">
          @method('PUT')
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $item->id }}">
          <input type="hidden" name="nominal_kredit" value="{{ $item->nominal_kredit }}">
          <input type="hidden" name="nominal_cash" value="{{ $item->nominal_cash }}">
          <input type="hidden" name="harga" value="{{ $item->harga }}">

          <div class="modal-body">
            Anda yakin ingin Melunasi Pembelian Barang Masuk dari Distributor <b>{{ $item->nama_distributor }}</b>
            dengan total harga <b>Rp.{{number_format($item->harga,2,',','.')}}</b>, 
            Sisa pelunasan sebesar <b>Rp.{{number_format($item->nominal_kredit,2,',','.')}}</b>
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

{{-- Modal Delete --}}

<div class="modal fade" id="modalDelete_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button> --}}
        </div>
        <form action="{{ route('bm.delete',$item->id) }}" method="post">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $item->id }}">
          <div class="modal-body">
            Anda yakin ingin menghapus Data 
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

{{-- Modal Bukti Bayar --}}

<div class="modal fade" id="modalLihat_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
        </div>
        <div class="modal-body">
          <div class="card m-2"> 
            <img src="{{ asset('notas/'.$item->nota) }}" alt="Gambar Nota" class="img-thumbnail">
            <br>
            <h6> Bukti Bayar </h6>
            <p> Nama Distributor : {{ $item->nama_distributor }}
              <br> Tanggal : {{ $item->tanggal }}
              <br> Total : {{ $item->harga }}
            </p>
          </div>
          <button type="button" class="btn btn-outline-info" data-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Tutup</span>
          </button>
        </div>
      </div>
    </div>
</div>

@endisset
    
@endforeach