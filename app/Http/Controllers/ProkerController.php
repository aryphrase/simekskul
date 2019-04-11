<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Proker;
use App\Ekskul;
use App\Pembina;
use App\Pembinaan;
use App\Keanggotaan;
use App\JenisProker;
use App\FrekuensiProker;
use App\StatusProker;
use Carbon\Carbon;
use PDF;
use Alert;

class ProkerController extends Controller
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

        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        if ($jenis == 1) {
            $proker = \DB::table('proker')
               ->join('ref_jenisproker', 'proker.jenis_proker_id', '=', 'ref_jenisproker.id_jenisproker')
               ->join('ref_frekuensiproker', 'proker.frekuensi_proker_id', '=', 'ref_frekuensiproker.id_frekuensiproker')
               ->join('ekskul', 'proker.ekskul_id', '=', 'ekskul.id_ekskul')
               ->paginate(10);
        } elseif ($jenis == 2){
            $proker = \DB::table('proker')
               ->join('ref_jenisproker', 'proker.jenis_proker_id', '=', 'ref_jenisproker.id_jenisproker')
               ->join('ref_frekuensiproker', 'proker.frekuensi_proker_id', '=', 'ref_frekuensiproker.id_frekuensiproker')
               ->join('ekskul', 'proker.ekskul_id', '=', 'ekskul.id_ekskul')
               ->where('proker.user_id', '=', $auth)
               ->orderBy('waktu_proker', 'asc')
               ->paginate(10);

        } elseif ($jenis == 3){
            $pembina = \DB::table('pembina')
                ->join('users', 'pembina.user_id', '=', 'users.id')
                ->where('pembina.user_id', '=', $auth)
                ->get();

            foreach($pembina as $pembina){
            $pembinaan = \DB::table('pembinaan')
                ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
                ->where('pembinaan.pembina_id', '=', $pembina->id_pembina)
                ->get();
            }

            foreach($pembinaan as $pembinaan){
            $proker = \DB::table('proker')
               ->join('ref_jenisproker', 'proker.jenis_proker_id', '=', 'ref_jenisproker.id_jenisproker')
               ->join('ref_frekuensiproker', 'proker.frekuensi_proker_id', '=', 'ref_frekuensiproker.id_frekuensiproker')
               ->where('proker.ekskul_id', '=', $pembinaan->id_ekskul)
               ->orderBy('waktu_proker', 'asc')
               ->paginate(10);
            }
        }
        
        if (($jenis == 1) || ($jenis == 2)){
            return view('proker.daftarproker', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'proker' => $proker));
        } if($jenis == 3){
            return view('proker.daftarproker', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'proker' => $proker, 'pembina' => $pembina, 'pembinaan' => $pembinaan));
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

        if($jenis == 2){
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $jenis_proker = \App\JenisProker::all();
        $frek_proker = \App\FrekuensiProker::all();
        }

        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        if($jenis == 2){
        return view('proker.buatproker', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'jenis_proker' => $jenis_proker, 'frek_proker' => $frek_proker, 'ekskul' => $ekskul));
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
            'nama_proker' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Proker;
        $post->nama_proker = $request->nama_proker;
        $post->deskripsi_proker = $request->deskripsi_proker;
        $post->waktu_proker = $request->waktu_proker;
        $post->tempat_proker = $request->tempat_proker;
        $post->target_proker = $request->target_proker;
        $post->anggaran_proker = $request->anggaran_proker;
        $post->jenis_proker_id = $request->jenis_proker_id;
        $post->frekuensi_proker_id = $request->frekuensi_proker_id;
        $post->status_proker_id = $request->status_proker_id;
        $post->user_id = $request->user_id;
        $post->ekskul_id = $request->ekskul_id;

        $post->save();

        session()->flash('added', 'Program kerja telah ditambahkan');
        return redirect('/proker');
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

       $proker = \DB::table('proker')
        ->join('ekskul', 'proker.ekskul_id', '=', 'ekskul.id_ekskul')
        ->join('ref_jenisproker', 'proker.jenis_proker_id', '=', 'ref_jenisproker.id_jenisproker')
        ->join('ref_frekuensiproker', 'proker.frekuensi_proker_id', '=', 'ref_frekuensiproker.id_frekuensiproker')
        ->join('ref_statusproker', 'proker.status_proker_id', '=', 'ref_statusproker.id_statusproker')
        ->where('proker.id_proker', '=', $id)
        ->get();

        return view('proker.halamanproker', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'proker' => $proker, 'jenisapa' => $jenisapa));
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
        $proker = \App\Proker::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $jenis_proker = \App\JenisProker::all();
        $frek_proker = \App\FrekuensiProker::all();

        $selected_jenis_proker = $proker->jenis_proker_id;
        $selected_frek_proker = $proker->frekuensi_proker_id;

        if($jenis == 2){
        return view('proker.editproker', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'jenis_proker' => $jenis_proker, 'frek_proker' => $frek_proker, 'selected_jenis_proker' => $selected_jenis_proker, 'selected_frek_proker' => $selected_frek_proker, 'proker' => $proker));
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
            'nama_proker' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Proker::find($id);
        $post->nama_proker = $request->nama_proker;
        $post->deskripsi_proker = $request->deskripsi_proker;
        $post->waktu_proker = $request->waktu_proker;
        $post->tempat_proker = $request->tempat_proker;
        $post->target_proker = $request->target_proker;
        $post->anggaran_proker = $request->anggaran_proker;
        $post->jenis_proker_id = $request->jenis_proker_id;
        $post->frekuensi_proker_id = $request->frekuensi_proker_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('edited', 'Perubahan program kerja telah disimpan');
        return redirect('/proker');
    }

    public function cetakpdf()
    {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;

        $proker = \DB::table('proker')
        ->join('ekskul', 'proker.ekskul_id', '=', 'ekskul.id_ekskul')
        ->join('ref_jenisproker', 'proker.jenis_proker_id', '=', 'ref_jenisproker.id_jenisproker')
        ->join('ref_frekuensiproker', 'proker.frekuensi_proker_id', '=', 'ref_frekuensiproker.id_frekuensiproker')
        ->join('ref_statusproker', 'proker.status_proker_id', '=', 'ref_statusproker.id_statusproker')
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

        $pdf = PDF::loadView('proker.pdfproker', array('auth' => $name, 'name' => $name, 'jenis' => $jenis, 'ekskul' => $ekskul, 'pembina' => $pembina, 'ketua' => $ketua, 'tanggal' => $tanggal, 'proker' => $proker))->setPaper('a4');;
        return $pdf->stream('daftarproker.pdf');
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
        $proker = Proker::find($id);
        $proker->delete();

        return redirect('/proker');
    }
}
