@extends('page/layout/app')

@section('title','DATA NASABAH')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data User Nasabah
                        <a href="{{route('form_tambah')}}?keyword=Nasabah" class="btn btn-primary btn-sm" style="float: right;">
                            Tambah Data
                        </a>
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nik</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->username}}</td>
                                <td>{{$dt->email}}</td>
                                <td>{{$dt->nik}}</td>
                                <td>{{$dt->ponsel}}</td>
                                <td align="center">
                                    <a href="{{route('form_update',$dt->id)}}?keyword={{$dt->level}}" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('cek_user',$dt->id)}}" class="btn btn-sm btn-primary text-white"><i class="fa fa-eye"></i></a>
                                    @if(Auth::user()->level=="Admin")
                                    <a href="{{route('del_user',$dt->id)}}" onclick="return confirm('hapus Data {{$dt->name}}?')" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
</div>
@endsection