@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')
    
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Laporan Pertanggungjawaban Kegiatan</h2>
        <hr>
        <form class="edit-form" action="/laporan/{{$laporan->id_laporan}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group">
                <label for="judul_proposal">Judul</label><br>
                <input type="text" id="judul_laporan" name="judul_laporan" value="{{$laporan->judul_laporan}}" />   
            </div>
            <div class="form-group">
                <label for="ketua_ekskul">Ketua Ekstrakurikuler</label><br>
                <input type="text" id="ketua_ekskul" name="ketua_ekskul" value="{{$laporan->ketua_ekskul}}" />   
            </div>
            <div class="form-group">
                <label for="ketua_pelaksana">Ketua Pelaksana</label><br>
                <input type="text" id="ketua_pelaksana" name="ketua_pelaksana" value="{{$laporan->ketua_pelaksana}}" />   
            </div>
            <div class="form-group">
                <label for="tempat_kegiatan">Tempat Kegiatan</label><br>
                <input type="text" id="tempat_kegiatan" name="tempat_kegiatan" value="{{$laporan->tempat_kegiatan}}" />   
            </div>
            <div class="form-group">
                <label for="pendahuluan">Pendahuluan</label><br>
                <textarea id="pendahuluan" name="pendahuluan">{!! $laporan->pendahuluan !!}</textarea>
            </div>
            <div class="form-group">
                <label for="waktu_kegiatan">Waktu Kegiatan</label><br>
                <textarea id="waktu_kegiatan" name="waktu_kegiatan">{!! $laporan->waktu_kegiatan !!}</textarea>
            </div>
            <div class="form-group">
                <label for="hasil_yangdicapai">Hasil Yang Dicapai</label><br>
                <textarea id="hasil_yangdicapai" name="hasil_yangdicapai">{!! $laporan->hasil_yangdicapai !!}</textarea>
            </div>
            <div class="form-group">
                <label for="hambatan_kegiatan">Hambatan</label><br>
                <textarea id="hambatan_kegiatan" name="hambatan_kegiatan">{!! $laporan->hambatan_kegiatan !!}</textarea>
            </div>
            <div class="form-group">
                <label for="pemecahan_masalah">Pemecahan Masalah</label><br>
                <textarea id="pemecahan_masalah" name="pemecahan_masalah">{!! $laporan->pemecahan_masalah !!}</textarea>
            </div>
            <div class="form-group">
                <label for="penutup">Penutup</label><br>
                <textarea id="penutup" name="penutup">{!! $laporan->penutup !!}</textarea>
            </div>
            <div class="form-group">
                <label for="sasaran">Sasaran</label><br>
                <textarea id="sasaran" name="sasaran">{!! $laporan->sasaran !!}</textarea>
            </div>
            <div class="form-group">
                <label for="susunan_panitia">Susunan Panitia</label><br>
                <textarea id="susunan_panitia" name="susunan_panitia">{!! $laporan->susunan_panitia !!}</textarea>
            </div>
            <div class="form-group">
                <label for="susunan_acara">Susunan Acara</label><br>
                <textarea id="susunan_acara" name="susunan_acara">{!! $laporan->susunan_acara !!}</textarea>
            </div>
            <div class="form-group">
                <label for="pemasukan_kegiatan">Realisasi Pemasukan Kegiatan</label><br>
                <textarea id="pemasukan_kegiatan" name="pemasukan_kegiatan">{!! $laporan->pemasukan_kegiatan !!}</textarea>
            </div>
            <div class="form-group">
                <label for="pengeluaran_kegiatan">Realisasi Pengeluaran Kegiatan</label><br>
                <textarea id="pengeluaran_kegiatan" name="pengeluaran_kegiatan">{!! $laporan->pengeluaran_kegiatan !!}</textarea>
            </div>

            @foreach($ekskul as $ekskul)
            <input type="hidden" name="ekskul_id" value="{{$ekskul->id_ekskul}}">
            @endforeach
            <input type="hidden" name="user_id" value="{{$auth}}">
            <input type="hidden" name="_method" value="put">
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