@extends('page/layout/app')
@foreach($data as $dt)
@section('title',"Update $dt->name")

@section('content')
<div class="row">
    <div class="col-xl-12 col-xl-9">
        <div class="card">
            <div class="card-body">
                <label>UBAH DATA USER <b>{{$dt->name}}</b>
                </label>
                <div class="media media-reply">
                    <div class="media-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('updateuser',$dt->id)}}?keyword={{$_GET['keyword']}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>NAMA</h6>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" required name="name" value="{{$dt->name}}" class="form-control"
                                        placeholder="Nama ...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>EMAIL</h6>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="email" required name="email" value="{{$dt->email}}" class="form-control"
                                        placeholder="Email ...">
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <h6>USERNAME</h6>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" required name="username" value="{{$dt->username}}" class="form-control"
                                        placeholder="Username ...">
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <h6>NIK</h6>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="number" required name="nik" value="{{$dt->nik}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>TELEPON</h6>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="number" required name="ponsel" value="{{$dt->nik}}" class="form-control">
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <h6>ROLE</h6>
                                    <div class="form-group">
                                        <select class="form-control" required="" name="level">
                                            <option <?php if($dt->level==$_GET['keyword']){echo "selected";} ?> value="{{$_GET['keyword']}}">{{$_GET['keyword']}}</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>FOTO PROFIL <sup>(opsional)</sup></label>
                                        <div class="file-upload" style="width:100%;">
                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" name="foto" type='file' onchange="readURL(this);" accept="image/*" />
                                                <input type="hidden" value="{{$dt->foto}}" name="fotoLama">
                                                <div class="drag-text">
                                                    <h3>Tarik Foto ke sini</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Hapus <span class="image-title">Tambahkan</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h6>ALAMAT</h6>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" required="" name="alamat">{{$dt->alamat}}</textarea>
                                    </div>
                                </div> 
                                <div class="col-lg-3">
                                    <button class="btn btn-sm btn-primary form-control">Submit</button>
                                </div>
                                <div class="col-lg-3">
                                    <button type="reset" class="btn btn-sm btn-light form-control">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endforeach
@endsection