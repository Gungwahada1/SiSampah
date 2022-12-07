<div class="modal fade" id="detail{{$dt->id_penyetoran}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Penyetoran {{$dt->name}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label>Nama Nasabah</label>
                    </div>
                    <div class="col-6">
                        <label>: {{$dt->name}}</label>
                    </div>
                    <div class="col-6">
                        <label>Jenis Sampah</label>
                    </div>
                    <div class="col-6">
                        <label>: {{$dt->nama_jenis}}</label>
                    </div>
                    <div class="col-6">
                        <label>Keterangan</label>
                    </div>
                    <div class="col-6">
                        <label>: {{$dt->nama_sampah}}</label>
                    </div>
                    <div class="col-6">
                        <label>Harga</label>
                    </div>
                    <div class="col-6">
                        <label>: Rp {{number_format($dt->harga,0,",",".")}}</label>
                    </div>
                    <div class="col-6">
                        <label>Bobot</label>
                    </div>
                    <div class="col-6">
                        <label>: {{$dt->bobot}}kg</label>
                    </div>
                    <div class="col-6">
                        <label>Tanggal Penyetoran</label>
                    </div>
                    <div class="col-6">
                        <label>: {{tanggal_indonesia($dt->tanggal_penyetoran)}}</label>
                    </div>
                    <div class="col-6">
                        <label>Waktu</label>
                    </div>
                    <div class="col-6">
                        <label>: {{$dt->waktu_penyetoran}}</label>
                    </div>
                    <div class="col-6">
                        <label>Mendapat Poin</label>
                    </div>
                    <div class="col-6">
                        <label>: {{$dt->jml_poin}} Poin</label>
                    </div>
                    <div class="col-6">
                        <label>Mendapat Tabungan</label>
                    </div>
                    <div class="col-6">
                        <label>: Rp {{number_format($dt->jml_tabungan,0,",",".")}}</label>
                    </div>
                    <div class="col-6">
                        <label>Nama Petugas</label>
                    </div>
                    <div class="col-6">
                        <label>: {{Auth::user()->name}}</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>