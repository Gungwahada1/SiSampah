<div class="modal fade text-left" id="edit{{$dt->id_jenis}}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Update Data Jenis</h5>
                <button type="button" class="close rounded-pill"
                data-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form method="post" action="{{route('updatejenis',$dt->id_jenis)}}">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama Jenis</label>
                            <input type="text" value="{{$dt->nama_jenis}}" class="form-control" name="nama_jenis">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">
                    Tutup
                </button>
                <button class="btn btn-primary ml-1">
                    Ubah
                </button>
            </div>
        </form>
    </div>
</div>
</div>