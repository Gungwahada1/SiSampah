@extends('page/layout/app')

@section('title','RIWAYAT PENARIKAN TABUNGAN')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Riwayat Penarikan Tabungan
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Nasabah</th>
                                <th>Tanggal Penarikan</th>
                                <th>Waktu Penarikan</th>
                                <th>Jumlah Penarikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->name}}</td>
                                <td>{{tanggal_indonesia($dt->tanggal_penarikan)}}</td>
                                <td>{{$dt->waktu_penarikan}}</td>
                                <td>Rp. {{number_format($dt->jml_penarikan,0,",",".")}}</td>
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

