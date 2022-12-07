<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
	public function login()
	{
		return view('login');
	}
	public function ceklogin(Request $request)
	{
		if (!empty($request->email) OR !empty($request->password)) {
			if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]) OR Auth::attempt(['username'=>$request->email,'password'=>$request->password])) {
				if (Auth::user()->level!=="Nasabah") {
					return response()->json([
						'masuk_admin' => '-'
					]);
				}else{
					return response()->json([
						'masuk_penghuni' => '-'
					]);
				}
			}else{
				return response()->json([
					'notmasuk' => '-'
				]);
			}
		}else{
			return response()->json([
				'kosong' => '-'
			]);
		}
	}
	public function logout()
	{
		Auth::logout();
		return redirect('/');
	}

	public function forgot()
	{
		return view('forgot');
	}
	public function proses_forgot(Request $request)
	{
		$data=DB::table('users')->where('email',$request->email)->first();
		if ($data == null) {
			$request->session()->forget('kodeverif');
			return redirect()->back()->with('salah','-');
		}else{
			$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$shuffle  = substr(str_shuffle($karakter), 0, 6);
			$kode=$shuffle.$data->id;
			DB::table('users')->where('id',$data->id)->update([
				'token'=>$kode,
			]);
			$request->session()->put('kodeverif',$kode);
			$details= [
				'tipe'=>'Lupa Password',
				'email'=>$data->email,
				'verifikasi'=>$kode,
			];
			\Mail::to($data->email)->send(new \App\Mail\SendMail($details));
			return redirect()->back()->with('benar','-');
		}
	}
	public function cek_verifikasi(Request $request)
	{
		$data=User::where('token',$request->token)->first();
		if ($data == null) {
			return redirect()->back()->with('tokensalah','-');
		}else{
			$request->session()->forget('kodeverif');
			$request->session()->put('pss',$data->id);
			return redirect()->back()->with('tokenbenar','-');
		}
	}
	public function ubah_password(Request $request)
	{
		User::where('id',session('pss'))->update([
			'password'=>hash::make($request->password),
		]);
		User::where('id',session('pss'))->update([
			'token'=>'',
		]);
		$request->session()->forget('pss');
		return redirect(route('login'))->with('yes','-');
	}

	public function read()
	{
		$data=DB::table('penarikan_tabungan')
		->where('id_user',Auth::user()->id)
		->where('status_penarikan','F')->count();
		$tarik=DB::table('penarikan_tabungan')
		->where('id_user',Auth::user()->id)
		->where('status_penarikan','F')->get();
		return ['data' => $data,'code' => 200, 'tarik' => $tarik];
	}
}
