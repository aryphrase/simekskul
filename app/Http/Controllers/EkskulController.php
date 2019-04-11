<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ekskul;
use App\JenisEkskul;
use App\Pembina;
use App\Pembinaan;

class EkskulController extends Controller
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
            $ekskul = \DB::table('ekskul')
               ->join('ref_jenisekskul', 'ekskul.jenis_ekskul_id', '=', 'ref_jenisekskul.id_jenisekskul')
               ->paginate(10);
        } elseif ($jenis == 2) {
            $ekskul = \DB::table('ekskul')
               ->join('ref_jenisekskul', 'ekskul.jenis_ekskul_id', '=', 'ref_jenisekskul.id_jenisekskul')
               ->where('ekskul.user_id', '=', $auth)
               ->get();
        } elseif ($jenis == 3) {
            $pembina = \DB::table('pembina')
                ->where('pembina.user_id', '=', $auth)
                ->get();

            foreach($pembina as $pembina) {
            $pembinaan = \DB::table('pembinaan')
                ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
                ->where('pembinaan.pembina_id', '=', $pembina->id_pembina)
                ->get();
            }

            foreach($pembinaan as $pembinaan) {
            $ekskul = \DB::table('ekskul')
               ->join('ref_jenisekskul', 'ekskul.jenis_ekskul_id', '=', 'ref_jenisekskul.id_jenisekskul')
               ->where('ekskul.id_ekskul', '=', $pembinaan->id_ekskul)
               ->get();
            }

        } elseif ($jenis == 4) {
            $ekskul = \DB::table('ekskul')
               ->join('ref_jenisekskul', 'ekskul.jenis_ekskul_id', '=', 'ref_jenisekskul.id_jenisekskul')
               ->paginate(10);
        }

        if ($jenis == 1) {
            return view('ekskul.daftarekstrakurikuler', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul));
        } elseif ($jenis == 2) {
            return view('ekskul.daftarekstrakurikuler', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul));
        } elseif ($jenis == 3) {
            return view('ekskul.daftarekstrakurikuler', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'pembina' => $pembina, 'pembinaan' => $pembinaan, 'ekskul' => $ekskul));
        } elseif ($jenis == 4){
            return view('ekskul.daftarekstrakurikuler', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul));
        }
    }

    public function daftarekskul(){
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();

        $ekskul = \DB::table('users')
            ->where('users.jenis_user_id', '=', 3)
            ->get();

        if ($jenis == 1){
        return view('ekskul.daftarekstrakurikuler', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul));
        }
    }

    public function buatdataekskul($id){
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $ekskul = \DB::table('users')
            ->where('users.id', '=', $id)
            ->get();

        $jenis_ekskul = \App\JenisEkskul::all();

        if ($jenis == 1){            
        return view('ekskul.buatdataekstra', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul));
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
        $jenis_ekskul = \App\JenisEkskul::all();

        if($jenis == 1){
        return view('ekskul.buatdataekskul', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'jenis_ekskul' => $jenis_ekskul));
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
            'nama_ekskul' => 'required',
            'logo_ekskul' => 'required'
        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

    foreach($request->file('logo_ekskul') as $image) {
        $foto = $image->getClientOriginalExtension();
        $filename = 'ekskul'.time().$request->user_id.$nomor.'.'.$foto;
        $destination = public_path('uploads/'. $filename);
        // $image->move($destination, $filename);
        Image::make($image)->resize(600, 600)->save($destination);
        $post = new Ekskul;
        $post->nama_ekskul = $request->nama_ekskul;
        $post->logo_ekskul = $filename;
        $post->jenis_ekskul_id = $request->jenis_ekskul_id;
        $post->deskripsi_ekskul = $request->deskripsi_ekskul;
        $post->user_id = $request->user_id;
        
        $post->save();
    }

        return redirect('/ekskul');
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
        $ekskul = \DB::table('ekskul')
            ->join('users', 'ekskul.user_id', '=', 'users.id')
            ->join('ref_jenisekskul', 'ekskul.jenis_ekskul_id', '=', 'ref_jenisekskul.id_jenisekskul')
            ->where('ekskul.id_ekskul', '=', $id)
            ->get();

        $pembinaan = \DB::table('pembinaan')
            ->join('ekskul', 'pembinaan.ekskul_id', '=', 'ekskul.id_ekskul')
            ->join('pembina', 'pembinaan.pembina_id', '=', 'pembina.id_pembina')
            ->where('pembinaan.ekskul_id', '=', $id)
            ->get();
            
        return view('ekskul.halamanekskul', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'jenisapa' => $jenisapa, 'ekskul' => $ekskul, 'pembinaan' => $pembinaan));
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
        $ekskul = \App\Ekskul::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $jenis_ekskul = \App\JenisEkskul::all();
        $selected_jenis_ekskul = $ekskul->jenis_ekskul_id;

        if($jenis == 1){
        return view('ekskul.editdataekskul', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'ekskul' => $ekskul, 'jenis_ekskul' => $jenis_ekskul, 'jenisapa' => $jenisapa, 'selected_jenis_ekskul' => $selected_jenis_ekskul));
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
            'nama_ekskul' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Ekskul::find($id);
        $post->nama_ekskul = $request->nama_ekskul;
        $post->logo_ekskul = $request->logo_ekskul;
        $post->foto_ekskul = $request->foto_ekskul;
        $post->jenis_ekskul_id = $request->jenis_ekskul_id;
        $post->deskripsi_ekskul = $request->deskripsi_ekskul;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/ekskul');
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
        $ekskul = Ekskul::find($id);
        $ekskul->delete();

        return redirect('/ekskul');
    }
}
