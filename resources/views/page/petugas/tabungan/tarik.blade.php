<div class="modal fade" id="tariktabungan{{$dt->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tarik Tabungan - {{$dt->name}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('tarik_tabungan',$dt->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-content">
                                        <div class="stat-text">Total Tabungan</div>
                                        <div class="stat-digit gradient-4-text">Rp. {{number_format($total->jml_tabungan-$penarikan->jml_penarikan,0,",",".")}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Jumlah Penarikan</label>
                                <input type="number" class="form-control" min="1" required="" max="{{$total->jml_tabungan-$penarikan->jml_penarikan}}" name="jml_penarikan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="return confirm('Lanjutkan Penarikan')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>