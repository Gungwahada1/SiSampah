@extends('page/layout/app')

@section('title','RIWAYAT PENUKARAN POIN')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Riwayat Penukaran Poin
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Nasabah</th>
                                <th>Nama Produk</th>
                                <th>Poin Produk</th>
                                <th>Tanggal Penukaran</th>
                                <th>Waktu Penukaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->nama_produk}}</td>
                                <td><b>{{$dt->poin_produk}}</b> poin di tukarkan</td>
                                <td>{{tanggal_indonesia($dt->tanggal_penukaran)}}</td>
                                <td>{{$dt->waktu_penukaran}}</td>
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

