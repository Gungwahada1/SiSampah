<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            @if (Auth::user()->level !== 'Nasabah')
                <li class="nav-label">Beranda</li>
                <li>
                    <a href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Beranda</span>
                    </a>
                </li>
                <li class="nav-label">Data Master</li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-layers menu-icon"></i><span class="nav-text">Data Master</span>
                    </a>
                    <ul aria-expanded="false">
                        @if (Auth::user()->level == 'Admin')
                            <li>
                                <a href="{{ route('user_petugas') }}">
                                    Data Petugas
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('user_nasabah') }}">
                                Data Nasabah
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('data_jenis') }}" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i><span class="nav-text">Type Garbages</span>
                    </a>
                </li>
                <li class="nav-label">Penyetoran Garbages/Sampah</li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-notebook menu-icon"></i><span class="nav-text">Data Penyetoran</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('data_penyetoran') }}">
                                Semua
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('data_penyetoran_bulanini') }}">
                                Bulan ini
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('cek.tong.sampah') }}" aria-expanded="false">
                        <i class="icon-trash menu-icon"></i><span class="nav-text">Cek Tong Sampah</span>
                    </a>
                </li>

                <li class="nav-label">Tabungan dan Poin</li>
                <li>
                    <a href="{{ route('tabungan_nasabah') }}" aria-expanded="false">
                        <i class="ti ti-wallet"></i><span class="nav-text">Tabungan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('poin_nasabah') }}" aria-expanded="false">
                        <i class="fa fa-rouble"></i><span class="nav-text">Poin</span>
                    </a>
                </li>
                <li class="nav-label">Data Laporan</li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-file-text-o menu-icon"></i><span class="nav-text">Laporan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('laporan_penyetoran') }}">Penyetoran</a></li>
                    </ul>
                </li>
            @else
                <li class="nav-label">Beranda</li>
                <li>
                    <a href="{{ route('beranda_saya') }}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Beranda</span>
                    </a>
                </li>
                <li class="nav-label">Aktivitas Penyetoran Saya</li>
                <li>
                    <a href="{{ route('aktivitas_saya') }}" aria-expanded="false">
                        <i class="fa fa-repeat"></i><span class="nav-text">Aktivitas Saya</span>
                    </a>
                </li>
                <li class="nav-label">Riwayat Penarikan dan Penukaran</li>
                <li>
                    <a href="{{ route('penarikan_saya') }}" aria-expanded="false">
                        <i class="ti ti-wallet"></i><span class="nav-text">Penarikan Tabungan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('penukaran_saya') }}" aria-expanded="false">
                        <i class="fa fa-rouble"></i><span class="nav-text">Penukaran Poin</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
