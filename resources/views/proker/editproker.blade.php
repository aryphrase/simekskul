@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Program Kerja</h2>
        <hr>
        <form class="edit-form" action="/proker/{{$proker->id_proker}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_proker">Nama Program Kerja</label><br>
        		<input type="text" id="nama_proker" name="nama_proker" value="{{$proker->nama_proker}}"/>
        	</div>
            <div class="form-group">
                <label for="deskripsi_proker">Deskripsi</label><br>
                <textarea id="deskripsi_proker" name="deskripsi_proker">{{$proker->deskripsi_proker}}</textarea>
            </div>
            <div class="form-group">
                <label for="frekuensi_proker_id">Frekuensi Program Kerja</label><br>
                <select id="frekuensi_proker_id" name="frekuensi_proker_id" >
                    @foreach($frek_proker as $frek)
                    <option value="{{$frek->id_frekuensiproker}}"{{$selected_frek_proker == $frek->id_frekuensiproker ? 'selected="selected"' : ''}}>{{$frek->nama_frekuensiproker}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="waktu_proker">Waktu</label><br>
                <input type="date" id="waktu_proker" name="waktu_proker" value="{{$proker->waktu_proker}}"/>
            </div>
            <div class="form-group">
                <label for="tempat_proker">Tempat Penyelanggaraan</label><br>
                <input type="text" id="tempat_proker" name="tempat_proker" value="{{$proker->tempat_proker}}"/>
            </div>
            <div class="form-group">
                <label for="jenis_proker_id">Jenis Program Kerja</label><br>
                <select id="jenis_proker_id" name="jenis_proker_id" >
                	@foreach($jenis_proker as $jenis_proker)
                    <option value="{{$jenis_proker->id_jenisproker}}"{{$selected_jenis_proker == $jenis_proker->id_jenisproker ? 'selected="selected"' : ''}}>{{$jenis_proker->nama_jenisproker}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="target_proker">Target Peserta</label><br>
                <input type="text" id="target_proker" name="target_proker" value="{{$proker->target_proker}}" />
            </div>
            <div class="form-group">
                <label for="anggaran_proker">Rencana Anggaran</label><br>
                <textarea id="anggaran_proker" name="anggaran_proker">
                    {!! $proker->anggaran_proker !!}
                </textarea>
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