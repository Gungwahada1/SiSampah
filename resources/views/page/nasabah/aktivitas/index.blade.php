@extends('page/layout/app')

@section('title','AKTIVITAS PENYETORAN SAYA')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Aktivitas Penyetoran Garbages
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
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{Auth::user()->name}}</td>
                                <td>{{$dt->nama_jenis}} - {{$dt->nama_sampah}}</td>
                                <td>Rp {{number_format($dt->harga,0,",",".")}}</td>
                                <td>{{$dt->bobot}} kg</td>
                                <td>{{tanggal_indonesia($dt->tanggal_penyetoran)}}</td>
                                <td align="center">
                                    <a href="" data-toggle="modal" data-target="#detail{{$dt->id_penyetoran}}" class="btn btn-sm btn-primary" title='Detail Penyetoran'><i class="fa fa-file-text"></i></a>
                                </td>
                            </tr>
                            @include('page/nasabah/aktivitas/detail')
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

