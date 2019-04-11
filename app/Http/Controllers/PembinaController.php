<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pembina;

class PembinaController extends Controller
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
        $pembina = \DB::table('pembina')
            ->join('users', 'pembina.user_id', '=', 'users.id')
            ->paginate(10);
        
        return view('user.daftarpembina', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'pembina' => $pembina, 'jenisapa' => $jenisapa));
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
        if ($jenis == 3) {
            return view('user.buatdatapembina', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa));
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
            'nama_pembina' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Pembina;
        $post->nama_pembina = $request->nama_pembina;
        $post->foto_pembina = $request->foto_pembina;
        $post->jeniskelamin_pembina = $request->jeniskelamin_pembina;
        $post->tempatlahir_pembina = $request->tempatlahir_pembina;
        $post->tanggallahir_pembina = $request->tanggallahir_pembina;
        $post->alamat_pembina = $request->alamat_pembina;
        $post->nomorhp_pembina = $request->nomorhp_pembina;
        $post->ig_pembina = $request->ig_pembina;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/pembina');
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

        $pembina = \DB::table('pembina')
            ->join('users', 'pembina.user_id', '=', 'users.id')
            ->join('ref_jenisuser', 'users.jenis_user_id', '=', 'ref_jenisuser.id_jenisuser')
            ->where('pembina.id_pembina', '=', $id)
            ->get();

        $pembinaan = \DB::table('pembinaan')
            ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('pembina', 'pembinaan.pembina_id', '=', 'pembina.id_pembina')
            ->where('pembinaan.pembina_id', '=', $id)
            ->get();

        return view('user.halamanpembina', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'pembina' => $pembina, 'jenisapa' => $jenisapa, 'pembinaan' => $pembinaan));
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
        $pembina = \App\Pembina::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        if($jenis == 1){
        return view('user.editdatapembina', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'pembina' => $pembina, 'jenisapa' => $jenisapa));
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
            'nama_pembina' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Pembina::find($id);
        $post->nama_pembina = $request->nama_pembina;
        $post->tempatlahir_pembina = $request->tempatlahir_pembina;
        $post->tanggallahir_pembina = $request->tanggallahir_pembina;
        $post->alamat_pembina = $request->alamat_pembina;
        $post->nomorhp_pembina = $request->nomorhp_pembina;
        $post->ig_pembina = $request->ig_pembina;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/pembina');
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
        $pembina = Pembina::find($id);
        $pembina->delete();

        return redirect('/pembina');
    }
}
