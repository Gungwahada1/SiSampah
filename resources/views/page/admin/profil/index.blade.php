@extends('page/layout/app')

@foreach($data as $dt)
@section('title',"$dt->name")

@section('content')
<div class="row">
    <div class="col-lg-4 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                @if($dt->foto==NULL)
                <img src="{{asset('template/images/user/3.png')}}" width="50">
                @else
                <img src="{{asset('foto')}}/{{$dt->foto}}" class="rounded-circle" width="50">
                @endif
                <div class="media align-items-center mb-1">
                    <div class="media-body">
                        <h3 class="mb-0">{{$dt->name}}</h3>
                        <p class="text-muted mb-0">{{$dt->level}}
                        </p>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('ganti_password',$dt->id)}}">
                            @csrf
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" required="" name="password" class="form-control">
                            </div>
                            <button class="btn btn-sm btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xl-9">

        <div class="card">
            <div class="card-body">

                <form method="post" action="{{route('ubah_user',$dt->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h6>NAMA</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" required value="{{$dt->name}}" name="name" class="form-control"
                                placeholder="Nama User ...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>NIK</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="number" value="{{$dt->nik}}" required name="nik" class="form-control"
                                placeholder="NIK ...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>EMAIL</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="email" value="{{$dt->email}}" required name="email" class="form-control"
                                placeholder="Email ...">
                            </div>
                        </div>  
                        <div class="col-xl-6">
                            <h6>USERNAME</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" required value="{{$dt->username}}" name="username" class="form-control"
                                placeholder="Username ...">
                            </div>
                        </div> 
                        <div class="col-xl-12">
                            <h6>NOMOR TELEPON</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="number" required value="{{$dt->ponsel}}" name="ponsel" class="form-control"
                                placeholder="TELEPON ...">
                            </div>
                        </div> 

                        <div class="col-12">
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <div class="file-upload" style="width:100%;">
                                    <div class="image-upload-wrap">
                                        <input type="hidden" value="{{$dt->foto}}" name="gambarLama">
                                        <input class="file-upload-input" name="foto" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Tarik Foto ke sini</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Hapus <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="4" name="alamat">{{$dt->alamat}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn bt-sm btn-primary form-control">Submit</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
@endforeach
@endsection