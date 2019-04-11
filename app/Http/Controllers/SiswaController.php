<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Siswa;
use App\Ekskul;
use App\Keanggotaan;
use App\Kelas;

class SiswaController extends Controller
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
        
        $siswa = \DB::table('siswa')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
            ->orderBy('nama_siswa')
            ->paginate(10);

        if ($jenis == 1) {
        return view('user.daftarsiswa', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'siswa' => $siswa));
        } else {
            return view('forbidden');
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
        $kelas = \App\Kelas::all();

        if ($jenis == 4) {
            return view('user.buatdatasiswa', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'kelas' => $kelas, 'jenisapa' => $jenisapa));
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
        $rules =  [
            'nama_siswa' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Siswa;
        $post->nama_siswa = $request->nama_siswa;
        $post->kelas_id = $request->kelas_id;
        $post->tempatlahir_siswa = $request->tempatlahir_siswa;
        $post->tanggallahir_siswa = $request->tanggallahir_siswa;
        $post->nama_ayah = $request->nama_ayah;
        $post->nama_ibu = $request->nama_ibu;
        $post->alamat_siswa = $request->alamat_siswa;
        $post->alamat_ayah = $request->alamat_ayah;
        $post->alamat_ibu = $request->alamat_ibu;
        $post->nomorhp_siswa = $request->nomorhp_siswa;
        $post->nomorhp_ayah = $request->nomorhp_ayah;
        $post->nomorhp_ibu = $request->nomorhp_ibu;
        $post->foto_siswa = $request->foto_siswa;
        $post->ig_siswa = $request->ig_siswa;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/siswa');
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
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        $siswa = \DB::table('siswa')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('ref_kelas', 'siswa.kelas_id', '=', 'ref_kelas.id_kelas')
            ->where('siswa.id_siswa', '=', $id)
            ->get();

        $keanggotaan = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'keanggotaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('keanggotaan.siswa_id', '=', $id)
            ->where('keanggotaan.statusanggota_id', '<>', 2)
            ->get();

        return view('user.halamansiswa', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'siswa' => $siswa, 'jenisapa' => $jenisapa, 'keanggotaan' => $keanggotaan));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $siswa = \App\Siswa::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $kelas = \App\Kelas::all();
        $selected_kelas = $siswa->kelas_id;

        if($jenis == 1){
        return view('user.editdatasiswa', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'siswa' => $siswa, 'jenisapa' => $jenisapa, 'kelas' => $kelas, 'selected_kelas' => $selected_kelas));
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
        $rules =  [
            'nama_siswa' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Siswa::find($id);
        $post->nama_siswa = $request->nama_siswa;
        $post->kelas_id = $request->kelas_id;
        $post->tempatlahir_siswa = $request->tempatlahir_siswa;
        $post->tanggallahir_siswa = $request->tanggallahir_siswa;
        $post->nama_ayah = $request->nama_ayah;
        $post->nama_ibu = $request->nama_ibu;
        $post->alamat_siswa = $request->alamat_siswa;
        $post->alamat_ayah = $request->alamat_ayah;
        $post->alamat_ibu = $request->alamat_ibu;
        $post->nomorhp_siswa = $request->nomorhp_siswa;
        $post->nomorhp_ayah = $request->nomorhp_ayah;
        $post->nomorhp_ibu = $request->nomorhp_ibu;
        $post->foto_siswa = $request->foto_siswa;
        $post->ig_siswa = $request->ig_siswa;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/siswa');
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
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('/siswa');
    }
}
