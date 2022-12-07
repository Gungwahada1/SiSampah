@extends('page/layout/app')

@section('title','BERANDA NASABAH')

@section('content')
@foreach($user as $usr)
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3>Data Nasabah</h3> <hr>
                <center>
                    @if($usr->foto==NULL)
                    <img src="{{asset('template/images/user/3.png')}}" width="70">
                    @else
                    <img src="{{asset('foto')}}/{{$usr->foto}}" width="70">
                    @endif
                </center>
                <div class="media align-items-center mb-4">
                    <div class="media-body">
                        <h3 class="mb-3 text-center">{{Auth::user()->name}}</h3>
                        <p class="text-muted mb-3">USERNAME<br> <b class="text" style="color: #000;">{{Auth::user()->username}}</b></p>

                        <p class="text-muted mb-3">Email<br> <b class="text text-success">{{Auth::user()->email}}</b></p>
                    </div>
                </div>
                <center><a href="{{route('profil')}}" class="btn btn-sm btn-primary">Beralih ke Profil</a></center>
            </div>
        </div>  
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-content">
                    <div class="stat-text">Total Tabungan</div>
                    <div class="stat-digit gradient-4-text">Rp. {{number_format($tabungan->jml_tabungan-$penarikan->jml_penarikan,0,",",".")}}</div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-content">
                    <div class="stat-text">Total Poin</div>
                    <div class="stat-digit gradient-4-text">{{number_format($poin->jml_poin-$penukaran->poin_produk,0,",",".")}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
