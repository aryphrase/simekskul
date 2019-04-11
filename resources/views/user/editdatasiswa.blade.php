@extends('layout.master')

@section('content')
<div class="wrapper">
    
	@include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Siswa</h2>
        <hr>
        <form class="edit-form" action="/siswa/{{$siswa->id_siswa}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_siswa">Nama</label><br>
        		<input type="text" id="nama_siswa" name="nama_siswa" value="{{$siswa->nama_siswa}}"/>
        	</div>
            <div class="form-group">
                <label for="kelas_id">Kelas</label><br>
                <select id="kelas_id" name="kelas_id" >
                    @foreach($kelas as $kelas)
                    <option value="{{$kelas->id_kelas}}"{{$selected_kelas == $kelas->id_kelas ? 'selected="selected"' : ''}}>{{$kelas->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="foto_siswa">Foto</label><br>
                <input type="file" id="foto_siswa" name="foto_siswa" value="{{$siswa->foto_siswa}}"/>
            </div>
        	<div class="form-group">
    			<div class="row">
    				<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tempatlahir_siswa">Tempat Lahir</label><br>
		        		<input type="text" id="tempatlahir_siswa" name="tempatlahir_siswa" value="{{$siswa->tempatlahir_siswa}}"/>
		        	</div>
		        	<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tanggallahir_siswa">Tanggal Lahir</label><br>
		        		<input type="date" id="tanggallahir_siswa" name="tanggallahir_siswa" value="{{$siswa->tanggallahir_siswa}}"/>
		        	</div>
	        	</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
        				<label for="nama_ayah">Nama Ayah</label><br>
        				<input type="text" id="nama_ayah" name="nama_ayah"  value="{{$siswa->nama_ayah}}"/>
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
        				<label for="nama_ibu">Nama Ibu</label><br>
        				<input type="text" id="nama_ibu" name="nama_ibu"  value="{{$siswa->nama_ibu}}"/>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="alamat_siswa">Alamat Siswa</label><br>
        		<input type="text" id="alamat_siswa" name="alamat_siswa" value="{{$siswa->alamat_siswa}}" />
        	</div>
        	<div class="form-group">
        		<label for="alamat_ayah">Alamat Ayah</label><br>
        		<input type="text" id="alamat_ayah" name="alamat_ayah"  value="{{$siswa->alamat_ayah}}"/>
        	</div>
        	<div class="form-group">
        		<label for="alamat_ibu">Alamat Ibu</label><br>
        		<input type="text" id="alamat_ibu" name="alamat_ibu"  value="{{$siswa->alamat_ibu}}"/>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_siswa">Nomor HP Siswa</label><br>
        				<input type="text" id="nomorhp_siswa" name="nomorhp_siswa" value="{{$siswa->nomorhp_siswa}}"/>
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_ayah">Nomor HP Ayah</label><br>
        				<input type="text" id="nomorhp_ayah" name="nomorhp_ayah" value="{{$siswa->nomorhp_ayah}}"/>
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_ibu">Nomor HP Ibu</label><br>
        				<input type="text" id="nomorhp_ibu" name="nomorhp_ibu" value="{{$siswa->nomorhp_ibu}}"/>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="ig_siswa">Akun Instagram</label><br>
        		<input type="text" id="ig_siswa" name="ig_siswa" value="{{$siswa->ig_siswa}}"/>
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