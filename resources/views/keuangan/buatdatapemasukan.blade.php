@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Masukkan Data Pemasukkan Ekstrakurikuler Anda, disini ....</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdatapemasukan')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

        	<div class="form-group{{ $errors->has('item_pemasukan') ? 'has-error' : '' }}">
        		<label for="item_pemasukan">Item Pemasukan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#itempemasukan"></i>
                </label><br>
                <div id="itempemasukan" class="collapse" style="font-size:12px;padding:10px">
                    Nama dari pemasukan, contoh : "Sponsor PT. XYZ", "Dana Sekolah Januari 2019", "Iuran Kas Januari 2019"
                </div>
        		<input type="text" id="item_pemasukan" name="item_pemasukan"/>
                <span class="text-danger">{{ $errors->first('item_pemasukkan') }}</span>
        	</div>
            <div class="form-group{{ $errors->has('tanggal_pemasukan') ? 'has-error' : '' }}">
                <label for="tanggal_pemasukan">Tertanggal</label><br>
                <input type="date" id="tanggal_pemasukan" name="tanggal_pemasukan"/>
            </div>
            <div class="form-group{{ $errors->has('sumber_pemasukan_id') ? 'has-error' : '' }}">
                <label for="sumber_pemasukan_id">Sumber Dana&nbsp;
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#sumberpemasukan"></i>
                </label><br>
                <div id="sumberpemasukan" class="collapse" style="font-size:12px;padding:10px">
                    Sumber pemasukan yang anda pilih adalah :
                    <ol>
                        <li><strong>Sekolah</strong>, jika dana masuk berasal dari anggaran sekolah atau BOS</li>
                        <li><strong>Sponsor</strong>, jika dana didapat dari perusahaan dengan perjanjian timbal balik</li>
                        <li><strong>Hibah</strong>, jika dana didapat dari suatu pihak secara cuma-cuma</li>
                        <li><strong>CSR (Corporate Social Responsiblity)</strong>, jika dana didapat dari perusahaan sebagai CSR</li>
                        <li><strong>Dana Usaha Mandiri</strong>, jika dana didapat dari usaha yang dilakukan oleh ekstrakurikuler sendiri</li>
                        <li><strong>Iuran Anggota</strong>, jika dana didapat dari iuran kas anggota ekstrakurikuler</li>
                    </ol>
                </div>
                <select id="sumber_pemasukan_id" name="sumber_pemasukan_id">
                    @foreach($sumber as $sumber)
                    <option value="{{$sumber->id_sumberpemasukan}}">{{$sumber->nama_sumberpemasukan}}</option>
                    @endforeach      
                </select>
            </div>
            <div class="form-group">
                <label for="nominal_pemasukan">Jumlah Nominal</label><br>
                <p>Rp&nbsp;&nbsp;</p><input type="number" id="nominal_pemasukan" name="nominal_pemasukan"/>
            </div>
            <div class="form-group">
                <label for="pic_pemasukan">Penanggung Jawab (<em>Person In Charge</em>)
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#pic"></i>
                </label><br>
                <div id="pic" class="collapse" style="font-size:12px;padding:10px">
                    Penanggung Jawab adalah bendahara atau anggota eksktrakurikuler yang menerima dana masuk dan diketahui oleh bendahara
                </div>
                <input type="text" id="pic_pemasukan" name="pic_pemasukan"/>
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