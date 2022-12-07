@extends('page/layout/app')

@section('title','TABUNGAN NASABAH')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Total Tabungan Nasabah
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Nasabah</th>
                                <th>Riwayat Penarikan</th>
                                <th>Total Tabungan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                            <?php  
                            $total=DB::table('tabungan')
                            ->join('users','users.id','=','tabungan.id_user')
                            ->select(\DB::RAW('sum(jml_tabungan) as jml_tabungan'))
                            ->where('tabungan.id_user',$dt->id)
                            ->first();
                            $penarikan=DB::table('penarikan_tabungan')
                            ->join('users','users.id','=','penarikan_tabungan.id_user')
                            ->select(\DB::RAW('sum(jml_penarikan) as jml_penarikan'))
                            ->where('penarikan_tabungan.id_user',$dt->id)
                            ->first();
                            $riwayat=DB::table('penarikan_tabungan')
                            ->join('users','users.id','=','penarikan_tabungan.id_user')
                            ->where('penarikan_tabungan.id_user',$dt->id)
                            ->count();
                            ?>
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->name}}</td>
                                <td><a href="{{route('riwayat_penarikan',$dt->id)}}?act={{md5(date('F'))}}&kwt={{md5(date('H:i:s'))}}" target="_blank">{{$riwayat}} x penarikan <br><i>(Lihat <i title="Lihat Riwayat" class="fa fa-eye"></i>)</i></a></td>
                                <td>Rp {{number_format($total->jml_tabungan-$penarikan->jml_penarikan,0,",",".")}}</td>
                                <td align="center">
                                    <a href="" data-toggle="modal" data-target="#tariktabungan{{$dt->id}}" class="btn btn-sm btn-primary">Tarik Tabungan</a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            @include('page/petugas/tabungan/tarik')
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

