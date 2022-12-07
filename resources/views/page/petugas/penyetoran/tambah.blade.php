@extends('page/layout/app')

@section('title','FORM TAMBAH PENYETORAN GARBAGES')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2>Menambah Penyetoran Garbages</h2>
                <form method="post" action="{{route('add_penyetoran')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="" for="val-password">Nama Nasabah <span class="text-danger">*</span>
                            </label>
                            <select class="choices form-control" required="" name="id_user">
                                <option value="">-- PILIH NAMA NASABAH --</option>
                                @foreach($nasabah as $nsb)
                                <option value="{{$nsb->id}}">{{$nsb->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="val-skill">Tanggal Penyetoran <span class="text-danger">*</span>
                            </label>
                            <input type="date" value="{{date('Y-m-d')}}" class="form-control" name="tanggal_penyetoran" required="">
                        </div>
                    </div>
                    
                    <div class="form-validation mt-3" id="after-add-more">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Jenis Sampah <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" required="" name="id_jenis">
                                    <option value="">-- PILIH JENIS --</option>
                                    @foreach($jenis as $jns)
                                    <option value="{{$jns->id_jenis}}">{{$jns->nama_jenis}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password">Keterangan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="4" name="nama_sampah" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Harga/kg <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="harga" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Bobot/kg <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="bobot" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-8 ml-auto">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Lanjutkan')">Simpan</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection