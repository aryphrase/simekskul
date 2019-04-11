<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataSekolah;

class SekolahController extends Controller
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
        return redirect('/halamanutama');
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

        if ($jenis == 1) {
            return view('datasekolah.buatdatasekolah', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa));
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

        $post = new DataSekolah;
        $post->nama_kepsek = $request->nama_kepsek;
        $post->nama_wkkesiswaan = $request->nama_wkkesiswaan;
        $post->nama_ketuaosis = $request->nama_ketuaosis;
        $post->nama_kasie1 = $request->nama_kasie1;
        $post->nama_kasie2 = $request->nama_kasie2;
        $post->nama_kasie3 = $request->nama_kasie3;
        $post->nama_kasie4 = $request->nama_kasie4;
        $post->nama_kasie5 = $request->nama_kasie5;
        $post->nama_kasie6 = $request->nama_kasie6;
        $post->nama_kasie7 = $request->nama_kasie7;
        $post->nama_kasie8 = $request->nama_kasie8;
        $post->nama_kasie9 = $request->nama_kasie9;
        $post->nama_kasie10 = $request->nama_kasie10;

        $post->save();

        return redirect('/halamanutama');
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
        return redirect('/halamanutama');
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
        $sekolah = \App\DataSekolah::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        if($jenis == 1){
        return view('datasekolah.editdatasekolah', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'sekolah' => $sekolah));
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
        $post = DataSekolah::find($id);
        $post->nama_kepsek = $request->nama_kepsek;
        $post->nama_wkkesiswaan = $request->nama_wkkesiswaan;
        $post->nama_ketuaosis = $request->nama_ketuaosis;
        $post->nama_kasie1 = $request->nama_kasie1;
        $post->nama_kasie2 = $request->nama_kasie2;
        $post->nama_kasie3 = $request->nama_kasie3;
        $post->nama_kasie4 = $request->nama_kasie4;
        $post->nama_kasie5 = $request->nama_kasie5;
        $post->nama_kasie6 = $request->nama_kasie6;
        $post->nama_kasie7 = $request->nama_kasie7;
        $post->nama_kasie8 = $request->nama_kasie8;
        $post->nama_kasie9 = $request->nama_kasie9;
        $post->nama_kasie10 = $request->nama_kasie10;

        $post->save();

        return redirect('/halamanutama');
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
        return redirect('/halamanutama');
    }
}
