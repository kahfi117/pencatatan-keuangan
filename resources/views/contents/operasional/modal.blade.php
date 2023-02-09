{{-- Start Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Biaya Operasional</h5>
          {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <form action="{{route('operasional.store')}}" class="needs-validation" method="POST">
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
              <label>Nama Item</label>
              <input type="text" class="form-control" name="item_name" required>
              <div class="invalid-feedback">
                Something Else
              </div>
            </div>
            <div class="form-group">
              <label>Nominal</label>
              <input type="number" class="form-control" name="nominal" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Biaya Operasional {{$item->item_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{route('operasional.store')}}" method="post">
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
                    <label>Nama Item</label>
                    <input type="text" class="form-control" name="item_name" required value="{{$item->item_name}}">
                    <div class="invalid-feedback">
                      Something Else
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nominal</label>
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
        <form action="{{ route('operasional.destroy',$item->id) }}" method="post">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $item->id }}">
          <div class="modal-body">
            Anda yakin ingin menghapus Data Operasional <b>{{ $item->item_name }}</b>
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