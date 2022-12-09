@extends('page/layout/app')

@section('title', 'CEK TONG SAMPAH')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="pb-3">Cek Tong Sampah
                        </h4>
                    </div>
                    <div class="col-md-6 col-lg-4 p-2 bg-info rounded-left rounded-right">
                        <a href="https://thingspeak.com/channels/1974631" class="text-white pt-2 pb-1">Tong
                            Sampah
                            Kantor Perbekel Saba
                            <p class="text-white">Jl. Pantai Saba, Saba, Kec. Blahbatuh, Gianyar, Bali</p>
                        </a>
                    </div>
                </div>
                {{-- <div class="table-responsive">
                        <table class="table table-borderd table-hover zero-configuration">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Sensor 1</th>
                                    <th>Sensor 2</th>
                                    <th>Status Sensor 1</th>
                                    <th>Status Sensor 2</th>
                                    <th>Waktu</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody> --}}
                {{-- {{ $no = 1 }}
                                @foreach ($data as $dt)
                                    {{ $total = DB::table('tabungan')->join('users', 'users.id', '=', 'tabungan.id_user')->select(\DB::RAW('sum(jml_tabungan) as jml_tabungan'))->where('tabungan.id_user', $dt->id)->first();
                                    $penarikan = DB::table('penarikan_tabungan')->join('users', 'users.id', '=', 'penarikan_tabungan.id_user')->select(\DB::RAW('sum(jml_penarikan) as jml_penarikan'))->where('penarikan_tabungan.id_user', $dt->id)->first();
                                    $riwayat = DB::table('penarikan_tabungan')->join('users', 'users.id', '=', 'penarikan_tabungan.id_user')->where('penarikan_tabungan.id_user', $dt->id)->count() }}
                                    <tr>
                                        <td>{{ $no }}. </td>
                                        <td>{{ $dt->name }}</td>
                                        <td><a href="{{ route('riwayat_penarikan', $dt->id) }}?act={{ md5(date('F')) }}&kwt={{ md5(date('H:i:s')) }}"
                                                target="_blank">{{ $riwayat }} x penarikan <br><i>(Lihat <i
                                                        title="Lihat Riwayat" class="fa fa-eye"></i>)</i></a></td>
                                        <td>Rp
                                            {{ number_format($total->jml_tabungan - $penarikan->jml_penarikan, 0, ',', '.') }}
                                        </td>
                                        <td align="center">
                                            <a href="" data-toggle="modal"
                                                data-target="#tariktabungan{{ $dt->id }}"
                                                class="btn btn-sm btn-primary">Tarik Tabungan</a>
                                        </td>
                                    </tr>
                                    {{ $no++ }}
                                    @include('page/petugas/tabungan/tarik')
                                @endforeach --}}
                {{-- </tbody>
                        </table>
                    </div> --}}
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
    </div>
@endsection
