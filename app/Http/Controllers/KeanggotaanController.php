<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Siswa;
use App\Ekskul;
use App\Keanggotaan;
use App\Pembinaan;
use App\StatusAnggota;
use App\User;
use Carbon\Carbon;
use PDF;

class KeanggotaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        if($jenis == 1){
        $keanggotaan = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
            ->join('ref_statusanggota', 'keanggotaan.statusanggota_id', '=', 'ref_statusanggota.id_statusanggota')
            ->get();
        } elseif($jenis == 2){
            $ekskul = \DB::table('ekskul')
                ->where('ekskul.user_id', '=', $auth)
                ->get();

            foreach($ekskul as $ekskul){
            $keanggotaan = \DB::table('keanggotaan')
                ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
                ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
                ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
                ->join('ref_statusanggota', 'keanggotaan.statusanggota_id', '=', 'ref_statusanggota.id_statusanggota')
                ->where('keanggotaan.ekskul_id', '=', $ekskul->id_ekskul)
                ->get();
            }
        } elseif($jenis == 3){
            $pembina = \DB::table('pembina')
                ->where('pembina.user_id', '=', $auth)
                ->get();

            foreach($pembina as $pembina){
            $pembinaan = \DB::table('pembinaan')
                ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
                ->where('pembinaan.pembina_id', '=', $pembina->id_pembina)
                ->get();
            }

            foreach($pembinaan as $pembinaan){
            $keanggotaan = \DB::table('keanggotaan')
                ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
                ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
                ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
                ->join('ref_statusanggota', 'keanggotaan.statusanggota_id', '=', 'ref_statusanggota.id_statusanggota')
                ->where('keanggotaan.ekskul_id', '=', $pembinaan->id_ekskul)
                ->where('keanggotaan.statusanggota_id', '=', 1)
                ->get();
            }
        } elseif($jenis == 4){
            $keanggotaan = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
            ->join('ref_statusanggota', 'keanggotaan.statusanggota_id', '=', 'ref_statusanggota.id_statusanggota')
            ->where('keanggotaan.statusanggota_id', '=', 1)
            ->get();
        }

        if($jenis == 1){
            return view('keanggotaan.daftaranggota', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'keanggotaan' => $keanggotaan)); 
        }elseif ($jenis == 2){
            return view('keanggotaan.daftaranggota', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'keanggotaan' => $keanggotaan, 'ekskul' => $ekskul)); 
        }elseif($jenis == 3){
            return view('keanggotaan.daftaranggota', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'keanggotaan' => $keanggotaan, 'pembina' => $pembina, 'pembinaan' => $pembinaan)); 
        }elseif($jenis == 4) {
            return view('keanggotaan.daftaranggota', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'keanggotaan' => $keanggotaan));
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        if($jenis == 4){
            $siswa = \DB::table('siswa')
             ->where('siswa.user_id', '=', $auth)
             ->get();
            $ekskul = \App\Ekskul::all();
        }

        if($jenis == 4){
        return view('keanggotaan.pendaftaran', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'ekskul' => $ekskul, 'siswa' => $siswa));
        } else {
            return view('forbidden');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $data = $request->all();
        $post = new Keanggotaan ;
        $post->siswa_id = $request->siswa_id;
        $post->ekskul_id = $request->ekskul_id;
        $post->statusanggota_id = $request->statusanggota_id;
        $post->jabatan = $request->jabatan;
        $post->alasan_bergabung = $request->alasan_bergabung;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/keanggotaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function carianggota(Request $request){
        //
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $ekskul = \DB::table('ekskul')
                ->where('ekskul.user_id', '=', $auth)
                ->get();

        $cari=$request->get('search');

        foreach($ekskul as $ekskul){
        $keanggotaan = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
            ->join('ref_statusanggota', 'keanggotaan.statusanggota_id', '=', 'ref_statusanggota.id_statusanggota')
            ->where('keanggotaan.ekskul_id', '=', $ekskul->id_ekskul)
            ->where('nama_siswa','LIKE','%'.$cari.'%')
            ->get();
        }
        return view('keanggotaan.daftaranggota', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'keanggotaan' => $keanggotaan));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editKeanggotaan($id)
    {
        //
        $keanggotaan = \App\Keanggotaan::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $siswa = \DB::table('siswa')
            ->join('keanggotaan', 'siswa.id_siswa', '=', 'keanggotaan.siswa_id')
            ->where('keanggotaan.id_keanggotaan', '=', $id)
            ->get();
        $ekskul = \DB::table('ekskul')
            ->join('keanggotaan', 'ekskul.id_ekskul', '=', 'keanggotaan.ekskul_id')
            ->where('keanggotaan.id_keanggotaan', '=', $id)
            ->get();
        $statusanggota = \App\StatusAnggota::all();
        $selected_statusanggota = $keanggotaan->statusanggota_id;

        if($jenis == 2){
        return view('keanggotaan.editanggota', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'keanggotaan' => $keanggotaan, 'statusanggota' => $statusanggota, 'selected_statusanggota' => $selected_statusanggota, 'siswa' => $siswa, 'ekskul' => $ekskul));
        } else {
            return view('forbidden');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Keanggotaan::find($id);
        $post->statusanggota_id = $request->statusanggota_id;
        $post->jabatan = $request->jabatan;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/keanggotaan');
    }

    public function buktipendaftaran() {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        if($jenis == 4){
        $pendaftaran = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('keanggotaan.statusanggota_id', '=', 2)
            ->where('keanggotaan.user_id', '=', $auth)
            ->get();

        return view('keanggotaan.buktipendaftaran', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'pendaftaran' => $pendaftaran));

        } else {
            return view('forbidden');
        }
    }

    public function cetakbuktipendaftaran($id) {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        $pendaftaran = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('keanggotaan.statusanggota_id', '=', 2)
            ->where('keanggotaan.user_id', '=', $auth)
            ->where('keanggotaan.id_keanggotaan', '=', $id)
            ->get();

        foreach($pendaftaran as $pendaftaran) {
            $namasiswa = $pendaftaran->nama_siswa;
            $namasiswa = strtolower($namasiswa);
            $namasiswa = str_replace(' ', '-', $namasiswa);

            $namaekskul = $pendaftaran->nama_ekskul;
            $namaekskul = strtolower($namaekskul);
            $namaekskul = str_replace(' ', '-', $namaekskul);
        }

        $pendaftaran1 = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ref_kelas', 'siswa.kelas_id', '=','ref_kelas.id_kelas')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('keanggotaan.statusanggota_id', '=', 2)
            ->where('keanggotaan.user_id', '=', $auth)
            ->where('keanggotaan.id_keanggotaan', '=', $id)
            ->get();

        $tanggal = date('d-m-Y');

        $pdf = PDF::loadView('keanggotaan.pdfbuktipendaftaran', array('auth' => $name, 'name' => $name, 'jenis' => $jenis, 'tanggal' => $tanggal, 'pendaftaran1' => $pendaftaran1, 'namasiswa' => $namasiswa, 'namaekskul' => $namaekskul,))->setPaper('a4');
        return $pdf->stream('bukti-pendaftaran-'.$namaekskul.'-'.$namasiswa.'.pdf');
    }

    public function cetakpendaftar(){
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        foreach ($ekskul as $ekskul) {
           $idekskul = $ekskul->id_ekskul;
        }

        $pembina = \DB::table('pembinaan') 
            ->join('pembina', 'pembinaan.pembina_id', '=', 'pembina.id_pembina')
            ->where('pembinaan.ekskul_id', '=', $idekskul)
            ->get();

        $ketua = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->where('keanggotaan.jabatan', '=', 'Ketua')
            ->get();

        $tanggal = date('d-m-Y');

        $pendaftaran = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ref_kelas', 'siswa.kelas_id', '=','ref_kelas.id_kelas')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('keanggotaan.statusanggota_id', '=', 2)
            ->get();

        $pdf = PDF::loadView('pendaftaran.pdfpendaftar', array('auth' => $name, 'name' => $name, 'jenis' => $jenis, 'ekskul' => $ekskul, 'pembina' => $pembina, 'ketua' => $ketua, 'tanggal' => $tanggal, 'pendaftaran' => $pendaftaran))->setPaper('a4');;
        return $pdf->stream('daftar-pendaftar-'.$name.'.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        $keanggotaan = Keanggotaan::find($id);
        $keanggotaan->delete();

        return redirect('/keanggotaan');
    }
}
