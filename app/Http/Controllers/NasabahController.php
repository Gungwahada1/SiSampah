<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyetoran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NasabahController extends Controller
{
	public function beranda_saya()
	{
		$data=User::join('biodata','biodata.id_user','=','users.id')->where('users.id',Auth::user()->id)->get();
		$tabungan=DB::table('tabungan')
		->join('users','users.id','=','tabungan.id_user')
		->select(\DB::RAW('sum(jml_tabungan) as jml_tabungan'))
		->where('tabungan.id_user',Auth::user()->id)
		->first();
		$poin=DB::table('poin')
		->join('users','users.id','=','poin.id_user')
		->select(\DB::RAW('sum(jml_poin) as jml_poin'))
		->where('poin.id_user',Auth::user()->id)
		->first();
		$penukaran=DB::table('penukaran_poin')
		->join('users','users.id','=','penukaran_poin.id_user')
		->select(\DB::RAW('sum(poin_produk) as poin_produk'))
		->where('penukaran_poin.id_user',Auth::user()->id)
		->first();
		$penarikan=DB::table('penarikan_tabungan')
		->join('users','users.id','=','penarikan_tabungan.id_user')
		->select(\DB::RAW('sum(jml_penarikan) as jml_penarikan'))
		->where('penarikan_tabungan.id_user',Auth::user()->id)
		->first();
		$user=User::join('biodata','biodata.id_user','=','users.id')->where('users.id',Auth::user()->id)->get();
		return view('page/nasabah/home/index',compact('data','tabungan','poin','penarikan','penukaran','user'));
	}
	public function aktivitas_saya()
	{
		$data=Penyetoran::join('jenis','jenis.id_jenis','=','penyetoran.id_jenis')
		->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
		->join('users','users.id','detail_penyetoran.id_petugas')
		->join('tabungan','tabungan.id_penyetoran','=','penyetoran.id_penyetoran')
		->join('poin','poin.id_penyetoran','=','penyetoran.id_penyetoran')
		->where('penyetoran.id_user',Auth::user()->id)		
		->get();
		return view('page/nasabah/aktivitas/index',compact('data'));
	}

	public function penarikan_saya()
	{
		$data=DB::table('penarikan_tabungan')
		->join('users','users.id','=','penarikan_tabungan.id_user')
		->where('users.id',Auth::user()->id)->get();
		DB::table('penarikan_tabungan')->where('status_penarikan','F')->where('id_user',Auth::user()->id)->update([
			'status_penarikan'=>'T',
		]);
		return view('page.nasabah.riwayat.penarikan',compact('data'));
	}
	public function penukaran_saya()
	{
		$data=DB::table('penukaran_poin')
		->join('users','users.id','=','penukaran_poin.id_user')
		->where('users.id',Auth::user()->id)->get();
		return view('page.nasabah.riwayat.penukaran',compact('data'));
	}
}
