<nav id="sidebar" class="scroll">
        <div class="sidebar-header">
            <h3><a href="{{ URL::to('/') }}" style="color:#fff;">Simekskul</a></h3>
        </div>
		
        <div style="background-color:#612496;padding:10px;">
        	<p><strong>Anda Login Sebagai</strong></p><br>
        	<p>{{$name}}<br> 
        	@foreach($jenisapa as $jenisapa)
        		<small>{{ $jenisapa->nama_jenisuser }}</small>
        	@endforeach
        	</p>
        </div>

        <button><a href="{{ url('/halamanutama')}}">Dasbor</a></button>

        @if($jenis == 1)  
        <button class="accordion">Pengguna</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		@if($jenis == 1)
		  		<li><a href="{{ url('/pengguna') }}">Daftar Pengguna</a></li>
		  		@endif
		  		<li><a href="{{ URL::to('siswa') }}">Daftar Siswa</a></li>
		  		<li><a href="{{ URL::to('pembina') }}">Daftar Guru</a></li>
		  	</ul>
		</div>
		@endif

		@if(($jenis == 1) || ($jenis == 2) || ($jenis == 4))
		<button class="accordion">Keanggotaan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		@if ($jenis == 1)
		  		<li><a href="{{ url('/keanggotaan')}}">Daftar Anggota</a></li>
		  		<li><a href="#">Cetak Daftar Anggota</a></li>
		  		@endif
		  		@if ($jenis == 2)
		  		<li><a href="{{ url('/keanggotaan')}}">Daftar Pendaftar</a></li>
		  		<li><a href="#">Cetak Daftar Pendaftar</a></li>
		  		@endif
		  		@if($jenis == 4)
		  		<li><a href="{{ url('/keanggotaan/pendaftaran/create')}}">Borang Pendaftaran</a></li>
		  		<li><a href="{{ url('/keanggotaan/pendaftaran/buktipendaftaran')}}">Cetak Bukti Pendaftaran</a></li>
		  		@endif
		  	</ul>
		</div>
		@endif

		<button class="accordion">Data Ekstrakurikuler</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		@if($jenis == 1)
		  		<li><a href="{{ url('/ekskul')}}">Daftar Ekstrakurikuler</a></li>
		  		<li><a href="{{ url('/pembinaan')}}">Daftar Pembina</a></li>
		  		<li><a href="{{ url('/keanggotaan')}}">Anggota Ekstrakurikuler</a></li>
				<li><a href="{{ url('/proker')}}">Daftar Proker</a></li>
				<li><a href="{{ url('/laporan')}}">Laporan Kegiatan</a></li>
				<li><a href="{{ url('/keuangan')}}">Data Kas</a></li>
				<li><a href="{{ url('/rapat')}}">Daftar Rapat</a></li>
		  		@elseif($jenis == 2)
		  		<li><a href="{{ url('/keanggotaan')}}">Pengelolaan Anggota</a></li>
		  		<li><a href="#">Cetak Daftar Anggota</a></li>
		  		@elseif($jenis == 3) 
		  		<li><a href="{{ url('/ekskul')}}">Daftar Ekstrakurikuler</a></li>
				<li><a href="{{ url('/keanggotaan')}}">Anggota Ekstrakurikuler</a></li>
				<li><a href="{{ url('/proker')}}">Daftar Proker</a></li>
				<li><a href="{{ url('/laporan')}}">Laporan Kegiatan</a></li>
				<li><a href="{{ url('/keuangan')}}">Data Kas</a></li>
				<li><a href="{{ url('/rapat')}}">Daftar Rapat</a></li>
				@elseif($jenis == 4)
				<li><a href="{{ url('/ekskul')}}">Daftar Ekstrakurikuler</a></li>
				<li><a href="{{ url('/keanggotaan')}}">Anggota Ekstrakurikuler</a></li>
		  		@endif
		  	</ul>
		</div>

		<!-- @if($jenis != 2)
		<button class="accordion">Penilaian</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		@if($jenis == 3)
		  		<li><a href="{{ url('/penilaian/create')}}">Borang Masukan Nilai</a></li>
		  		@endif
		  		<li><a href="#">Daftar Nilai</a></li>
		  		@if(($jenis == 1) || ($jenis == 3))
		  		<li><a href="#">Cetak Daftar Nilai</a></li>
		  		@endif
		  	</ul>
		</div>
		@endif -->

		@if($jenis == 2)
		<button class="accordion">Proker dan Kegiatan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		@if($jenis == 2)
		  		<li><a href="{{ url('/proker/create')}}">Borang Masukan Proker</a></li>
		  		<li><a href="{{ url('/laporan/create')}}">Buat Laporan Kegiatan</a></li>
		  		<li><a href="{{ url('/proposal/create')}}">Buat Proposal Kegiatan</a></li>
		  		<li><a href="{{ url('/proker')}}">Daftar Proker</a></li>
		  		<li><a href="{{ url('/proposal')}}">Daftar Proposal</a></li>
		  		<li><a href="{{ url('/laporan')}}">Daftar Laporan Kegiatan</a></li>
		  		@endif
		  	</ul>
		</div>
		@endif

		@if($jenis == 2)
		<button class="accordion">Kas</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="{{ url('/keuangan')}}">Data Kas</a></li>
		  		<li><a href="{{ url('/keuangan/pemasukan/create')}}">Input Pemasukan Kas</a></li>
		  		<li><a href="{{ url('/keuangan/pengeluaran/create')}}">Input Pengeluaran Kas</a></li>
		  	</ul>
		</div>
		@endif

		@if($jenis == 2)
		<button class="accordion">Rapat</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="{{ url('/rapat/create')}}">Buat Notulen Rapat</a></li>
		  		<li><a href="{{ url('/rapat')}}">Daftar Rapat</a></li>
		  		<li><a href="#">Cetak Notulen Rapat</a></li>
		  	</ul>
		</div>
		@endif

		@if($jenis == 1)
		<button class="accordion">Setelan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="{{ url('/sekolah/1/edit')}}">Ubah Data Sekolah</a></li>
		  	</ul>
		</div>
		@endif

		<button><a href="{{ url('/logout')}}">Logout</a></button>

	</nav>