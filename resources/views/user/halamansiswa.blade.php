@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        @foreach($siswa as $siswa)
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-2 col-sm 12">
				<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:64px;" alt=""><br>
				<h4>{{$siswa->nama_siswa}}</h4><br>
				<p>{{$siswa->nama_kelas}}</p>
			</div>
			<div class="col col-md-8 col-sm-12">
				<h3>Informasi Dasar</h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Nama Ayah</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$siswa->nama_ayah}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Nama Ibu</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$siswa->nama_ibu}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Alamat</strong></p>
				</div>
				<div class="col col-md-7 col-sm-5">
					<p>{{$siswa->alamat_siswa}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Alamat Ayah</strong></p>
				</div>
				<div class="col col-md-7 col-sm-5">
					<p>{{$siswa->alamat_ayah}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Alamat Ibu</strong></p>
				</div>
				<div class="col col-md-7 col-sm-5">
					<p>{{$siswa->alamat_ibu}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Nomor HP</strong></p>
				</div>
				<div class="col col-md-7 col-sm-5">
					<p>{{$siswa->nomorhp_siswa}} ({{$siswa->nama_siswa}})<br>{{$siswa->nomorhp_ayah}} (Bapak {{$siswa->nama_ayah}})<br>{{$siswa->nomorhp_ibu}} (Ibu {{$siswa->nama_ibu}})</p>
				</div>
				<br><br><br><br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Akun Instagram</strong></p>
				</div>
				<div class="col col-md-7 col-sm-5">
					<p>{{$siswa->ig_siswa}}</p>
				</div>
				<br><hr>
		
				<h3>Ekstrakurikuler yang diikuti</h3>
				<br>
				<div style="overflow-x: auto;">
					<table>
						<tr>
							<th>No</th>
							<th>Ekstrakurikuler</th>
							<th>Jabatan</th>
							<th>Nilai</th>
						</tr>
						<? $i=0; ?>
						@foreach($keanggotaan as $keanggotaan)
						<? $++; ?>
						<tr>
							<td>1</td>
							<td>{{$keanggotaan->nama_ekskul}}</td>
							<td>{{$keanggotaan->jabatan}}</td>
							<td>A</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			@endforeach
		</div>
	</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')

@endsection