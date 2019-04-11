@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')
	
	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Asah Minat dan Bakatmu, dimulai dari sini ...</h2>
        <hr>
        <p>Formulir ini diperuntukkan untuk pendaftaran ekstrakurikuler di SMA Negeri 4 Surakarta. Formulir ini digunakan untuk mendaftar satu ekstrakurikuler saja</p>
        <form class="edit-form" action="" method="post">
        	<div class="form-group">
        		<label for="nama_siswa">Nama</label><br>
        		<p id="nama_siswa">Ary Prasetyo</p>
        	</div>
        	<div class="form-group">
        		<label for="kelas_siswa">Kelas</label><br>
        		<p>X MIA 1</p>
        	</div>
        	<div class="form-group">
                <label for="ekskul_id">Ekstrakurikuler yang dipilih</label><br>
                <select id="ekskul_id" name="ekskul_id" required>
                    <option value="Paskibra">Paskibra</option>        
                    <option value="OSIS">OSIS</option>      
                    <option value="Karya Ilmiah Remajan">Karya Ilmiah Remaja</option>
                    <option value="Basket">Basket</option>    
                    <option value="Kerohanian Islam">Kerohanian Islam</option>        
                </select>
            </div>
            <div class="form-group">
                <label for="alasan_bergabung">Alasan</label><br>
                <textarea id="alasan_bergabung" name="alasan_bergabung" required ></textarea>
            </div>
        	<hr>
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