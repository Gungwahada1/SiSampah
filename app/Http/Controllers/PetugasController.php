<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Penyetoran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
date_default_timezone_set('Asia/Jakarta');

class PetugasController extends Controller
{
	public function data_penyetoran()
	{
		$data=Penyetoran::join('jenis','jenis.id_jenis','=','penyetoran.id_jenis')
		->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
		->join('users','users.id','penyetoran.id_user')
		->join('tabungan','tabungan.id_penyetoran','=','penyetoran.id_penyetoran')
		->join('poin','poin.id_penyetoran','=','penyetoran.id_penyetoran')
		->get();
		return view('page/petugas/penyetoran/index',compact('data'));
	}
	public function data_penyetoran_bulanini()
	{
		$data=Penyetoran::join('jenis','jenis.id_jenis','=','penyetoran.id_jenis')
		->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
		->join('users','users.id','penyetoran.id_user')
		->join('tabungan','tabungan.id_penyetoran','=','penyetoran.id_penyetoran')
		->join('poin','poin.id_penyetoran','=','penyetoran.id_penyetoran')
		->whereMonth('detail_penyetoran.tanggal_penyetoran',date('m'))
		->get();
		return view('page/petugas/penyetoran/bulan',compact('data'));
	}
	public function form_add_penyetoran()
	{
		$jenis=Jenis::all();
		$nasabah=User::where('level','Nasabah')->get();
		return view('page/petugas/penyetoran/tambah',compact('jenis','nasabah'));
	}
	public function add_penyetoran(Request $request)
	{
		$aksi = New Penyetoran();
		$aksi -> id_user = $request->id_user;
		$aksi -> id_jenis = $request->id_jenis;
		$aksi -> nama_sampah = $request->nama_sampah;
		$aksi -> harga = $request->harga;
		$aksi -> bobot = $request->bobot;
		$aksi -> save();
		DB::table('detail_penyetoran')->insert([
			'id_penyetoran'=>$aksi->id_penyetoran,
			'id_petugas'=>Auth::user()->id,
			'tanggal_penyetoran'=>$request->tanggal_penyetoran,
			'waktu_penyetoran'=>date('H:i:s'),
		]);
		DB::table('tabungan')->insert([
			'id_penyetoran'=>$aksi->id_penyetoran,
			'id_user'=>$request->id_user,
			'jml_tabungan'=>$request->harga*$request->bobot,
		]);
		DB::table('poin')->insert([
			'id_penyetoran'=>$aksi->id_penyetoran,
			'id_user'=>$request->id_user,
			'jml_poin'=>$request->bobot*2,
		]);
		return redirect(route('data_penyetoran_bulanini'))->with('add','-');
	}
	public function form_update_penyetoran($id_penyetoran)
	{
		$data=Penyetoran::join('jenis','jenis.id_jenis','=','penyetoran.id_jenis')
		->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
		->join('users','users.id','penyetoran.id_user')
		->where('penyetoran.id_penyetoran',$id_penyetoran)
		->get();
		$jenis=Jenis::all();
		$nasabah=User::where('level','Nasabah')->get();
		return view('page/petugas/penyetoran/ubah',compact('jenis','nasabah','data'));
	}
	public function update_penyetoran(Request $request,$id_penyetoran)
	{
		DB::table('penyetoran')->where('id_penyetoran',$id_penyetoran)->update([
			'id_user'=>$request->id_user,
			'id_jenis'=>$request->id_jenis,
			'nama_sampah'=>$request->nama_sampah,
			'harga'=>$request->harga,
			'bobot'=>$request->bobot,
		]);
		DB::table('detail_penyetoran')->where('id_penyetoran',$id_penyetoran)->update([
			'tanggal_penyetoran'=>$request->tanggal_penyetoran,
			'waktu_penyetoran'=>date('H:i:s'),
		]);
		DB::table('tabungan')->where('id_penyetoran',$id_penyetoran)->update([
			'id_user'=>$request->id_user,
			'jml_tabungan'=>$request->harga*$request->bobot,
		]);
		DB::table('poin')->where('id_penyetoran',$id_penyetoran)->update([
			'id_user'=>$request->id_user,
			'jml_poin'=>$request->bobot*2,
		]);
		return redirect(route('data_penyetoran_bulanini'))->with('up','-');
	}
	public function hapus_penyetoran($id_penyetoran)
	{
		DB::table('penyetoran')->where('id_penyetoran',$id_penyetoran)->delete();
		DB::table('detail_penyetoran')->where('id_penyetoran',$id_penyetoran)->delete();
		return redirect(route('data_penyetoran'))->with('del','-');
	}

	public function tabungan_nasabah()
	{
		$data=DB::table('penyetoran')
		->join('users','users.id','=','penyetoran.id_user')
		->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
		->select(\DB::RAW('users.name'),\DB::RAW('users.id'))
		->groupBy('users.name','users.id')
		->distinct()
		->get();
		return view('page.petugas.tabungan.index',compact('data'));
	}
	public function tarik_tabungan(Request $request,$id)
	{
		DB::table('penarikan_tabungan')->insert([
			'id_user'=>$id,
			'jml_penarikan'=>$request->jml_penarikan,
			'tanggal_penarikan'=>date('Y-m-d'),
			'waktu_penarikan'=>date('H:i:s'),
		]);
		return redirect()->back()->with('tarik','-');
	}
	public function riwayat_penarikan($id)
	{
		$data=DB::table('penarikan_tabungan')
		->join('users','users.id','=','penarikan_tabungan.id_user')
		->where('users.id',$id)->get();
		return view('page.petugas.tabungan.riwayat-penarikan.index',compact('data'));
	}

	public function poin_nasabah()
	{
		$data=DB::table('penyetoran')
		->join('users','users.id','=','penyetoran.id_user')
		->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
		->select(\DB::RAW('users.name'),\DB::RAW('users.id'))
		->groupBy('users.name','users.id')
		->distinct()
		->get();
		return view('page.petugas.poin.index',compact('data'));
	}
	public function tukar_poin(Request $request,$id)
	{
		DB::table('penukaran_poin')->insert([
			'id_user'=>$id,
			'nama_produk'=>$request->nama_produk,
			'poin_produk'=>$request->poin_produk,
			'tanggal_penukaran'=>date('Y-m-d'),
			'waktu_penukaran'=>date('H:i:s'),
		]);
		return redirect()->back()->with('tukar','-');
	}
	public function riwayat_penukaran($id)
	{
		$data=DB::table('penukaran_poin')
		->join('users','users.id','=','penukaran_poin.id_user')
		->where('users.id',$id)->get();
		return view('page.petugas.poin.riwayat-penukaran.index',compact('data'));
	}

	public function laporan_penyetoran(Request $request)
	{
		if (empty($request->awal)) {
			$data=Penyetoran::join('jenis','jenis.id_jenis','=','penyetoran.id_jenis')
			->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
			->join('users','users.id','penyetoran.id_user')
			->get();
		}else{
			$data=Penyetoran::join('jenis','jenis.id_jenis','=','penyetoran.id_jenis')
			->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
			->join('users','users.id','penyetoran.id_user')
			->whereBetween('detail_penyetoran.tanggal_penyetoran',[$request->awal,$request->akhir])
			->get();
		}
		return view('page/petugas/laporan/penyetoran/index',compact('data'));
	}
	public function export_penyetoran(Request $request)
	{
		$data=Penyetoran::join('jenis','jenis.id_jenis','=','penyetoran.id_jenis')
		->join('detail_penyetoran','penyetoran.id_penyetoran','=','detail_penyetoran.id_penyetoran')
		->join('users','users.id','penyetoran.id_user')
		->whereBetween('detail_penyetoran.tanggal_penyetoran',[$request->awal,$request->akhir])
		->get();
		if ($request->keyword=="PDF") {
			$pdf=PDF::loadview('page/petugas/laporan/penyetoran/export',['data'=>$data])->setPaper('A4','landscape');
			return $pdf->stream();
		}else{
			return view('page/petugas/laporan/penyetoran/export',compact('data'));
		}
	}
}
