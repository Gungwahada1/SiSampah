@extends('page/layout/app')

@section('title','DATA PENYETORAN GARBAGES - BULAN INI')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>From Data Penyetoran Sampah Bulan <u>{{date('F')}}</u>
                        <a href="{{route('form_add_penyetoran')}}" class="btn btn-primary btn-sm" style="float: right;">
                            Tambah Penyetoran
                        </a>
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Nasabah</th>
                                <th>Sampah</th>
                                <th>Harga/kg</th>
                                <th>Bobot</th>
                                <th>Tanggal Penyetoran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                            @if($dt->id_petugas==Auth::user()->id)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->nama_jenis}} - {{$dt->nama_sampah}}</td>
                                <td>Rp {{number_format($dt->harga,0,",",".")}}</td>
                                <td>{{$dt->bobot}} kg</td>
                                <td>{{tanggal_indonesia($dt->tanggal_penyetoran)}}</td>
                                <td align="center">
                                    <a href="{{route('form_update_penyetoran',$dt->id_penyetoran)}}" class="btn btn-sm text-white btn-success">
                                        <i class="fa fa-edit"></i></a>
                                        <a href="{{ route('hapus_penyetoran', $dt->id_penyetoran) }}" onclick="return confirm('Lanjut Hapus Data {{$dt->nama_sampah}}?')" class="btn btn-sm btn-danger" title='Hapus Data'><i class="fa fa-trash"></i></a>
                                        <a href="" data-toggle="modal" data-target="#detail{{$dt->id_penyetoran}}" class="btn btn-sm btn-primary" title='Detail Penyetoran'><i class="fa fa-file-text"></i></a>
                                    </td>
                                </tr>
                                @include('page/petugas/penyetoran/detail')
                                @endif
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

