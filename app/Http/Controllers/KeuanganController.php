<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pemasukan;
use App\SumberPemasukan;
use App\Pengeluaran;
use App\JenisPengeluaran;
use App\SatuanItem;
use App\Pembina;
use App\Pembinaan;
use App\Keanggotaan;
use Carbon\Carbon;
use PDF;


class KeuanganController extends Controller
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
            $pemasukan = \DB::table('pemasukan')
               ->join('ref_sumberpemasukan', 'pemasukan.sumber_pemasukan_id', '=', 'ref_sumberpemasukan.id_sumberpemasukan')
               ->join('ekskul', 'pemasukan.ekskul_id', '=', 'ekskul.id_ekskul')
               ->paginate(10);

            $pengeluaran = \DB::table('pengeluaran')
               ->join('ref_jenispengeluaran', 'pengeluaran.jenis_pengeluaran_id','=', 'ref_jenispengeluaran.id_jenispengeluaran')
               ->join('ref_satuanitem', 'pengeluaran.satuan_item_id', '=', 'ref_satuanitem.id_satuanitem')
               ->join('ekskul', 'pengeluaran.ekskul_id', '=', 'ekskul.id_ekskul')
               ->paginate(10);

            $jumlah_pemasukan = \DB::table('pemasukan')->sum('nominal_pemasukan');
            $jumlah_pengeluaran = \DB::table('pengeluaran')->sum('nominal_pengeluaran');

            $sumber = \App\SumberPemasukan::all();
            $jumlah_bos = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 1)->sum('nominal_pemasukan');
            $jumlah_sponsor = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 2)->sum('nominal_pemasukan');
            $jumlah_hibah = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 3)->sum('nominal_pemasukan');
            $jumlah_csr = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 4)->sum('nominal_pemasukan');
            $jumlah_danus = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 5)->sum('nominal_pemasukan');
            $jumlah_iuran = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 6)->sum('nominal_pemasukan');
           

            $jenis_pengeluaran = \App\JenisPengeluaran::all();
            $jumlah_beli = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 1)->sum('nominal_pengeluaran');
            $jumlah_bayaracara = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 3)->sum('nominal_pengeluaran');
            $jumlah_honor = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 4)->sum('nominal_pengeluaran');
            $jumlah_donasi = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 5)->sum('nominal_pengeluaran');
            $jumlah_iuranorganisasi = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 6)->sum('nominal_pengeluaran');

        } elseif ($jenis == 2) {
            $pemasukan = \DB::table('pemasukan')
               ->join('ref_sumberpemasukan', 'pemasukan.sumber_pemasukan_id', '=', 'ref_sumberpemasukan.id_sumberpemasukan')
               ->join('ekskul', 'pemasukan.ekskul_id', '=', 'ekskul.id_ekskul')
               ->where('pemasukan.user_id', '=', $auth)
               ->get();

            $pengeluaran = \DB::table('pengeluaran')
               ->join('ref_jenispengeluaran', 'pengeluaran.jenis_pengeluaran_id','=', 'ref_jenispengeluaran.id_jenispengeluaran')
               ->join('ref_satuanitem', 'pengeluaran.satuan_item_id', '=', 'ref_satuanitem.id_satuanitem')
               ->where('pengeluaran.user_id', '=', $auth)
               ->get();

             $sumber = \App\SumberPemasukan::all();
            $jumlah_bos = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 1)->sum('nominal_pemasukan');
            $jumlah_sponsor = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 2)->sum('nominal_pemasukan');
            $jumlah_hibah = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 3)->sum('nominal_pemasukan');
            $jumlah_csr = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 4)->sum('nominal_pemasukan');
            $jumlah_danus = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 5)->sum('nominal_pemasukan');
            $jumlah_iuran = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 6)->sum('nominal_pemasukan');
           

            $jenis_pengeluaran = \App\JenisPengeluaran::all();
            $jumlah_beli = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 1)->sum('nominal_pengeluaran');
            $jumlah_bayaracara = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 3)->sum('nominal_pengeluaran');
            $jumlah_honor = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 4)->sum('nominal_pengeluaran');
            $jumlah_donasi = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 5)->sum('nominal_pengeluaran');
            $jumlah_iuranorganisasi = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 6)->sum('nominal_pengeluaran');

            $jumlah_pemasukan = \DB::table('pemasukan')->sum('nominal_pemasukan');
            $jumlah_pengeluaran = \DB::table('pengeluaran')->sum('nominal_pengeluaran');


        } elseif ($jenis == 3) {
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
            $pemasukan = \DB::table('pemasukan')
               ->join('ref_sumberpemasukan', 'pemasukan.sumber_pemasukan_id', '=', 'ref_sumberpemasukan.id_sumberpemasukan')
               ->join('ekskul', 'pemasukan.ekskul_id', '=', 'ekskul.id_ekskul')
               ->where('pemasukan.ekskul_id', '=', $pembinaan->id_ekskul)
               ->paginate(10);

            $pengeluaran = \DB::table('pengeluaran')
               ->join('ref_jenispengeluaran', 'pengeluaran.jenis_pengeluaran_id','=', 'ref_jenispengeluaran.id_jenispengeluaran')
               ->join('ref_satuanitem', 'pengeluaran.satuan_item_id', '=', 'ref_satuanitem.id_satuanitem')
               ->where('pengeluaran.ekskul_id', '=', $pembinaan->id_ekskul)
               ->paginate(10);
             $sumber = \App\SumberPemasukan::all();
            $jumlah_bos = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 1)->sum('nominal_pemasukan');
            $jumlah_sponsor = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 2)->sum('nominal_pemasukan');
            $jumlah_hibah = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 3)->sum('nominal_pemasukan');
            $jumlah_csr = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 4)->sum('nominal_pemasukan');
            $jumlah_danus = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 5)->sum('nominal_pemasukan');
            $jumlah_iuran = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 6)->sum('nominal_pemasukan');
           

            $jenis_pengeluaran = \App\JenisPengeluaran::all();
            $jumlah_beli = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 1)->sum('nominal_pengeluaran');
            $jumlah_bayaracara = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 3)->sum('nominal_pengeluaran');
            $jumlah_honor = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 4)->sum('nominal_pengeluaran');
            $jumlah_donasi = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 5)->sum('nominal_pengeluaran');
            $jumlah_iuranorganisasi = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 6)->sum('nominal_pengeluaran');
            }
        }

        if (($jenis == 1) || ($jenis == 2)) {
            return view('keuangan.daftarkeuangan', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'pemasukan' => $pemasukan, 'pengeluaran' => $pengeluaran, 'sumber' => $sumber, 'jenis_pengeluaran' => $jenis_pengeluaran,
                'jumlah_pemasukan' => $jumlah_pemasukan,
                'jumlah_pengeluaran' => $jumlah_pengeluaran,
                'jumlah_bos' => $jumlah_bos,
                'jumlah_sponsor' => $jumlah_sponsor,
                'jumlah_hibah' => $jumlah_hibah,
                'jumlah_csr' => $jumlah_csr,
                'jumlah_danus' => $jumlah_danus,
                'jumlah_iuran' => $jumlah_iuran,
                'jumlah_beli' => $jumlah_beli,
                'jumlah_bayaracara' => $jumlah_bayaracara,
                'jumlah_honor' => $jumlah_honor,
                'jumlah_donasi' => $jumlah_donasi,
                'jumlah_iuranorganisasi' => $jumlah_iuranorganisasi,
            ));
        } elseif($jenis == 3) {
            return view('keuangan.daftarkeuangan', array('auth' => $auth, 'name' => $name, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'pemasukan' => $pemasukan, 'pengeluaran' => $pengeluaran, 'sumber' => $sumber, 'jenis_pengeluaran' => $jenis_pengeluaran, 'pembina' => $pembina, 'pembinaan' => $pembina));
        } else {
            return view('forbidden');
        }
    }

// -------------------------------------------- Create and Store Pemasukan

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPemasukan()
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
        $sumber = \App\SumberPemasukan::all();

        if($jenis == 2){
        return view('keuangan.buatdatapemasukan', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'sumber' => $sumber, 'ekskul' => $ekskul));
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
    public function storePemasukan(Request $request)
    {
        //
        $rules =  [
            'item_pemasukan' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Pemasukan;
        $post->item_pemasukan = $request->item_pemasukan;
        $post->tanggal_pemasukan = $request->tanggal_pemasukan;
        $post->nominal_pemasukan = $request->nominal_pemasukan;
        $post->pic_pemasukan = $request->pic_pemasukan;
        $post->sumber_pemasukan_id = $request->sumber_pemasukan_id;
        $post->user_id = $request->user_id;
        $post->ekskul_id = $request->ekskul_id;

        $post->save();

        session()->flash('pemasukanadded', 'Data pemasukan telah ditambahkan');
        return redirect('/keuangan');
    }

// -------------------------------------------- Create and Store Pengeluaran

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPengeluaran()
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
        $jenis_pengeluaran = \App\JenisPengeluaran::all();
        $satuan = \App\SatuanItem::all();

        if($jenis == 2){
        return view('keuangan.buatdatapengeluaran', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'jenis_pengeluaran' => $jenis_pengeluaran, 'satuan' => $satuan, 'ekskul' => $ekskul));
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
    public function storePengeluaran(Request $request)
    {
        //
         $rules =  [
            'item_pengeluaran' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Pengeluaran;
        $post->item_pengeluaran = $request->item_pengeluaran;
        $post->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $post->jumlah_item = $request->jumlah_item;
        $post->nominal_pengeluaran = $request->nominal_pengeluaran;
        $post->pic_pengeluaran = $request->pic_pengeluaran;
        $post->jenis_pengeluaran_id = $request->jenis_pengeluaran_id;
        $post->satuan_item_id = $request->satuan_item_id;
        $post->user_id = $request->user_id;
        $post->ekskul_id = $request->ekskul_id;

        $post->save();

        session()->flash('pengeluaranadded', 'Data pengeluaran telah ditambahkan');
        return redirect('/keuangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPemasukan($id)
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

       $pemasukan = \DB::table('pemasukan')
        ->join('ekskul', 'pemasukan.ekskul_id', '=', 'ekskul.id_ekskul')
        ->join('ref_sumberpemasukan', 'pemasukan.sumber_pemasukan_id', '=', 'ref_sumberpemasukan.id_sumberpemasukan')
        ->where('pemasukan.id_pemasukan', '=', $id)
        ->get();

        return view('keuangan.halamanpemasukan', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'pemasukan' => $pemasukan, 'jenisapa' => $jenisapa));
    }
    

    public function showPengeluaran($id)
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

       $pengeluaran = \DB::table('pengeluaran')
        ->join('ekskul', 'pengeluaran.ekskul_id', '=', 'ekskul.id_ekskul')
        ->join('ref_jenispengeluaran', 'pengeluaran.jenis_pengeluaran_id', '=', 'ref_jenispengeluaran.id_jenispengeluaran')
        ->join('ref_satuanitem', 'pengeluaran.satuan_item_id', '=', 'ref_satuanitem.id_satuanitem')
        ->where('pengeluaran.id_pengeluaran', '=', $id)
        ->get();

        return view('keuangan.halamanpengeluaran', array('auth' => $auth, 'jenis' => $jenis, 'name' => $name, 'pengeluaran' => $pengeluaran, 'jenisapa' => $jenisapa));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


// -------------------------------------------- Edit and Update Pemasukan

    public function editPemasukan($id)
    {
        //
        $pemasukan = \App\Pemasukan::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $sumber = \App\SumberPemasukan::all();

        $selected_sumber = $pemasukan->sumber_pemasukan_id;

        if($jenis == 2){
        return view('keuangan.editdatapemasukan', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'sumber' => $sumber, 'selected_sumber' => $selected_sumber, 'pemasukan' => $pemasukan));
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

    public function updatePemasukan(Request $request, $id)
    {
        //
        $rules =  [
            'item_pemasukan' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Pemasukan::find($id);
        $post->item_pemasukan = $request->item_pemasukan;
        $post->tanggal_pemasukan = $request->tanggal_pemasukan;
        $post->nominal_pemasukan = $request->nominal_pemasukan;
        $post->pic_pemasukan = $request->pic_pemasukan;
        $post->sumber_pemasukan_id = $request->sumber_pemasukan_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('pemasukanedited', 'Perubahan data pemasukan kas telah disimpan');
        return redirect('/keuangan');
    }

// -------------------------------------------- Edit and Update Pemasukan

    public function editPengeluaran($id)
    {
        //
        $pengeluaran = \App\Pengeluaran::find($id);
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;
        $jenisapa = \DB::table('ref_jenisuser')
            ->join('users', 'ref_jenisuser.id_jenisuser', '=', 'users.jenis_user_id')
            ->where('ref_jenisuser.id_jenisuser', '=', $jenis)
            ->where('users.id', '=', $auth)
            ->get();
        $jenis_pengeluaran = \App\JenisPengeluaran::all();
        $satuan = \App\SatuanItem::all();

        $selected_jenis = $pengeluaran->jenis_pengeluaran_id;
        $selected_satuan = $pengeluaran->satuan_item_id;

        if($jenis == 2){
        return view('keuangan.editdatapengeluaran', array('auth' => $auth, 'jenis' => $jenis, 'jenisapa' => $jenisapa, 'name' => $name, 'jenis_pengeluaran' => $jenis_pengeluaran, 'satuan' => $satuan, 'pengeluaran' => $pengeluaran, 'selected_satuan' => $selected_satuan, 'selected_jenis' => $selected_jenis));
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

    public function updatePengeluaran(Request $request, $id)
    {
        //
        $rules =  [
            'item_pengeluaran' => 'required',

        ];

        $customMessages = [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = Pengeluaran::find($id);
        $post->item_pengeluaran = $request->item_pengeluaran;
        $post->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $post->jumlah_item = $request->jumlah_item;
        $post->nominal_pengeluaran = $request->nominal_pengeluaran;
        $post->pic_pengeluaran = $request->pic_pengeluaran;
        $post->jenis_pengeluaran_id = $request->jenis_pengeluaran_id;
        $post->satuan_item_id = $request->satuan_item_id;
        $post->user_id = $request->user_id;

        $post->save();

        session()->flash('pengeluaranedited', 'Perubahan data pengeluaran kas telah disimpan');
        return redirect('/keuangan');
    }

// PDF
        public function cetakpdf()
    {
        $auth = Auth::user()->id;
        $name = Auth::user()->username;
        $jenis = Auth::user()->jenis_user_id;

        $pemasukan = \DB::table('pemasukan')
           ->join('ref_sumberpemasukan', 'pemasukan.sumber_pemasukan_id', '=', 'ref_sumberpemasukan.id_sumberpemasukan')
           ->join('ekskul', 'pemasukan.ekskul_id', '=', 'ekskul.id_ekskul')
           ->where('pemasukan.user_id', '=', $auth)
           ->get();

        $pengeluaran = \DB::table('pengeluaran')
           ->join('ref_jenispengeluaran', 'pengeluaran.jenis_pengeluaran_id','=', 'ref_jenispengeluaran.id_jenispengeluaran')
           ->join('ref_satuanitem', 'pengeluaran.satuan_item_id', '=', 'ref_satuanitem.id_satuanitem')
           ->where('pengeluaran.user_id', '=', $auth)
           ->get();

        $sumber = \App\SumberPemasukan::all();
        $jumlah_bos = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 1)->sum('nominal_pemasukan');
        $jumlah_sponsor = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 2)->sum('nominal_pemasukan');
        $jumlah_hibah = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 3)->sum('nominal_pemasukan');
        $jumlah_csr = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 4)->sum('nominal_pemasukan');
        $jumlah_danus = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 5)->sum('nominal_pemasukan');
        $jumlah_pinjambank = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 6)->sum('nominal_pemasukan');
        $jumlah_pinjamnonbank = \DB::table('pemasukan')->where('pemasukan.sumber_pemasukan_id', '=', 7)->sum('nominal_pemasukan');

        $jenis_pengeluaran = \App\JenisPengeluaran::all();
        $jumlah_beli = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 1)->sum('nominal_pengeluaran');
        $jumlah_bayarhutang = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 3)->sum('nominal_pengeluaran');
        $jumlah_honor = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 4)->sum('nominal_pengeluaran');
        $jumlah_donasi = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 5)->sum('nominal_pengeluaran');
        $jumlah_iuran = \DB::table('pengeluaran')->where('pengeluaran.jenis_pengeluaran_id', '=', 6)->sum('nominal_pengeluaran');

        $jumlah_pemasukan = \DB::table('pemasukan')->sum('nominal_pemasukan');
        $jumlah_pengeluaran = \DB::table('pengeluaran')->sum('nominal_pengeluaran');

        $ketua = \DB::table('keanggotaan')
            ->join('siswa', 'keanggotaan.siswa_id', '=', 'siswa.id_siswa')
            ->where('keanggotaan.jabatan', '=', 'Ketua')
            ->get();

        $tanggal = date('d-m-Y');

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

        $pdf = PDF::loadView('keuangan.pdfkeuangan', array('auth' => $name, 'name' => $name, 'jenis' => $jenis, 'ekskul' => $ekskul, 'pembina' => $pembina, 'ketua' => $ketua, 'tanggal' => $tanggal,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'jumlah_pemasukan' => $jumlah_pemasukan,
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
            'jumlah_bos' => $jumlah_bos,
            'jumlah_sponsor' => $jumlah_sponsor,
            'jumlah_hibah' => $jumlah_hibah,
            'jumlah_csr' => $jumlah_csr,
            'jumlah_danus' => $jumlah_danus,
            'jumlah_pinjambank' => $jumlah_pinjambank,
            'jumlah_pinjamnonbank' => $jumlah_pinjamnonbank,
            'jumlah_beli' => $jumlah_beli,
            'jumlah_bayarhutang' => $jumlah_bayarhutang,
            'jumlah_honor' => $jumlah_honor,
            'jumlah_donasi' => $jumlah_donasi,
            'jumlah_iuran' => $jumlah_iuran,))->setPaper('a4');
        return $pdf->stream('laporankeuangan.pdf');
    }
// ---------------------- destroy

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function destroyPemasukan($id)
    {
        //
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();

        return redirect('/keuangan');
    }

    public function destroyPengeluaran($id)
    {
        //
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();

        return redirect('/keuangan');
    }
}