<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rapat;
use App\JenisRapat;
use Carbon\Carbon;
use PDF;

class RapatController extends Controller
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
        if ($jenis == 1) {
            $rapat = \DB::table('rapat')
               ->join('ref_jenisrapat', 'rapat.jenis_rapat_id', '=', 'ref_jenisrapat.id_jenisrapat')
               ->join('ekskul', 'rapat.ekskul_id', '=', 'ekskul.id_ekskul')
               ->paginate(10);
        } elseif ($jenis == 2)  {
            $rapat = \DB::table('rapat')
               ->join('ref_jenisrapat', 'rapat.jenis_rapat_id', '=', 'ref_jenisrapat.id_jenisrapat')
               ->join('ekskul', 'rapat.ekskul_id', '=', 'ekskul.id_ekskul')
               ->where('rapat.user_id', '=', $auth)
               ->paginate(10);
        } elseif($jenis == 3){
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
                $rapat = \DB::table('rapat')
               ->join('ref_jenisrapat', 'rapat.jenis_rapat_id', '=', 'ref_jenisrapat.id_jenisrapat')
               ->join('ekskul', 'rapat.ekskul_id', '=', 'ekskul.id_ekskul')
               ->where('rapat.ekskul_id', '=', $pembinaan->id_ekskul)
               ->paginate(10);
            }
        }
        
        if (($jenis == 1) || ($jenis == 2) || ($jenis == 3)) {
            return view('rapat.daftarrapat', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'rapat' => $rapat));
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
        $jenis_rapat = \App\JenisRapat::all();
        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        if($jenis == 2){
        return view('rapat.buatnotulen', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'jenis_rapat' => $jenis_rapat, 'ekskul' => $ekskul));
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
            'nama_rapat' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Rapat;
        $post->nama_rapat = $request->nama_rapat;
        $post->peserta_rapat = $request->peserta_rapat;
        $post->tempat_rapat = $request->tempat_rapat;
        $post->tanggal_rapat = $request->tanggal_rapat;
        $post->waktumulai_rapat = $request->waktumulai_rapat;
        $post->waktuselesai_rapat = $request->waktuselesai_rapat;
        $post->agenda_rapat = $request->agenda_rapat;
        $post->hasil_rapat = $request->hasil_rapat;
        $post->jenis_rapat_id = $request->jenis_rapat_id;
        $post->user_id = $request->user_id;
        $post->ekskul_id = $request->ekskul_id;

        $post->save();

        session()->flash('added', 'Data notulensi rapat telah ditambahkan');
        return redirect('/rapat');
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

       $rapat = \DB::table('rapat')
        ->join('ekskul', 'rapat.ekskul_id', '=', 'ekskul.id_ekskul')
        ->join('ref_jenisrapat', 'rapat.jenis_rapat_id', '=', 'ref_jenisrapat.id_jenisrapat')
        ->where('rapat.id_rapat', '=', $id)
        ->get();

        return view('rapat.halamanrapat', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'rapat' => $rapat, 'jenisapa' => $jenisapa));
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
        $rapat = \App\Rapat::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $jenis_rapat = \App\JenisRapat::all();
        $selected_jenis_rapat = $rapat->jenis_rapat_id;

        if($jenis == 2){
        return view('rapat.editnotulen', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'jenis_rapat' => $jenis_rapat, 'selected_jenis_rapat' => $selected_jenis_rapat, 'rapat' => $rapat));
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
            'nama_rapat' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Rapat::find($id);
        $post->nama_rapat = $request->nama_rapat;
        $post->peserta_rapat = $request->peserta_rapat;
        $post->tempat_rapat = $request->tempat_rapat;
        $post->tanggal_rapat = $request->tanggal_rapat;
        $post->waktumulai_rapat = $request->waktumulai_rapat;
        $post->waktuselesai_rapat = $request->waktuselesai_rapat;
        $post->agenda_rapat = $request->agenda_rapat;
        $post->hasil_rapat = $request->hasil_rapat;
        $post->jenis_rapat_id = $request->jenis_rapat_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('edited', 'Perubahan data notulensi rapat telah disimpan');
        return redirect('/rapat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function cetakpdfsatuan($id) {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

       $rapat = \DB::table('rapat')
            ->join('ekskul', 'rapat.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('ref_jenisrapat', 'rapat.jenis_rapat_id', '=', 'ref_jenisrapat.id_jenisrapat')
            ->where('rapat.id_rapat', '=', $id)
            ->get();

        foreach($rapat as $rapat) {
            $namafile = $rapat->nama_rapat;
            $namafile = strtolower($namafile);
            $namafile = str_replace(' ', '-', $namafile);
        }

        $rapat1 = \DB::table('rapat')
            ->join('ekskul', 'rapat.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('ref_jenisrapat', 'rapat.jenis_rapat_id', '=', 'ref_jenisrapat.id_jenisrapat')
            ->where('rapat.id_rapat', '=', $id)
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

        $pdf = PDF::loadView('rapat.pdfrapatsatuan', array('auth' => $name, 'name' => $name, 'jenis' => $jenis, 'ekskul' => $ekskul, 'pembina' => $pembina, 'ketua' => $ketua, 'tanggal' => $tanggal, 'rapat1' => $rapat1, 'namafile' => $namafile))->setPaper('a4');
        return $pdf->stream('notulen-'.$namafile.'.pdf');
    }

    public function destroy($id)
    {
        //
        $rapat = Rapat::find($id);
        $rapat->delete();

        return redirect('/rapat');
    }
}
