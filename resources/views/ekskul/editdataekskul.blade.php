@extends('layout.master')

@section('content')
<div class="wrapper">
    
	@include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="/ekskul/{{$ekskul->id_ekskul}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_ekskul">Nama Ekstrakurikuler</label><br>
        		<input type="text" id="nama_ekskul" name="nama_ekskul" value="{{$ekskul->nama_ekskul}}" />
        	</div>
            <div class="form-group">
                <label for="deskripsi_ekskul">Visi dan Misi</label><br>
                <textarea id="deskripsi_ekskul" name="deskripsi_ekskul">{{$ekskul->deskripsi_ekskul}}</textarea>
            </div>
            <div class="form-group">
                <label for="logo_ekskul">Logo Ekstrakurikuler</label><br>
                <input type="file" id="logo_ekskul" name="logo_ekskul"  value="{{$ekskul->logo_ekskul}}"/>
            </div>
            <div class="form-group">
                <label for="foto_ekskul">Foto Ekstrakurikuler</label><br>
                <input type="file" id="foto_ekskul" name="foto_ekskul"  value="{{$ekskul->foto_ekskul}}"/>
            </div>
            <div class="form-group">
                <label for="jenis_ekskul_id">Jenis Ekstrakurikuler</label><br>
                <select id="jenisekskul_id" name="jenis_ekskul_id">
                    @foreach($jenis_ekskul as $jenis_ekskul)
                    <option value="{{$jenis_ekskul->id_jenisekskul}}"{{$selected_jenis_ekskul == $jenis_ekskul->id_jenisekskul ? 'selected="selected"' : ''}}>{{$jenis_ekskul->nama_jenisekskul}}</option>
                    @endforeach
                </select>
            </div>
        	<hr>

            <input type="hidden" name="user_id" value="{{$auth}}">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Update</button>
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