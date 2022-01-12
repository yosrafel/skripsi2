<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Imports\KelasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Dosen;
use App\Kelas;
use App\Pekerjaan;
use App\User;
use App\DosenKelas;

class DashboardController extends Controller
{
    public function home()
    {
		$role = auth()->user()->role;
        $id = auth()->user()->id;
		if($role == 'admin'){
            $user = User::all()->where('role', 'dosen');
            $kelas = DosenKelas::all()->where('verifikasi', 'Ya');
            $pekerjaan = Pekerjaan::all()->where('verifikasi', 'Ya');
            return view('admin/index', compact(['user', 'kelas', 'pekerjaan']));
		}elseif($role == 'kaprodi'){
            $user = User::all()->where('role', 'dosen');
            $kelas = DosenKelas::all()->where('verifikasi', 'Ya');
            $pekerjaan = Pekerjaan::all()->where('verifikasi', 'Ya');
            return view('admin/index', compact(['user', 'kelas', 'pekerjaan']));
		}elseif($role == 'dosen'){
            $profil = auth()->user()->dosen;
			$dosen = Dosen::all();
            $kelas = Kelas::all();
            $kelas2 = Kelas::whereDoesntHave('dosenKelas', function($query){
                $query ->where('dosen_id', auth()->user()->dosen->id);
            })->get();
            $pekerjaan = Pekerjaan::all();

            $jmlPkj = Pekerjaan::where('verifikasi', 'Ya')->where('dosen_id', auth()->user()->dosen->id)->sum('sks');
            $jmlKls = DosenKelas::where('verifikasi', 'Ya')->where('dosen_id', auth()->user()->dosen->id)->sum('bkd_kelas');
            $jml = $jmlPkj + $jmlKls;
    
            $jmlPkj2 = Pekerjaan::where('verifikasi', '!=', 'Ya')->where('dosen_id', auth()->user()->dosen->id)->sum('sks');
            $jmlKls2 = DosenKelas::where('verifikasi', '!=', 'Ya')->where('dosen_id', auth()->user()->dosen->id)->sum('bkd_kelas');
            $jml2 = $jmlPkj2 + $jmlKls2;

			return view('dosen/index', compact(['kelas', 'kelas2', 'pekerjaan', 'dosen', 'profil',  'jmlPkj', 'jmlKls', 'jml',
            'jmlPkj2', 'jmlKls2', 'jml2']));
		}elseif($role == 'inqa'){
            $user = User::all()->where('role', 'dosen');
            $kelas = DosenKelas::all()->where('verifikasi', 'Ya');
            $pekerjaan = Pekerjaan::all()->where('verifikasi', 'Ya');
            return view('inqa/index', compact(['user', 'kelas', 'pekerjaan']));
		}
    }

    
    //INQA
    public function listdsnIn()
    {
        $dosen = Dosen::all();
        return view('inqa/list_dosen', compact(['dosen']));
    }

    public function profiledsnIn($id)
    {
        $dosen = Dosen::find($id);
        $kelas = Kelas::all();
        $pekerjaan = Pekerjaan::all();

        $jmlPkj = Pekerjaan::where('verifikasi', 'Ya')->where('dosen_id', $dosen->id)->sum('sks');
        $jmlKls = DosenKelas::where('verifikasi', 'Ya')->where('dosen_id', $dosen->id)->sum('bkd_kelas');
        $jml = $jmlPkj + $jmlKls;

        $jmlPkj2 = Pekerjaan::where('verifikasi', '!=', 'Ya')->where('dosen_id', $dosen->id)->sum('sks');
        $jmlKls2 = DosenKelas::where('verifikasi', '!=', 'Ya')->where('dosen_id', $dosen->id)->sum('bkd_kelas');
        $jml2 = $jmlPkj2 + $jmlKls2;

        return view('inqa/profiledsn', compact(['dosen', 'kelas', 'pekerjaan', 'jmlPkj', 'jmlKls', 'jml',
        'jmlPkj2', 'jmlKls2', 'jml2']));
    }
    
    //DOSEN
    public function updateProfilDsn(Request $req)
    {
        $dosen = auth()->user()->dosen;
        $dosen ->nama = $req->input('nama');
        $dosen ->alamat = $req->input('alamat');
        $dosen ->no_telp = $req->input('no_telp');
        $dosen ->save();
        return back()->with('status', 'Profil Berhasil Diubah!');
    }

    public function createKelasDsn(Request $req, $id)
    {
        $dosen = auth()->user()->dosen;
        if($dosen->kelas()->where('kelas_id',$req->kelas)->exists()){
            return back()->with('error', 'Kelas Sudah Terdaftar!');
        }
        if($req->kelas_sifat == 'Team Teaching'){
            if($req->kelas_jmlmhs <= 40 ){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => (1.5 * $req->kelas_sks) / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => (($req->kelas_jmlmhs/40) * (1.5 * $req->kelas_sks)) / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Group Teaching'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Tatap Muka'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Praktikum'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Kelas Lab'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => 3.5,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * 3.5,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Asistensi'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => ($req->kelas_jmlmhs * 0.5),
            'verifikasi' => 'Belum']);                          
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }
    }

    public function deleteKelasDsn($id, $idkelas)
    {
        $dosen = auth()->user()->dosen;
        $dosen->kelas()->detach($idkelas);
        return back()->with('status', 'Kelas Berhasil Dihapus!');
    }

    public function createPkjDsn(Request $req)
    {
        $pekerjaan = new Pekerjaan;
        $pekerjaan ->dosen_id = $req->input('dosen_id');
        $pekerjaan ->jenis_pekerjaan = $req->input('jenis_pekerjaan');
        $pekerjaan ->keterangan = $req->input('keterangan');
        $pekerjaan ->sks = $req->input('sks');
        $pekerjaan ->tahun_ajaran = $req->input('tahun_ajaran');
        $pekerjaan ->semester = $req->input('semester');
        $pekerjaan ->verifikasi = 'Belum';
        $pekerjaan ->save();
        return back()->with('status', 'Pekerjaan Berhasil Terdaftar!');
    }

    public function detailPkjDsn($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('dosen/detail_pkj', compact(['pekerjaan']));
    }

    public function updatePkjDsn(Request $req, $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan ->dosen_id = auth()->user()->dosen->id;
        $pekerjaan ->jenis_pekerjaan = $req->input('jenis_pekerjaan');
        $pekerjaan ->keterangan = $req->input('keterangan');
        $pekerjaan ->sks = $req->input('sks');
        $pekerjaan ->tahun_ajaran = $req->input('tahun_ajaran');
        $pekerjaan ->semester = $req->input('semester');
        $pekerjaan ->save();
        return redirect('/')->with('status', 'Pekerjaan Berhasil Diubah!');
    }
    
    public function deletePkjDsn($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        Pekerjaan::destroy($id);
        return redirect()->back()->with('status', 'Pekerjaan Berhasil Dihapus!');
    }

    //ADMIN

    public function listklsAdm()
    {
        $kelas = Kelas::all();
        return view('admin/list_kelas', compact(['kelas']));
    }

    public function importKelasExcel(Request $request) 
	{
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);	
        
        Excel::import(new KelasImport, $request->file('file'));
		return redirect('admin/list_kelas')->with('status', 'Kelas Berhasil Diimport !');
	}

    public function dtlklsAdm($id)
    {
        $kelas = Kelas::find($id);
        return view('admin/dtl_kelas', compact(['kelas']));
    }

    public function listdsnAdm()
    {
        $dosen = Dosen::all();
        return view('admin/list_dosen', compact(['dosen']));
    }

    public function profiledsnAdm($id)
    {
        $dosen = Dosen::find($id);
        $kelas = Kelas::all();
        $kelas2 = Kelas::whereDoesntHave('dosenKelas', function($query) use ($dosen){
            $query ->where('dosen_id', $dosen->id);
        })->get();
        $pekerjaan = Pekerjaan::all();

        $jmlPkj = Pekerjaan::where('verifikasi', 'Ya')->where('dosen_id', $dosen->id)->sum('sks');
        $jmlKls = DosenKelas::where('verifikasi', 'Ya')->where('dosen_id', $dosen->id)->sum('bkd_kelas');
        $jml = $jmlPkj + $jmlKls;

        $jmlPkj2 = Pekerjaan::where('verifikasi', '!=', 'Ya')->where('dosen_id', $dosen->id)->sum('sks');
        $jmlKls2 = DosenKelas::where('verifikasi', '!=', 'Ya')->where('dosen_id', $dosen->id)->sum('bkd_kelas');
        $jml2 = $jmlPkj2 + $jmlKls2;
        return view('admin/profiledsn', compact(['dosen', 'kelas', 'kelas2', 'pekerjaan', 'jmlPkj', 'jmlKls', 'jml',
        'jmlPkj2', 'jmlKls2', 'jml2']));
    }

    public function createKelasAdm(Request $req, $id)
    {
        $dosen = Dosen::find($id);
        if($dosen->kelas()->where('kelas_id',$req->kelas)->exists()){
            return back()->with('error', 'Kelas Sudah Terdaftar!');
        }
        if($req->kelas_sifat == 'Team Teaching'){
            if($req->kelas_jmlmhs <= 40 ){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => (1.5 * $req->kelas_sks) / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => (($req->kelas_jmlmhs/40) * (1.5 * $req->kelas_sks)) / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Group Teaching'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Tatap Muka'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks,]);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Praktikum'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Kelas Lab'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => 3.5,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * 3.5,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Asistensi'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => ($req->kelas_jmlmhs * 0.5),
            'verifikasi' => 'Belum']);                          
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }
    }

    public function deleteKelasAdm($id, $idkelas)
    {
        $dosen = Dosen::find($id);
        $dosen->kelas()->detach($idkelas);
        return redirect()->back()->with('status', 'Pekerjaan Berhasil Dihapus!');
    }

    public function createPkjAdm(Request $req)
    {
        $pekerjaan = new Pekerjaan;
        $pekerjaan ->dosen_id = $req->input('dosen_id');
        $pekerjaan ->jenis_pekerjaan = $req->input('jenis_pekerjaan');
        $pekerjaan ->keterangan = $req->input('keterangan');
        $pekerjaan ->sks = $req->input('sks');
        $pekerjaan ->tahun_ajaran = $req->input('tahun_ajaran');
        $pekerjaan ->semester = $req->input('semester');
        $pekerjaan ->verifikasi = 'Belum';
        $pekerjaan ->save();
        return back()->with('status', 'Pekerjaan Berhasil Terdaftar!');
    }

    public function detailPkjAdm($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('admin/dtl_pekerjaan', compact(['pekerjaan']));
    }

    public function updatePkjAdm(Request $req, $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan ->dosen_id = $req->input('dosen_id');
        $pekerjaan ->jenis_pekerjaan = $req->input('jenis_pekerjaan');
        $pekerjaan ->keterangan = $req->input('keterangan');
        $pekerjaan ->sks = $req->input('sks');
        $pekerjaan ->tahun_ajaran = $req->input('tahun_ajaran');
        $pekerjaan ->semester = $req->input('semester');
        $pekerjaan ->save();
        return redirect('admin/'.$pekerjaan->dosen_id.'/profiledsn')->with('status', 'Pekerjaan Berhasil Diubah!');
    }
    
    public function deletePkjAdm($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        Pekerjaan::destroy($id);
        return redirect()->back()->with('status', 'Pekerjaan Berhasil Dihapus!');
    }


    //KAPRODI
    public function listdsnKp()
    {
        $dosen = Dosen::all();
        return view('kaprodi/list_dosen', compact(['dosen']));
    }

    public function profiledsnKp($id)
    {
        $dosen = Dosen::find($id);
        $kelas = Kelas::all();
        $kelas2 = Kelas::all();
        $pekerjaan = Pekerjaan::all();

        $jmlPkj = Pekerjaan::where('verifikasi', 'Ya')->where('dosen_id', $dosen->id)->sum('sks');
        $jmlKls = DosenKelas::where('verifikasi', 'Ya')->where('dosen_id', $dosen->id)->sum('bkd_kelas');
        $jml = $jmlPkj + $jmlKls;

        $jmlPkj2 = Pekerjaan::where('verifikasi', '!=', 'Ya')->where('dosen_id', $dosen->id)->sum('sks');
        $jmlKls2 = DosenKelas::where('verifikasi', '!=', 'Ya')->where('dosen_id', $dosen->id)->sum('bkd_kelas');
        $jml2 = $jmlPkj2 + $jmlKls2;

        return view('kaprodi/profiledsn', compact(['dosen', 'kelas', 'kelas2', 'pekerjaan', 'jmlPkj', 'jmlKls', 'jml',
        'jmlPkj2', 'jmlKls2', 'jml2']));
    }

    public function profil()
    {
        $profil = auth()->user()->dosen;
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $pekerjaan = Pekerjaan::all();
        return view('kaprodi/profil', compact(['kelas', 'pekerjaan', 'dosen', 'profil']));
    }

    public function updateProfilKp(Request $req)
    {
        $dosen = auth()->user()->dosen;
        $dosen ->nama = $req->input('nama');
        $dosen ->alamat = $req->input('alamat');
        $dosen ->no_telp = $req->input('no_telp');
        $dosen ->save();
        return back()->with('status', 'Profil Berhasil Diubah!');
    }

    public function createKelasKp(Request $req, $id)
    {
        $dosen = Dosen::find($id);
        if($dosen->kelas()->where('kelas_id',$req->kelas)->exists()){
            return back()->with('error', 'Kelas Sudah Terdaftar!');
        }
        if($req->kelas_sifat == 'Team Teaching'){
            if($req->kelas_jmlmhs <= 40 ){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => (1.5 * $req->kelas_sks) / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => (($req->kelas_jmlmhs/40) * (1.5 * $req->kelas_sks)) / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Group Teaching'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Tatap Muka'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Praktikum'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => $req->kelas_sks / $req->kelas_jmldsn,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Kelas Lab'){
            if($req->kelas_jmlmhs <= 40){
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => 3.5,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }else{
                $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
                'bkd_kelas' => ($req->kelas_jmlmhs / 40) * 3.5,
                'verifikasi' => 'Belum']);                          
                return back()->with('status', 'Kelas Berhasil Terdaftar!');
            }
        }elseif($req->kelas_sifat == 'Asistensi'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => ($req->kelas_jmlmhs * 0.5),
            'verifikasi' => 'Belum']);                          
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }
    }

    public function deleteKelasKp($id, $idkelas)
    {
        $dosen = Dosen::find($id);
        $dosen->kelas()->detach($idkelas);
        return redirect()->back()->with('status', 'Pekerjaan Berhasil Dihapus!');
    }

    public function createPkjKp(Request $req)
    {
        $pekerjaan = new Pekerjaan;
        $pekerjaan ->dosen_id = $req->input('dosen_id');
        $pekerjaan ->jenis_pekerjaan = $req->input('jenis_pekerjaan');
        $pekerjaan ->keterangan = $req->input('keterangan');
        $pekerjaan ->sks = $req->input('sks');
        $pekerjaan ->tahun_ajaran = $req->input('tahun_ajaran');
        $pekerjaan ->semester = $req->input('semester');
        $pekerjaan ->verifikasi = 'Belum';
        $pekerjaan ->save();
        return back()->with('status', 'Pekerjaan Berhasil Terdaftar!');
    }

    public function detailPkjKp($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('kaprodi/dtl_pekerjaan', compact(['pekerjaan']));
    }

    public function updatePkjKp(Request $req, $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan ->dosen_id = $req->input('dosen_id');
        $pekerjaan ->jenis_pekerjaan = $req->input('jenis_pekerjaan');
        $pekerjaan ->keterangan = $req->input('keterangan');
        $pekerjaan ->sks = $req->input('sks');
        $pekerjaan ->tahun_ajaran = $req->input('tahun_ajaran');
        $pekerjaan ->semester = $req->input('semester');
        $pekerjaan ->save();
        return redirect('kaprodi/profil')->with('status', 'Pekerjaan Berhasil Diubah!');
    }
    
    public function deletePkjKp($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        Pekerjaan::destroy($id);
        return redirect()->back()->with('status', 'Pekerjaan Berhasil Dihapus!');
    }

    public function verifikasi($id)
    {
        $kelas = DosenKelas::find($id);
        return view('kaprodi/verifikasi_kls', compact(['kelas']));
    }
    
    public function updateVerifKls(Request $req, $id){
        $kelas = DosenKelas::find($id);
        $kelas ->verifikasi = $req->input('verifikasi');
        $kelas ->save();
        return redirect('kaprodi/'.$kelas->dosen_id.'/profiledsn')->with('status', 'Status Sudah Diverifikasi !');
    }

    public function verifikasiPkj($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('kaprodi/verifikasi_pkj', compact(['pekerjaan']));
    }

    public function updateVerifPkj(Request $req, $id){
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan ->verifikasi = $req->input('verifikasi');
        $pekerjaan ->save();
        return redirect('kaprodi/'.$pekerjaan->dosen->id.'/profiledsn')->with('status', 'Status Sudah Diverifikasi !');
    }
}
