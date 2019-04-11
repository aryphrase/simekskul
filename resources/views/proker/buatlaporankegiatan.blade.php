@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')
    
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Buat Laporan Pertanggungjawaban Kegiatan</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdatalaporan')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

            <div class="form-group">
                <label for="judul_proposal">Judul
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#judul_laporan"></i>
                </label><br>
                <div id="judul_laporan" class="collapse" style="font-size:12px;padding:10px">
                    Contoh : "Laporan Pertanggungjawaban Lomba Puisi se-Kota Surakarta"
                </div>
                <input type="text" id="judul_laporan" name="judul_laporan" required />   
            </div>
            <div class="form-group">
                <label for="ketua_ekskul">Ketua Ekstrakurikuler</label><br>
                <input type="text" id="ketua_ekskul" name="ketua_ekskul" required />   
            </div>
            <div class="form-group">
                <label for="ketua_pelaksana">Ketua Pelaksana</label><br>
                <input type="text" id="ketua_pelaksana" name="ketua_pelaksana" required />   
            </div>
            <div class="form-group">
                <label for="tempat_kegiatan">Tempat Kegiatan</label><br>
                <input type="text" id="tempat_kegiatan" name="tempat_kegiatan" required />   
            </div>
            <div class="form-group">
                <label for="pendahuluan">Pendahuluan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#pendahuluan"></i>
                </label><br>
                <div id="pendahuluan" class="collapse" style="font-size:12px;padding:10px">
                    <strong>Contoh :</strong> 
                    <p>Esktrakurikuler X akan mengadakan kegiatan ... Kegiatan ini adalah salah satu kegiatan yang dilaksanakan oleh Esktrakurikuler X setiap tahun. Kegiatan ini bertujuan untuk ..., sehingga mampu ... Kegiatan ini juga diharapkan ....
                    </p>
                    <p>
                    Untuk kepentingan itulah, Esktrakurikuler X merasa perlu untuk mengadakan kegiatan ini dengan harapan .... 
                    </p>
                </div>
                <textarea id="pendahuluan" name="pendahuluan"></textarea>
            </div>
            <div class="form-group">
                <label for="waktu_kegiatan">Pelaksanaan Kegiatan</label><br>
                <textarea id="waktu_kegiatan" name="waktu_kegiatan">
                    @include('layout.rtf_pelaksanaankegiatan')
                </textarea>
            </div>
            <div class="form-group">
                <label for="hasil_yangdicapai">Hasil Yang Dicapai</label><br>
                <textarea id="hasil_yangdicapai" name="hasil_yangdicapai">
                    @include('layout.rtf_hasil')
                </textarea>
            </div>
            <div class="form-group">
                <label for="hambatan_kegiatan">Hambatan</label><br>
                <textarea id="hambatan_kegiatan" name="hambatan_kegiatan">
                    @include('layout.rtf_hambatan')
                </textarea>
            </div>
            <div class="form-group">
                <label for="pemecahan_masalah">Pemecahan Masalah</label><br>
                <textarea id="pemecahan_masalah" name="pemecahan_masalah">
                    @include('layout.rtf_pemecahanmasalah')
                </textarea>
            </div>
            <div class="form-group">
                <label for="penutup">Penutup
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#penutup"></i></label><br>
                <textarea id="penutup" name="penutup"></textarea>
            </div>
            <div class="form-group">
                <label for="sasaran">Sasaran</label><br>
                <textarea id="sasaran" name="sasaran">
                    @include('layout.rtf_sasaran')
                </textarea>
            </div>
            <div class="form-group">
                <label for="susunan_panitia">Susunan Panitia</label><br>
                <textarea id="susunan_panitia" name="susunan_panitia">
                    @include('layout.rtf_panitia')
                </textarea>
            </div>
            <div class="form-group">
                <label for="susunan_acara">Susunan Acara</label><br>
                <textarea id="susunan_acara" name="susunan_acara">
                    @include('layout.rtf_acara')
                </textarea>
            </div>
            <div class="form-group">
                <label for="pemasukan_kegiatan">Realisasi Pemasukan Kegiatan</label><br>
                <textarea id="pemasukan_kegiatan" name="pemasukan_kegiatan">
                    @include('layout.rtf_pemasukan')
                </textarea>
            </div>
            <div class="form-group">
                <label for="pengeluaran_kegiatan">Realisasi Pengeluaran Kegiatan</label><br>
                <textarea id="pengeluaran_kegiatan" name="pengeluaran_kegiatan">
                    @include('layout.rtf_pengeluaran')
                </textarea>
            </div>

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