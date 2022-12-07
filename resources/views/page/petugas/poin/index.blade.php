@extends('page/layout/app')

@section('title','POIN NASABAH')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Total Tabungan Poin
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Nasabah</th>
                                <th>Riwayat Penukaran</th>
                                <th>Total Poin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                            <?php  
                            $total=DB::table('poin')
                            ->join('users','users.id','=','poin.id_user')
                            ->select(\DB::RAW('sum(jml_poin) as jml_poin'))
                            ->where('poin.id_user',$dt->id)
                            ->first();
                            $penarikan=DB::table('penukaran_poin')
                            ->join('users','users.id','=','penukaran_poin.id_user')
                            ->select(\DB::RAW('sum(poin_produk) as poin_produk'))
                            ->where('penukaran_poin.id_user',$dt->id)
                            ->first();
                            $riwayat=DB::table('penukaran_poin')
                            ->join('users','users.id','=','penukaran_poin.id_user')
                            ->where('penukaran_poin.id_user',$dt->id)
                            ->count();
                            ?>
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->name}}</td>
                                <td><a href="{{route('riwayat_penukaran',$dt->id)}}?act={{md5(date('F'))}}&kwt={{md5(date('H:i:s'))}}" target="_blank">{{$riwayat}} x penukaran <br><i>(Lihat <i title="Lihat Riwayat" class="fa fa-eye"></i>)</i></a></td>
                                <td>{{$total->jml_poin-$penarikan->poin_produk}} Poin</td>
                                <td align="center">
                                    <a href="" data-toggle="modal" data-target="#tukarpoin{{$dt->id}}" class="btn btn-sm btn-primary">Tukarkan Poin</a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            @include('page/petugas/poin/tukar')
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

