@extends('page/layout/app')

@section('title','Laporan Penyetoran')

@section('content')
<div class="row">
    <div class="container mb-3">
       <div class="row">
           <div class="col-lg-5 pb-4" style="background: white;box-shadow:2px 2px grey;">
            <form method="get" action="{{route('laporan_penyetoran')}}">
                @csrf
                <input type="date" required="" class="form-control mt-2" name="awal">
                <input type="date" required="" class="form-control mt-2" name="akhir">
                <button class="btn btn-sm btn-primary mt-2">Cari</button>
                @if(!empty($_GET['awal']))
                <a href="{{route('export_penyetoran',['awal'=>$_GET['awal'],'akhir'=>$_GET['akhir']])}}&keyword=PDF" target="_blank" class="btn btn-sm btn-danger mt-2" style="float: right;"><i class="fa fa-print"></i></a>
                <a href="{{route('export_penyetoran',['awal'=>$_GET['awal'],'akhir'=>$_GET['akhir']])}}&keyword=Excel" target="_blank" class="btn btn-sm btn-success mt-2 text-white mr-2" style="float: right;"><i class="fa fa-file-excel-o"></i></a>
                @endif
            </form>
        </div>
    </div>
</div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                Table With Laporan Penyetoran
            </div>
            <div class="table-responsive">
                <table class="table table-borderd table-hover zero-configuration">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Nasabah</th>
                            <th>Jenis Sampah</th>
                            <th>Keterangan</th>
                            <th>Harga/kg</th>
                            <th>Bobot</th>
                            <th>Tanggal Penyetoran</th>
                            <th>Waktu Penyetoran</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$no}}. </td>
                            <td>{{$dt->name}}</td>
                            <td>{{$dt->nama_jenis}}</td>
                            <td>{{$dt->nama_sampah}}</td>
                            <td>Rp {{number_format($dt->harga,0,",",".")}}</td>
                            <td>{{$dt->bobot}} kg</td>
                            <td>{{tanggal_indonesia($dt->tanggal_penyetoran)}}</td>
                            <td>{{$dt->waktu_penyetoran}}</td>
                            <td>Rp {{number_format($dt->harga*$dt->bobot,0,",",".")}}</td>
                        </tr>
                        <?php $no++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
@endsection