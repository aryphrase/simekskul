@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        @foreach($rapat as $rapat)
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-8 col-sm-12">
				<h3>{{$rapat->nama_rapat}}</h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Jenis</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$rapat->nama_jenisrapat}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Tempat</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$rapat->tempat_rapat}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Waktu</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$rapat->tanggal_rapat}}, {{$rapat->waktumulai_rapat}} hingga {{$rapat->waktuselesai_rapat}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Peserta</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$rapat->peserta_rapat}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Agenda Rapat</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$rapat->agenda_rapat}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Hasil Rapat</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$rapat->hasil_rapat}}</p>
				</div>
				<br><hr>
			</div>
		</div>
		@endforeach
	</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')


@endsection