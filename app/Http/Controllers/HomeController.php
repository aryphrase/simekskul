<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Ekskul;
use App\Siswa;
use App\Proker;
use App\Pembina;
use App\laporan;
use App\Keanggotaan;
use App\Pemasukan;
use App\Pengeluaran;
use App\Rapat;
use App\Penilaian;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        
        if ($jenis == 1) {
            $jumlah_user = \App\User::count();
            $jumlah_ekskul = \App\Ekskul::count();
            $jumlah_pembina = \App\Pembina::count();
            $jumlah_siswa = \App\Siswa::count();

        // Chart Jenis Ekskul
            $ekskul1 = \DB::table('ekskul')
                ->join('ref_jenisekskul', 'ekskul.jenis_ekskul_id', '=', 'ref_jenisekskul.id_jenisekskul')
                ->selectRaw('count(nama_jenisekskul) as total, nama_jenisekskul')
                ->groupBy('nama_jenisekskul')
                ->get();
            $jenis_ekskul = array();
            foreach($ekskul1 as $ekskul1){
                $jenis_ekskul[$ekskul1->nama_jenisekskul]=(int)$ekskul1->total;
            }

        //Anggota
            $keanggotaan1 = \DB::table('keanggotaan')
                ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
                ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
                ->selectRaw('count(nama_kelas) as total, nama_kelas')
                ->groupBy('nama_kelas')
                ->get();
            $jumlah_anggota = array();
            foreach($keanggotaan1 as $keanggotaan1){
                $jumlah_anggota[$keanggotaan1->nama_kelas]=(int)$keanggotaan1->total;
            }

            return view('mainpage', array('auth' => $auth, 
                                          'jenis' => $jenis, 
                                          'name' => $name, 
                                          'jenisapa' => $jenisapa,
                                          'jumlah_user' => $jumlah_user,
                                          'jumlah_ekskul' => $jumlah_ekskul,
                                          'jumlah_pembina' => $jumlah_pembina, 
                                          'jumlah_siswa' => $jumlah_siswa,
                                          'jenis_ekskul' => $jenis_ekskul,
                                          'jumlah_anggota' => $jumlah_anggota, 
                                          ));

        } elseif($jenis == 2){

          $ekskul = \DB::table('ekskul')
              ->join('users', 'ekskul.user_id', '=', 'users.id')
              ->where('ekskul.user_id', '=', $auth)
              ->get();

            foreach($ekskul as $ekskul){
              $idekskul = $ekskul->id_ekskul;
            }

            // Menampilkan Jumlah Anggota
            $jumlah_anggota = \App\Keanggotaan::where('keanggotaan.ekskul_id', '=', $idekskul)->count();

            // Menampilkan Jumlah Rapat
            $jumlah_rapat = \App\Rapat::where('rapat.ekskul_id', '=', $idekskul)->count();

            // Menampilkan Persentase Proker Selesai
            $jumlah_proker = \App\Proker::where('proker.ekskul_id', '=', $idekskul)->count();
            $proker_selesai = \DB::table('proker')
                ->where('proker.ekskul_id', '=', $idekskul)
                ->where('proker.status_proker_id', '=', 2)
                ->count();

            // Menampilkan Persentase Serapan Anggaran
            $jumlah_pemasukan = \DB::table('pemasukan')
                ->where('pemasukan.ekskul_id', '=', $idekskul)
                ->sum('nominal_pemasukan');
            $jumlah_pengeluaran = \DB::table('pengeluaran')
                ->where('pengeluaran.ekskul_id', '=', $idekskul)
                ->sum('nominal_pengeluaran');
            if($jumlah_pengeluaran == 0){
              $dana_persen = 0;
            } else{
              $dana_persen = ($jumlah_pengeluaran / $jumlah_pemasukan) * 100;
            }

            // Chart Jenis Proker
            $proker1 = \DB::table('proker')
                ->join('ref_jenisproker', 'proker.jenis_proker_id', '=', 'ref_jenisproker.id_jenisproker')
                ->where('proker.ekskul_id', '=', $idekskul)
                ->selectRaw('count(nama_jenisproker) as total, nama_jenisproker')
                ->groupBy('nama_jenisproker')
                ->get();
            $jenis_proker = array();
            foreach($proker1 as $proker1){
                $jenis_proker[$proker1->nama_jenisproker]=(int)$proker1->total;
            }

            $ekskul1 = \DB::table('ekskul')
                ->join('users', 'ekskul.user_id', '=', 'users.id')
                ->where('ekskul.user_id', '=', $auth)
                ->get();

             return view('mainpage', array('auth' => $auth, 
                                           'jenis' => $jenis, 
                                           'name' => $name, 
                                           'jenisapa' => $jenisapa,
                                           'ekskul' => $ekskul,
                                           'ekskul1' => $ekskul1,
                                           'jumlah_anggota' => $jumlah_anggota,
                                           'jumlah_proker' => $jumlah_proker,
                                           'jenis_proker' => $jenis_proker,
                                           'jumlah_rapat' => $jumlah_rapat,
                                           'proker_selesai' => $proker_selesai,
                                           'dana_persen' => $dana_persen,
                                         ));

        } elseif($jenis == 3){
            $pembina = \DB::table('pembina')
                ->join('users', 'pembina.user_id', '=', 'users.id')
                ->where('pembina.user_id', '=', $auth)
                ->get();

            foreach($pembina as $pembina){
              $idpembina = $pembina->id_pembina;
            }

            $jumlah_ekskul = \DB::table('pembinaan')
                ->where('pembinaan.pembina_id', '=', $idpembina)
                ->count();

            $ekskul = \DB::table('pembinaan')
            ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('pembinaan.pembina_id', '=', $idpembina)
            ->get();

            foreach ($ekskul as $ekskul) {
                $idekskul = $ekskul->id_ekskul;
            }

            $siswa = \DB::table('keanggotaan')
                ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
                ->where('keanggotaan.ekskul_id', '=', $idekskul)
                ->count();

            $pembina1 = \DB::table('pembina')
                ->join('users', 'pembina.user_id', '=', 'users.id')
                ->where('pembina.user_id', '=', $auth)
                ->get();

            $ekskul1 = \DB::table('pembinaan')
                ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
                ->where('pembinaan.pembina_id', '=', $idpembina)
                ->get();

            $jumlah_pembina = \App\Pembina::count();
            $jumlah_siswa = \App\Siswa::count();

            return view('mainpage', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'pembina' => $pembina, 'pembina1' => $pembina1, 'ekskul' => $ekskul, 'ekskul1' => $ekskul1, 'siswa' => $siswa, 'jumlah_ekskul' => $jumlah_ekskul, 'jumlah_pembina' => $jumlah_pembina, 'jumlah_siswa' => $jumlah_siswa));

        } elseif($jenis == 4){
            $siswa = \DB::table('siswa')
                ->join('users', 'siswa.user_id', '=', 'users.id')
                ->where('siswa.user_id', '=', $auth)
                ->get();

            $jumlah_user = \App\User::count();
            $jumlah_ekskul = \App\Ekskul::count();
            $jumlah_pembina = \App\Pembina::count();
            $jumlah_siswa = \App\Siswa::count();

        // Chart Jenis Ekskul
            $ekskul1 = \DB::table('ekskul')
                ->join('ref_jenisekskul', 'ekskul.jenis_ekskul_id', '=', 'ref_jenisekskul.id_jenisekskul')
                ->selectRaw('count(nama_jenisekskul) as total, nama_jenisekskul')
                ->groupBy('nama_jenisekskul')
                ->get();
            $jenis_ekskul = array();
            foreach($ekskul1 as $ekskul1){
                $jenis_ekskul[$ekskul1->nama_jenisekskul]=(int)$ekskul1->total;
            }

        //Anggota
            $keanggotaan1 = \DB::table('keanggotaan')
                ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
                ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
                ->selectRaw('count(nama_kelas) as total, nama_kelas')
                ->groupBy('nama_kelas')
                ->get();
            $jumlah_anggota = array();
            foreach($keanggotaan1 as $keanggotaan1){
                $jumlah_anggota[$keanggotaan1->nama_kelas]=(int)$keanggotaan1->total;
            }

            return view('mainpage', array('auth' => $auth, 
                                          'jenis' => $jenis, 
                                          'name' => $name, 
                                          'jenisapa' => $jenisapa,
                                          'siswa' => $siswa,
                                          'jumlah_user' => $jumlah_user,
                                          'jumlah_ekskul' => $jumlah_ekskul,
                                          'jumlah_pembina' => $jumlah_pembina, 
                                          'jumlah_siswa' => $jumlah_siswa,
                                          'jenis_ekskul' => $jenis_ekskul,
                                          'jumlah_anggota' => $jumlah_anggota, 
                                          ));
        } 
    }
}
