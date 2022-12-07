@extends('page/layout/app')

@section('title','FORM UBAH PENYETORAN GARBAGES')

@section('content')
@foreach($data as $dt)
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2>Mengubah Penyetoran Garbages - {{$dt->name}}</h2>
                <form method="post" action="{{route('update_penyetoran',$dt->id_penyetoran)}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label class="" for="val-password">Nama Nasabah <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" required="" name="id_user">
                                <option value="">-- PILIH NAMA NASABAH --</option>
                                @foreach($nasabah as $nsb)
                                <option <?php if($nsb->id==$dt->id_user){echo "selected";} ?> value="{{$nsb->id}}">{{$nsb->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="val-skill">Tanggal Penyetoran <span class="text-danger">*</span>
                            </label>
                            <input type="date" value="{{$dt->tanggal_penyetoran}}" class="form-control" name="tanggal_penyetoran" required="">
                        </div>
                        <div class="col-lg-4">
                            <label for="val-currency">Waktu Penyetoran <span class="text-danger">*</span>
                            </label>
                            <input type="time" value="{{$dt->waktu_penyetoran}}" class="form-control" name="waktu_penyetoran" required="">
                        </div>
                    </div>
                    <div class="form-validation mt-3">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Jenis Sampah <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" required="" name="id_jenis">
                                    <option value="">-- PILIH JENIS --</option>
                                    @foreach($jenis as $jns)
                                    <option <?php if($jns->id_jenis==$dt->id_jenis){echo "selected";} ?> value="{{$jns->id_jenis}}">{{$jns->nama_jenis}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password">Keterangan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="4" name="nama_sampah" required="">{{$dt->nama_sampah}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Harga/kg <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" value="{{$dt->harga}}" name="harga" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Bobot/kg <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{$dt->bobot}}" name="bobot" required="">
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
@endforeach
@endsection