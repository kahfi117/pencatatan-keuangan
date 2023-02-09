{{-- Start Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Sumber Pemasukan</h5>
          {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <form action="{{route('gaji-pegawai.store')}}" class="needs-validation" method="POST">
          @csrf

          <div class="modal-body">
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal" required>
              <div class="invalid-feedback">
                Something Else
              </div>
            </div>
            <div class="form-group">
              <label>Nama Karyawan</label>
              <input type="text" class="form-control" name="karyawan_name" required>
              <div class="invalid-feedback">
                Something Else
              </div>
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" class="form-control" name="nominal" required placeholder="Jumlah Dalam Rp.">
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
{{-- End Add Modal --}}

@foreach ($data as $item)

@isset($item->id)
{{-- Modal Edit --}}
<div class="modal fade" id="modalEdit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{route('gaji-pegawai.store')}}" class="needs-validation" method="post">
                @csrf
                
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required value="{{$item->tanggal}}">
                    <div class="invalid-feedback">
                      Something Else
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" class="form-control" name="karyawan_name" required value="{{$item->karyawan_name}}">
                    <div class="invalid-feedback">
                      Something Else
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="nominal" value="{{$item->nominal}}">
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

{{-- Modal Delete --}}

<div class="modal fade" id="modalDelete_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button> --}}
        </div>
        <form action="{{ route('gaji-pegawai.destroy',$item->id) }}" method="post">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $item->id }}">
          <div class="modal-body">
            Anda yakin ingin menghapus Data Gaji Dari <b>{{ $item->karyawan_name }}</b>
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

@endisset
    
@endforeach