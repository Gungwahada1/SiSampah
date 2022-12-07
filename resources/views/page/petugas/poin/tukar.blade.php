<div class="modal fade" id="tukarpoin{{$dt->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lanjutkan Penukaran - {{$dt->name}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('tukar_poin',$dt->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-content">
                                        <div class="stat-text">Total Poin</div>
                                        <div class="stat-digit gradient-4-text">{{number_format($total->jml_poin-$penarikan->poin_produk,0,",",".")}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Produk yang di tukarkan</label>
                                <input type="text" class="form-control" required="" name="nama_produk">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Poin Produk</label>
                                <input type="number" class="form-control" min="1" required="" max="{{$total->jml_poin-$penarikan->poin_produk}}" name="poin_produk">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="return confirm('Lanjutkan Penukaran')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>