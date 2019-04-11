@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')
    
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Proposal Kegiatan</h2>
        <hr>
        <form class="edit-form" action="/proposal/{{$proposal->id_proposal}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group">
                <label for="judul_proposal">Judul</label><br>
                <input type="text" id="judul_proposal" name="judul_proposal" value="{{$proposal->judul_proposal}}"/>   
            </div>
            <div class="form-group">
                <label for="ketua_ekskul">Ketua Ekstrakurikuler</label><br>
                <input type="text" id="ketua_ekskul" name="ketua_ekskul" value="{{$proposal->ketua_ekskul}}"/>   
            </div>
            <div class="form-group">
                <label for="ketua_pelaksana">Ketua Pelaksana</label><br>
                <input type="text" id="ketua_pelaksana" name="ketua_pelaksana" value="{{$proposal->ketua_pelaksana}}"/>   
            </div>
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label><br>
                <input type="text" id="nama_kegiatan" name="nama_kegiatan" value="{{$proposal->nama_kegiatan}}"/>   
            </div>
            <div class="form-group">
                <label for="pendahuluan">Pendahuluan</label><br>
                <textarea id="pendahuluan" name="pendahuluan">{!!$proposal->pendahuluan!!}</textarea>
            </div>
            <div class="form-group">
                <label for="dasar_kegiatan">Dasar Kegiatan</label><br>
                <textarea id="dasar_kegiatan" name="dasar_kegiatan">{!!$proposal->dasar_kegiatan!!}</textarea>
            </div>
            <div class="form-group">
                <label for="tujuan_kegiatan">Tujuan</label><br>
                <textarea id="tujuan_kegiatan" name="tujuan_kegiatan">{!!$proposal->tujuan_kegiatan!!}</textarea>
            </div>
            <div class="form-group">
                <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan</label><br>
                <textarea id="pelaksanaan_kegiatan" name="pelaksanaan_kegiatan">{!!$proposal->pelaksanaan_kegiatan!!}</textarea>
            </div>
            <div class="form-group">
                <label for="penutup">Penutup</label><br>
                <textarea id="penutup" name="penutup">{!!$proposal->penutup!!}</textarea>
            </div>
            <div class="form-group">
                <label for="sasaran">Sasaran</label><br>
                <textarea id="sasaran" name="sasaran">{!!$proposal->sasaran!!}</textarea>
            </div>
            <div class="form-group">
                <label for="susunan_panitia">Susunan Panitia</label><br>
                <textarea id="susunan_panitia" name="susunan_panitia">{!!$proposal->susunan_panitia!!}</textarea>
            </div>
            <div class="form-group">
                <label for="susunan_acara">Susunan Acara</label><br>
                <textarea id="susunan_acara" name="susunan_acara">{!!$proposal->susunan_acara!!}</textarea>
            </div>
            <div class="form-group">
                <label for="pemasukan_kegiatan">Estimasi Pemasukan Kegiatan</label><br>
                <textarea id="pemasukan_kegiatan" name="pemasukan_kegiatan">{!!$proposal->pemasukan_kegiatan!!}</textarea>
            </div>
            <div class="form-group">
                <label for="pengeluaran_kegiatan">Estimasi Pengeluaran Kegiatan</label><br>
                <textarea id="pengeluaran_kegiatan" name="pengeluaran_kegiatan">{!!$proposal->pengeluaran_kegiatan!!}</textarea>
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