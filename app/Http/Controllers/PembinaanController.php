<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pembina;
use App\Ekskul;
use App\Pembinaan;

class PembinaanController extends Controller
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
        $pembinaan = \DB::table('pembinaan')
            ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('pembina', 'pembinaan.pembina_id', '=', 'pembina.id_pembina')
            ->get();

        return view('ekskul.daftarpembinaan', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'pembinaan' => $pembinaan));
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
        $pembina = \App\Pembina::all();
        $ekskul = \App\Ekskul::all();

        if($jenis == 1){
            return view('ekskul.buatpembinaan', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul, 'pembina' => $pembina));
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
        $post = new Pembinaan;
        $post->ekskul_id = $request->ekskul_id;
        $post->pembina_id = $request->pembina_id;
        $post->user_id = $request->user_id;

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
        $pembinaan = Pembinaan::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $pembina = \App\Pembina::where('pembina.user_id', '=', $auth)->get();
        $ekskul = \App\Ekskul::where('ekskul.user_id', '=', $auth)->get();
        $selected_pembina = $pembinaan->pembina_id;
        $selected_ekskul = $pembinaan->ekskul_id;

        if($jenis == 1){
        return view('pengguna.editpembinaan', array('auth' => $auth, 'jenis' => $jenis, 'username' => $name, 'ekskul' => $ekskul, 'pembina' => $pembina, 'selected_pembina' => $selected_pembina, 'selected_ekskul' => $selected_ekskul, 'pembinaan' => $pembinaan));
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
        $data = $request->all();
        $post = PKMMahasiswa::find($id);
        $post->pembina_id = $request->pembina_id;
        $post->ekskul_id = $request->ekskul_id;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/pengguna/daftarpembina');
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
        $pembina = Pembinaan::find($id);
        $pembina->delete();

        return redirect('pkm');
    }
}
