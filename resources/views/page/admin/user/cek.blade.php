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
                <div class="media align-items-center mb-4">
                    <div class="media-body">
                        <h3 class="mb-0">{{$dt->name}}</h3>
                        <p class="text-muted mb-0"><span class="badge bg-success text-white">{{$dt->level}}</span><br>{{$dt->ponsel}}</p>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="col-lg-8 col-xl-9">

        <div class="card">
            <div class="card-body">
                <div class="media media-reply">
                    <div class="media-body">
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
                                    <input type="text" value="{{$dt->nik}}" required name="nik" class="form-control"
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
                            <div class="col-md-6">
                                <h6>USERNAME</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" value="{{$dt->username}}" required name="email" class="form-control"
                                    placeholder="Username ...">
                                </div>
                            </div>  
                            <div class="col-xl-12">
                                <h6>ALAMAT</h6>
                                <textarea class="form-control" rows="4">{{$dt->alamat}}</textarea>
                            </div>  
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <div class="media media-reply">
                    <div class="media-body">
                        <iframe class="form-control" style="height: 300px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=720&amp;hl=en&amp;q={{$dt->alamat}}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endforeach
@endsection