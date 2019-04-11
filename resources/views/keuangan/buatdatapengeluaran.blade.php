@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Masukkan Data Pengeluaran Ekstrakurikuler Anda, disini ....</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdatapengeluaran')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            @if(count($errors))
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br/>
              <ul>
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
              </div>
            @endif

            <div id="info-form" style="font-size:12px;padding:12px">
                <h4>Panduan Pengisian Form</h4>
                <ol>
                    <li>Isi form dengan keadaan yang sebenar-benarnya</li>
                    <li>Ada info bantuan yang bisa anda lihat dengan mengklik <i class="glyphicon glyphicon-question-sign help"></i></li>
                    <li>Di beberapa <em>field</em> ada templat berbentuk tabel yang bisa langsung anda gunakan</li>
                </ol>
            </div>

        	<div class="form-group{{ $errors->has('item_pengeluaran') ? 'has-error' : '' }}">
        		<label for="item_pengeluaran">Nama Item
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#itempengeluaran"></i>
                </label><br>
                <div id="itempengeluaran" class="collapse" style="font-size:12px;padding:10px">
                    Nama dari pengeluaran, contoh : "Pembelian ATK", "Pembayaran honor pemateri seminar", "Donasi bakti sosial di xyz"
                </div>
        		<input type="text" id="item_pengeluaran" name="item_pengeluaran" required />
                <span class="text-danger">{{ $errors->first('item_pengeluaran') }}</span>
        	</div>
             <div class="form-group{{ $errors->has('item_pengeluaran') ? 'has-error' : '' }}">
                <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label><br>
                <input type="date" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required />
                <span class="text-danger">{{ $errors->first('tanggal_pengeluaran') }}</span>
            </div>
        	<div class="form-group">
        		<label for="jumlah_item">Jumlah Item
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#jumlahitem"></i>
                </label><br>
                <div id="jumlahitem" class="collapse" style="font-size:12px;padding:10px">
                    isi field dengan jumlah hal/barang yang dibeli/dibayar. inputan berupa angka
                </div>
        		<input type="number" id="jumlah_item" name="jumlah_item" required />
        	</div>
        	<div class="form-group">
        		<label for="satuan_item_id">Satuan Item
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#satuanitem"></i>
                </label><br>
                <div id="satuanitem" class="collapse" style="font-size:12px;padding:10px">
                    pilih satuan-satuan yang sesuai dengan jumlah item
                </div>
        		<select id="satuan_item_id" name="satuan_item_id" required>
                    @foreach($satuan as $satuan)
                    <option value="{{$satuan->id_satuanitem}}">{{$satuan->nama_satuanitem}}</option>
                    @endforeach
                </select>
        	</div>
            <div class="form-group">
                <label for="jenis_pengeluaran_id">Jenis Pengeluaran
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#jenispengeluaran"></i>
                </label><br>
                <div id="jenispengeluaran" class="collapse" style="font-size:12px;padding:10px">
                    Sumber pemasukan yang anda pilih adalah :
                    <ol>
                        <li><strong>Pengadaan barang</strong>, jika pengeluaran digunakan untuk membeli sebuah untuk inventaris/keperluan ekstrakurikuler</li>
                        <li><strong>Pembayaran keikutsertaan acara</strong>, jika pengeluaran digunakan untuk membayar keikutsertaan acara yang diikuti oleh ekstrakurikuler</li>
                        <li><strong>Honorarium</strong>, jika pengeluaran digunakan untuk pembayaran jasa, contoh honor pengisi acara, honor pemateri, honor juri, honor tukang membuat sesuatu yang dibutuhkan ekstrakurikuler, dan sejenisnya</li>
                        <li><strong>Donasi</strong>, jika pengeluaran digunakan untuk donasi seperti bantuan bencana, bakti sosial dan sejenisnya</li>
                        <li><strong>Iuran Organisasi</strong>, jika pengeluaran digunakan untuk membayar iuran organisasi/komunitas/perkumpulan/ikatan yang diikuti ekstrakurikuler. contoh : ekstrakurikuler PMR tergabung pada ikatan PMR se-Kota Surakarta jadi PMR membayar iuran di ikatan PMR se-Kota Surakarta</li>
                    </ol>
                </div>
                <select id="jenis_pengeluaran_id" name="jenis_pengeluaran_id" required>
                    @foreach($jenis_pengeluaran as $jenis_pengeluaran)
                    <option value="{{$jenis_pengeluaran->id_jenispengeluaran}}">{{$jenis_pengeluaran->nama_jenispengeluaran}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="harga_satuan">Harga Satuan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#hargasatuan"></i>
                </label><br>
                <div id="hargasatuan" class="collapse" style="font-size:12px;padding:10px">
                    adalah harga satuan dari hal/barang yang dibeli/dibayar. 
                    <ol>
                        <li>jika pembelian barang isi field sesuai harga satuan barang, misal per buah, per kg, per m, per cm, dll</li>
                        <li>jika merupakan honorarium isi field sesuai dengan waktu, misal berapa kali, per jam, atau per hari, dll</li>
                        <li>jika merupakan jasa, donasi atau iuran anggota field boleh tidak diisi</li>
                    </ol>
                </div>
                <p>Rp&nbsp;</p><input type="number" id="harga_satuan" name="harga_satuan" required />
            </div>
            <div class="form-group">
                <label for="nominal_pengeluaran">Jumlah Pengeluaran
                </label><br>
                <p>Rp&nbsp;</p><input type="number" id="nominal_pengeluaran" name="nominal_pengeluaran" required />
                
            </div>
            <div class="form-group">
                <label for="pic_pengeluaran">Penanggung Jawab (<em>Person In Charge</em>)
                 <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#pic"></i>
                </label><br>
                <div id="pic" class="collapse" style="font-size:12px;padding:10px">
                    Penanggung Jawab adalah bendahara atau anggota eksktrakurikuler yang melakukan pengeluaran dan diketahui oleh bendahara
                </div>
                <input type="text" id="pic_pengeluaran" name="pic_pengeluaran" required />
            </div>
        	<hr>

            @foreach($ekskul as $ekskul)
            <input type="hidden" name="ekskul_id" value="{{$ekskul->id_ekskul}}">
            @endforeach
            <input type="hidden" name="user_id" value="{{ $auth }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                <button class="btn .btn-danger danger" type="reset">Batal</button>
        	</div>
        </form>
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')

@endsection