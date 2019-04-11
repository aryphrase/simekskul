<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Siswa;
use App\Ekskul;
use App\Pembina;
use App\Keanggotaan;
use App\Pembinaan;
use App\Semester;
use App\Penilaian;

class PenilaianController extends Controller
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

        if($jenis == 3){

        $pembina = \DB::table('pembina')
            ->join('users', 'pembina.user_id', '=', 'users.id')
            ->where('pembina.user_id', '=', $auth)
            ->get();

        foreach($pembina as $pembina){
            $idpembina = $pembina->id_pembina; 
        }

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
            ->orderBy('nama_siswa')
            ->get();

        $penilaian = \DB::table('penilaian')
            ->join('siswa', 'penilaian.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'penilaian.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('pembina', 'penilaian.pembina_id', '=', 'pembina.id_pembina')
            ->join('ref_nilai', 'penilaian.nilai_id', '=', 'ref_nilai.id_nilai')
            ->join('ref_semester', 'penilaian.semester_id', '=', 'ref_semester.id_semester')
            ->where('penilaian.user_id', '=', $auth)
            ->get();

        $pembina1 = \DB::table('pembina')
            ->join('users', 'pembina.user_id', '=', 'users.id')
            ->where('pembina.user_id', '=', $auth)
            ->get();

        $ekskul1 = \DB::table('pembinaan')
            ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('pembinaan.pembina_id', '=', $idpembina)
            ->get();

            return view('penilaian.daftarnilai', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'penilaian' => $penilaian,
                'siswa' => $siswa,
                'idekskul' => $idekskul,
            ));
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

        $penilaian = \DB::table('penilaian')
            ->join('siswa', 'penilaian.siswa_id', '=', 'siswa.id_siswa')
            ->join('ekskul', 'penilaian.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('pembina', 'penilaian.pembina_id', '=', 'pembina.id_pembina')
            ->join('ref_semester', 'penilaian.semester_id', '=', 'ref_semester.id_semester')
            ->join('ref_nilai', 'penilaian.nilai_id', '=', 'ref_nilai.id_nilai')
            ->orderBy('nama_siswa')
            ->get();

        if($jenis == 3){
        return view('penilaian.buatnilai', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'siswa' => $siswa, 'tanggal' => $tanggal, 'pembina1' => $pembina1, 'idekskul' => $idekskul, 'semester' => $semester, 'nilai' => $nilai));
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
        $post = new Penilaian;
        $post->siswa_id = $request->siswa_id;
        $post->ekskul_id = $request->ekskul_id;
        $post->semester_id = $request->semester_id;
        $post->nilai_id = $request->nilai_id;
        $post->user_id = $request->user_id;
        $post->tanggal_nilai = $request->tanggal_nilai;
        $post->pembina_id = $request->pembina_id;

        $post->save();

        return redirect('/penilaian');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $penilaian = \App\Penilaian::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        $nilai = \App\Nilai::all();
        $selected_nilai = $penilaian->nilai_id;

        if($jenis == 3){
        return view('penilaian.editnilai', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'penilaian' => $penilaian, 'nilai' => $nilai, 'selected_nilai' => $selected_nilai));
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
            'nilai_id' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Penilaian::find($id);
        $post->nilai_id = $request->nilai_id;

        $post->save();

        return redirect('/penilaian');
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
        $penilaian = Penilaian::find($id);
        $penilaian->delete();

        return redirect('/penilaian');
    }
}
