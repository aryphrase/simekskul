@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Pembina Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="/pembina/{{$pembina->id_pembina}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_pembina">Nama</label><br>
        		<input type="text" id="nama_pembina" name="nama_pembina"  value="{{$pembina->nama_pembina}}"/>
        	</div>
            <div class="form-group">
                <label for="foto_pembina">Foto</label><br>
                <input type="file" id="foto_pembina" name="foto_pembina"  value="{{$pembina->foto_pembina}}"/>
            </div>
        	<div class="form-group">
    			<div class="row">
    				<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tempatlahir_pembina">Tempat Lahir</label><br>
		        		<input type="text" id="tempatlahir_pembina" name="tempatlahir_pembina"  value="{{$pembina->tempatlahir_pembina}}"/>
		        	</div>
		        	<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tanggallahir_pembina">Tanggal Lahir</label><br>
		        		<input type="date" id="tanggallahir_pembina" name="tanggallahir_pembina"  value="{{$pembina->tanggallahir_pembina}}"/>
		        	</div>
	        	</div>
        	</div>
            <div class="form-group">
                <label for="alamat_pembina">Alamat</label><br>
                <input type="text" id="alamat_pembina" name="alamat_pembina"  value="{{$pembina->alamat_pembina}}"/>
            </div>
            <div class="form-group">
                <label for="nomorhp_pembina">Nomor HP</label><br>
                <input type="text" id="nomorhp_pembina" name="nomorhp_pembina"  value="{{$pembina->nomorhp_pembina}}"/>
            </div>
        	<div class="form-group">
        		<label for="ig_pembina">Akun Instagram</label><br>
        		<input type="text" id="ig_pembina" name="ig_pembina" value="{{$pembina->ig_pembina}}"/>
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