<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Laporan;
use App\Ekskul;
use App\DataSekolah;
use PDF;

class laporanController extends Controller
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
            $laporan = \DB::table('laporan')
               ->join('ekskul', 'laporan.ekskul_id', '=', 'ekskul.id_ekskul')
               ->where('laporan.user_id', '=', $auth)
               ->orderBy('id_laporan', 'asc')
               ->get();
        }

        if($jenis == 2){
            return view('proker.daftarlaporankegiatan', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'laporan' => $laporan));
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

        if($jenis == 2){
            return view('proker.buatlaporankegiatan', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul));
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
            'judul_laporan' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Laporan;
        $post->judul_laporan = $request->judul_laporan;
        $post->ketua_ekskul = $request->ketua_ekskul;
        $post->ketua_pelaksana = $request->ketua_pelaksana;
        $post->pendahuluan = $request->pendahuluan;
        $post->tempat_kegiatan = $request->tempat_kegiatan;
        $post->waktu_kegiatan = $request->waktu_kegiatan;
        $post->hasil_yangdicapai = $request->hasil_yangdicapai;
        $post->hambatan_kegiatan = $request->hambatan_kegiatan;
        $post->pemecahan_masalah = $request->pemecahan_masalah;
        $post->penutup = $request->penutup;
        $post->sasaran = $request->sasaran;
        $post->susunan_panitia = $request->susunan_panitia;
        $post->susunan_acara = $request->susunan_acara;
        $post->pemasukan_kegiatan = $request->pemasukan_kegiatan;
        $post->pengeluaran_kegiatan = $request->pengeluaran_kegiatan;
        $post->ekskul_id = $request->ekskul_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('added', 'Laporan sudah berhasil dibuat');
        return redirect('/laporan');
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
        $laporan = \App\laporan::find($id);
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
            return view('proker.editlaporankegiatan', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul, 'laporan' => $laporan));
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
            'judul_laporan' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = laporan::find($id);
        $post->judul_laporan = $request->judul_laporan;
        $post->ketua_ekskul = $request->ketua_ekskul;
        $post->ketua_pelaksana = $request->ketua_pelaksana;
        $post->pendahuluan = $request->pendahuluan;
        $post->tempat_kegiatan = $request->tempat_kegiatan;
        $post->waktu_kegiatan = $request->waktu_kegiatan;
        $post->hasil_yangdicapai = $request->hasil_yangdicapai;
        $post->hambatan_kegiatan = $request->hambatan_kegiatan;
        $post->pemecahan_masalah = $request->pemecahan_masalah;
        $post->penutup = $request->penutup;
        $post->sasaran = $request->sasaran;
        $post->susunan_panitia = $request->susunan_panitia;
        $post->susunan_acara = $request->susunan_acara;
        $post->pemasukan_kegiatan = $request->pemasukan_kegiatan;
        $post->pengeluaran_kegiatan = $request->pengeluaran_kegiatan;
        $post->ekskul_id = $request->ekskul_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('edited', 'Perubahan laporan telah disimpan');
        return redirect('/laporan');
    }

    public function cetakpdfsatuan($id)
    {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;

        $namaekskul = strtoupper($name);

        $laporan = \DB::table('laporan')
            ->join('ekskul', 'laporan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->get();

        foreach($laporan as $laporan) {
            $namafile = $laporan->judul_laporan;
            $namafile = strtolower($namafile);
            $namafile = str_replace(' ', '-', $namafile);

            $judulcover = $laporan->judul_laporan;
            $judulcover = strtoupper($judulcover);
        }

        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->where('ekskul.user_id', '=', $auth)
            ->get();

        $sekolah = \DB::table('ref_datasekolah')
            ->where('ref_datasekolah.id_datasekolah', '=', 1)
            ->get();

        $laporan1 = \DB::table('laporan')
            ->join('ekskul', 'laporan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->where('laporan.id_laporan', '=', $id)
            ->get();

        $tanggal = date('d-m-Y');

        $pdf = PDF::loadView('proker.pdflaporan', array('auth' => $name, 'name' => $name, 'jenis' => $jenis, 'ekskul' => $ekskul, 'tanggal' => $tanggal, 'sekolah' => $sekolah, 'laporan1' => $laporan1, 'namafile' => $namafile, 'judulcover' => $judulcover, 'namaekskul' => $namaekskul))->setPaper('a4');;
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