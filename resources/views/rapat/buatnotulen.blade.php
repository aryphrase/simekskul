@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Buat Notulen Rapat Ekstrakurikuler Anda, disini ....</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdatarapat')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

        	<div class="form-group{{ $errors->has('nama_rapat') ? 'has-error' : '' }}">
        		<label for="nama_rapat">Nama Rapat</label><br>
        		<input type="text" id="nama_rapat" name="nama_rapat"  />
                <span class="text-danger">{{ $errors->first('nama_rapat') }}</span>
        	</div>
            <div class="form-group">
                <label for="peserta_rapat">Peserta</label><br>
                <textarea id="peserta_rapat" name="peserta_rapat" placeholder="Tulis Peserta Rapat anda disini ..."></textarea>
            </div>
            <div class="form-group">
                <label for="tempat_rapat">Tempat</label><br>
                <input type="text" id="tempat_rapat" name="tempat_rapat"  />
            </div>
            <div class="form-group">
                <div class="row">
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="tanggal_rapat">Tanggal</label><br>
                        <input type="date" id="tanggal_rapat" name="tanggal_rapat"  />
                    </div>
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="waktumulai_rapat">Waktu Mulai</label><br>
                        <input type="time" id="waktumulai_rapat" name="waktumulai_rapat"  />
                    </div>
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="waktuselesai_rapat">Waktu Selesai</label><br>
                        <input type="time" id="waktuselesai_rapat" name="waktuselesai_rapat"  />
                    </div>
                </div>
            </div>
           <div class="form-group">
                <label for="jenis_rapat_id">Jenis Rapat
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#jenis_rapat"></i>
                </label><br>
                <select id="jenis_rapat_id" name="jenis_rapat_id" >
                    @foreach($jenis_rapat as $jenis_rapat)
                    <option value="{{$jenis_rapat->id_jenisrapat}}">{{$jenis_rapat->nama_jenisrapat}}</option>
                    @endforeach
                </select>
                <div id="jenis_rapat" class="collapse" style="font-size:12px;padding:10px">
                    Yang anda pilih adalah :
                    <ol>
                        <li><strong>Rapat Rutin</strong>, jika notulen yang diinputkan adalah untuk rapat yang diadakan secara rutin (harian, mingguan, bulanan)</li>
                        <li><strong>Rapat Paripurna</strong>, adalah rapat di akhir masa kepengurusan</li>
                        <li><strong>Rapat Program Kerja dan Kegiatan</strong>, jika notulen yang diinputkan adalah untuk rapat yang diadakan untuk membahas program kerja atau kegiatan ekstrakurikuler</li>
                        <li><strong>Rapat Luar Biasa</strong>, adalah rapat yang dilakukan pada pertengahan masa kepengurusan dikarenakan adanya keputusan yang harus segera diambil</li>
                    </ol>
                </div>
            </div>
            <div class="form-group">
                <label for="agenda_rapat">Agenda Rapat</label><br>
                <textarea id="agenda_rapat" name="agenda_rapat">
                    <p>Rapat pada ((hari)), ((tanggal)) kali ini membahas beberapa poin, antara lain :</p>
                    <ol>
                        <li>((agenda 1))</li>
                        <li>((agenda 2))</li>
                        <li>((agenda 3))</li>
                    </ol>
                </textarea>
            </div>
            <div class="form-group">
                <label for="hasil_rapat">Hasil Rapat</label><br>
                <textarea id="hasil_rapat" name="hasil_rapat">
                    <p>Hasil rapat pada ((hari)), ((tanggal)) kali ini adalah :</p>
                    <ol>
                        <li>((hasil 1))</li>
                        <li>((hasil 2))</li>
                        <li>((hasil 3))</li>
                    </ol>
                </textarea>            
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

@include('script.texteditorjs')

@include('script.sidebarjs')


@endsection