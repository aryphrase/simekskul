<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Proposal;
use App\Ekskul;
use App\DataSekolah;
use PDF;

class ProposalController extends Controller
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

        if($jenis == 2){
            $proposal = \DB::table('proposal')
               ->join('ekskul', 'proposal.ekskul_id', '=', 'ekskul.id_ekskul')
               ->where('proposal.user_id', '=', $auth)
               ->orderBy('id_proposal', 'asc')
               ->get();

        return view('proker.daftarproposal', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'proposal' => $proposal));
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

        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        foreach($ekskul as $ekskul){
            $ekskulid = $ekskul->id_ekskul;
        }

        $ekskul2 = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        if($jenis == 2){
            return view('proker.buatproposal', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul2' => $ekskul2));
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
            'judul_proposal' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);
        $post = new Proposal;
        $post->judul_proposal = $request->judul_proposal;
        $post->ketua_ekskul = $request->ketua_ekskul;
        $post->ketua_pelaksana = $request->ketua_pelaksana;
        $post->pendahuluan = $request->pendahuluan;
        $post->nama_kegiatan = $request->nama_kegiatan;
        $post->dasar_kegiatan = $request->dasar_kegiatan;
        $post->tujuan_kegiatan = $request->tujuan_kegiatan;
        $post->pelaksanaan_kegiatan = $request->pelaksanaan_kegiatan;
        $post->penutup = $request->penutup;
        $post->sasaran = $request->sasaran;
        $post->susunan_panitia = $request->susunan_panitia;
        $post->susunan_acara = $request->susunan_acara;
        $post->pemasukan_kegiatan = $request->pemasukan_kegiatan;
        $post->pengeluaran_kegiatan =$request->susunan_panitia;
        $post->ekskul_id = $request->ekskul_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('added', 'Proposal sudah berhasil dibuat');
        return redirect('/proposal');
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
        $proposal = \App\Proposal::find($id);
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

 

        if($jenis == 2){
            return view('proker.editproposal', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul, 'proposal' => $proposal));
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
            'judul_proposal' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Proposal::find($id);
        $post->judul_proposal = $request->judul_proposal;
        $post->ketua_ekskul = $request->ketua_ekskul;
        $post->ketua_pelaksana = $request->ketua_pelaksana;
        $post->pendahuluan = $request->pendahuluan;
        $post->nama_kegiatan = $request->nama_kegiatan;
        $post->dasar_kegiatan = $request->dasar_kegiatan;
        $post->tujuan_kegiatan = $request->tujuan_kegiatan;
        $post->pelaksanaan_kegiatan = $request->pelaksanaan_kegiatan;
        $post->penutup = $request->penutup;
        $post->sasaran = $request->sasaran;
        $post->susunan_panitia = $request->susunan_panitia;
        $post->susunan_acara = $request->susunan_acara;
        $post->pemasukan_kegiatan = $request->pemasukan_kegiatan;
        $post->pengeluaran_kegiatan =$request->susunan_panitia;
        $post->ekskul_id = $request->ekskul_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('edited', 'Perubahan proposal telah disimpan');
        return redirect('/proposal');
    }

    public function cetakpdfsatuan($id)
    {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;

        $namaekskul = strtoupper($name);

        $proposal = \DB::table('proposal')
            ->join('ekskul', 'proposal.ekskul_id', '=', 'ekskul.id_ekskul')
            ->get();

        foreach($proposal as $proposal) {
            $namafile = $proposal->judul_proposal;
            $namafile = strtolower($namafile);
            $namafile = str_replace(' ', '-', $namafile);

            $judulcover = $proposal->judul_proposal;
            $judulcover = strtoupper($judulcover);
        }

        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        $sekolah = \DB::table('ref_datasekolah')
            ->where('ref_datasekolah.id_datasekolah', '=', 1)
            ->get();

        $proposal1 = \DB::table('proposal')
            ->join('ekskul', 'proposal.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('proposal.id_proposal', '=', $id)
            ->get();

        $tanggal = date('d-m-Y');

        $pdf = PDF::loadView('proker.pdfproposal', array('auth' => $name, 'name' => $name, 'jenis' => $jenis, 'ekskul' => $ekskul, 'tanggal' => $tanggal, 'sekolah' => $sekolah, 'proposal1' => $proposal1, 'namafile' => $namafile, 'judulcover' => $judulcover, 'namaekskul' => $namaekskul))->setPaper('a4');;
        return $pdf->stream($namafile.'.pdf');
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
    }
}
