<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Penyetoran;
use File;

class AdminController extends Controller
{
    public function dashboard()
    {
        $transaksi = DB::table('penyetoran')
            ->join('users', 'users.id', '=', 'penyetoran.id_user')
            ->join('detail_penyetoran', 'penyetoran.id_penyetoran', '=', 'detail_penyetoran.id_penyetoran')
            ->select(\DB::RAW('sum(penyetoran.harga*penyetoran.bobot) as total'), \DB::RAW('detail_penyetoran.tanggal_penyetoran'))
            ->groupBy('detail_penyetoran.tanggal_penyetoran')
            ->whereMonth('detail_penyetoran.tanggal_penyetoran', date('m'))
            ->get();
        $data = [];

        foreach ($transaksi as $row) {
            $data['label'][] = $row->tanggal_penyetoran;
            $data['data'][] = $row->total;
        }

        $data['chart_data'] = json_encode($data);
        //
        $jenis = DB::table('jenis')
            ->join('penyetoran', 'penyetoran.id_jenis', '=', 'jenis.id_jenis')
            ->select(
                'jenis.nama_jenis as nama_jenis',
                \DB::RAW('count(penyetoran.id_jenis) as jml_jenis')
            )
            ->groupBy('jenis.nama_jenis')->get();
        $datas = [];

        foreach ($jenis as $rows) {
            $datas['label'][] = $rows->nama_jenis;
            $datas['data'][] = $rows->jml_jenis;
        }

        $datas['chart_datas'] = json_encode($datas);


        return view('page/admin/home/index', $data, $datas);
    }

    public function cekTongSampah(Request $request)
    {
        // $data = DB::table('tongSampah')->get();
        return view('page/petugas/tong-sampah/cek-tong-sampah');
    }
    public function user_petugas()
    {
        $data = DB::table('users')->join('biodata', 'biodata.id_user', 'users.id')
            ->where('users.level', 'Petugas')->get();
        return view('page/admin/user/petugas', compact('data'));
    }
    public function user_nasabah()
    {
        $data = DB::table('users')->join('biodata', 'biodata.id_user', 'users.id')
            ->where('users.level', 'Nasabah')->get();
        return view('page/admin/user/nasabah', compact('data'));
    }
    public function form_tambah()
    {
        return view('page/admin/user/tambah');
    }
    public function adduser(Request $request)
    {
        foreach ($request->name as $key => $value) {
            $user = new User();
            $user->name = $request->name[$key];
            $user->email = $request->email[$key];
            $user->username = $request->username[$key];
            $user->password = hash::make($request->username[$key]);
            $user->level = $request->level[$key];
            $user->save();
            if (!empty($request->file('foto')[$key])) {
                $ambil = $request->file('foto')[$key];
                $namaFileBaru = md5($ambil->getClientOriginalName());
                $namafoto = $ambil->move(\base_path() . "/public/foto", $namaFileBaru);
            } else {
                $namafoto = NULL;
                $namaFileBaru = NULL;
            }
            DB::table('biodata')->insert([
                'id_user' => $user->id,
                'nik' => $request->nik[$key],
                'ponsel' => $request->ponsel[$key],
                'alamat' => $request->alamat[$key],
                'foto' => $namaFileBaru,
                'path' => $namafoto,
            ]);
        }
        return redirect(route('user_' . strtolower($_GET['keyword'])))->with('add', '-');
    }
    public function form_update($id)
    {
        $data = User::join('biodata', 'biodata.id_user', '=', 'users.id')
            ->where('users.id', $id)->get();
        return view('page/admin/user/ubah', compact('data'));
    }
    public function updateuser(Request $request, $id)
    {
        $hari = substr($request->tgl_lahir, 8, 2);
        $bulan = substr($request->tgl_lahir, 5, 2);
        $tahun = substr($request->tgl_lahir, 0, 4);
        $kode = $hari . $bulan . $tahun;
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'name' => $request->name,
        ]);
        if (!empty($request->file('foto'))) {
            $ambil = $request->file('foto');
            $namaFileBaru = md5($ambil->getClientOriginalName());
            $namafoto = $ambil->move(\base_path() . "/public/foto", $namaFileBaru);
        } else {
            $namaFileBaru = $request->fotoLama;
            $namafoto = NULL;
        }
        DB::table('biodata')->where('id_user', $id)->update([
            'nik' => $request->nik,
            'ponsel' => $request->ponsel,
            'alamat' => $request->alamat,
            'foto' => $namaFileBaru,
            'path' => $namafoto,
        ]);
        return redirect(route('user_' . strtolower($_GET['keyword'])))->with('up', '-');
    }
    public function del_user($id)
    {
        User::where('id', $id)->delete();
        DB::table('biodata')->where('id_user', $id)->delete();
        return redirect()->back()->with('del', '-');
    }
    public function cek_user($id)
    {
        $data = DB::table('users')->join('biodata', 'biodata.id_user', 'users.id')
            ->where('users.id', $id)->get();
        return view('page/admin/user/cek', compact('data'));
    }

    public function data_jenis()
    {
        $data = DB::table('jenis')->get();
        return view('page/admin/jenis/index', compact('data'));
    }
    public function addjenis(Request $request)
    {
        foreach ($request->nama_jenis as $key => $value) {
            DB::table('jenis')->insert([
                'nama_jenis' => $request->nama_jenis[$key],
            ]);
        }
        return redirect()->back()->with('add', '-');
    }
    public function deletejenis($id_jenis)
    {
        DB::table('jenis')->where('id_jenis', $id_jenis)->delete();
        return redirect()->back()->with('del', '-');
    }
    public function updatejenis(Request $request, $id_jenis)
    {
        DB::table('jenis')->where('id_jenis', $id_jenis)->update([
            'nama_jenis' => $request->nama_jenis
        ]);
        return redirect()->back()->with('up', '-');
    }

    public function profil()
    {
        $data = DB::table('users')->join('biodata', 'biodata.id_user', 'users.id')
            ->where('users.id', Auth::user()->id)->where('users.id', Auth::user()->id)->get();
        return view('page/admin/profil/index', compact('data'));
    }
    public function ubah_user(Request $request, $id)
    {
        if ($request->hasFile('foto')) {
            $ambil = $request->file('foto');
            $name = $ambil->getClientOriginalName();
            $namaFileBaru = uniqid();
            $namaFileBaru .= $name;
            $ambil->move(\base_path() . "/public/foto", $namaFileBaru);
            User::where('id', $id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ]);
            DB::table('biodata')->where('id_user', $id)->update([
                'nik' => $request->nik,
                'ponsel' => $request->ponsel,
                'alamat' => $request->alamat,
                'foto' => $namaFileBaru,
            ]);
            $tempat = public_path("foto/" . $request->gambarLama);
            File::delete($tempat);
        } else {
            User::where('id', $id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ]);
            DB::table('biodata')->where('id_user', $id)->update([
                'nik' => $request->nik,
                'ponsel' => $request->ponsel,
                'alamat' => $request->alamat,
            ]);
        }
        return redirect()->back()->with('up', '-');
    }
    public function ganti_password(Request $request, $id)
    {
        User::where('id', $id)->update([
            'password' => hash::make($request->password),
        ]);
        return redirect()->back()->with('up', '-');
    }
}