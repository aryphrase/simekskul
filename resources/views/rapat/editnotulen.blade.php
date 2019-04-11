@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Rapat</h2>
        <hr>
        <form class="edit-form" action="/rapat/{{$rapat->id_rapat}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_rapat">Nama Rapat</label><br>
        		<input type="text" id="nama_rapat" name="nama_rapat" value="{{$rapat->nama_rapat}}" />
        	</div>
            <div class="form-group">
                <label for="peserta_rapat">Peserta</label><br>
               <textarea id="peserta_rapat" name="peserta_rapat" >{{$rapat->peserta_rapat}}</textarea>
            </div>
            <div class="form-group">
                <label for="tempat_rapat">Tempat</label><br>
                <input type="text" id="tempat_rapat" name="tempat_rapat" value="{{$rapat->tempat_rapat}}" />
            </div>
            <div class="form-group">
                <div class="row">
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="tanggal_rapat">Tanggal</label><br>
                        <input type="text" id="tanggal_rapat" name="tanggal_rapat" value="{{$rapat->tanggal_rapat}}" />
                    </div>
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="waktumulai_rapat">Waktu Mulai</label><br>
                        <input type="time" id="waktumulai_rapat" name="waktumulai_rapat" value="{{$rapat->waktumulai_rapat}}" />
                    </div>
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="waktuselesai_rapat">Waktu Selesai</label><br>
                        <input type="time" id="waktuselesai_rapat" name="waktuselesai_rapat" value="{{$rapat->waktuselesai_rapat}}" />
                    </div>
                </div>
            </div>
           <div class="form-group">
                <label for="jenis_rapat_id">Jenis Rapat</label><br>
                <select id="jenis_rapat_id" name="jenis_rapat_id" >
                    @foreach($jenis_rapat as $jenis_rapat)
                    <option value="{{$jenis_rapat->id_jenisrapat}}"{{$selected_jenis_rapat == $jenis_rapat->id_jenisrapat ? 'selected="selected"' : ''}}>{{$jenis_rapat->nama_jenisrapat}}</option>
                    @endforeach        
                </select>
            </div>
            <div class="form-group">
                <label for="agenda_rapat">Agenda Rapat</label><br>
                <textarea id="agenda_rapat" name="agenda_rapat" >{{$rapat->agenda_rapat}}</textarea>
            </div>
            <div class="form-group">
                <label for="hasil_rapat">Hasil Rapat</label><br>
                <textarea id="hasil_rapat" name="hasil_rapat" >{{$rapat->hasil_rapat}}</textarea>            
            </div>
        	<hr>

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

@include('script.sidebarjs')


@endsection