<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Exports\ServisExport;
use App\Imports\ServisImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Dosen;
use App\Kelas;
use App\Pekerjaan;
use App\User;
use App\Matakuliah;

class DashboardController extends Controller
{
    public function home()
    {
		$role = auth()->user()->role;
        $id = auth()->user()->id;
		if($role == 'superadmin'){
			$presensi = Presensi::all();
			return view('index', compact(['presensi']));
		}elseif($role == 'admin'){
            $user = User::all()->where('role', 'dosen');
            $kelas = Kelas::with('dosen')->get();
            $pekerjaan = Pekerjaan::all();
            return view('admin/index', compact(['user', 'kelas', 'pekerjaan']));
		}elseif($role == 'kaprodi'){
            $user = User::all()->where('role', 'dosen');
            $kelas = Kelas::all();
            $pekerjaan = Pekerjaan::all();
            return view('kaprodi/index', compact(['user', 'kelas', 'pekerjaan']));
		}elseif($role == 'dosen'){
			$profil = auth()->user()->dosen;
			$dosen = Dosen::all();
            $kelas = Kelas::all();
            $pekerjaan = Pekerjaan::all();
            $matakuliah = Matakuliah::all();
			return view('dosen/index', compact(['kelas', 'pekerjaan', 'dosen', 'profil', 'matakuliah']));
		}elseif($role == 'inqa'){
            $dosen = Dosen::all();
            $dosen2 = Dosen::all();
            return view('inqa/index', compact(['dosen', 'dosen2']));
		}
    }

    
    //INQA

    public function profiledsnIn($id)
    {
        $dosen = Dosen::find($id);
        $kelas = Kelas::all();
        $pekerjaan = Pekerjaan::all();
        $matakuliah = Matakuliah::all();
        return view('inqa/profiledsn', compact(['dosen', 'kelas', 'pekerjaan', 'matakuliah']));
    }
    
    //DOSEN
    public function updateProfilDsn(Request $req)
    {
        $dosen = auth()->user()->dosen;
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
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => (($req->kelas_jmlmhs/40) * (1.5 * $req->kelas_sks)) / $req->kelas_jmldsn,]);                          
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }elseif($req->kelas_sifat == 'Group Teaching'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks / $req->kelas_jmldsn,]);
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }elseif($req->kelas_sifat == 'Asistensi'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => ($req->kelas_jmlmhs * 0.5),]);                          
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

    public function listdsnAdm()
    {
        $dosen = Dosen::all();
        return view('admin/list_dosen', compact(['dosen']));
    }

    public function profiledsnAdm($id)
    {
        $dosen = Dosen::find($id);
        $kelas = Kelas::all();
        $pekerjaan = Pekerjaan::all();
        $matakuliah = Matakuliah::all();
        return view('admin/profiledsn', compact(['dosen', 'kelas', 'pekerjaan', 'matakuliah']));
    }

    public function createKelasAdm(Request $req, $id)
    {
        $dosen = Dosen::find($id);
        $kelas = Kelas::all();
        if($dosen->kelas()->where('kelas_id',$req->kelas)->exists()){
            return back()->with('error', 'Kelas Sudah Terdaftar!');
        }
        if($req->kelas_sifat == 'Team Teaching'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => (($req->kelas_jmlmhs/40) * (1.5 * $req->kelas_sks)) / $req->kelas_jmldsn,]);                          
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }elseif($req->kelas_sifat == 'Group Teaching'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => ($req->kelas_jmlmhs / 40) * $req->kelas_sks / $req->kelas_jmldsn,]);
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }elseif($req->kelas_sifat == 'Asistensi'){
            $dosen->kelas()->attach($req->kelas, ['bkd_inqa' => $req->kelas_sks / $req->kelas_jmldsn, 
            'bkd_kelas' => ($req->kelas_jmlmhs * 0.5),]);                          
            return back()->with('status', 'Kelas Berhasil Terdaftar!');
        }
    }

    public function deleteKelasAdm($id, $idkelas)
    {
        $dosen = auth()->user()->dosen;
        $dosen->kelas()->detach($idkelas);
        return back()->with('status', 'Kelas Berhasil Dihapus!');
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
        $pekerjaan ->save();
        return back()->with('status', 'Pekerjaan Berhasil Terdaftar!');
    }

    public function detailPkjAdm($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('dosen/detail_pkj', compact(['pekerjaan']));
    }

    public function updatePkjAdm(Request $req, $id)
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
        $pekerjaan = Pekerjaan::all();
        $matakuliah = Matakuliah::all();
        return view('kaprodi/profiledsn', compact(['dosen', 'kelas', 'pekerjaan', 'matakuliah']));
    }
}
