@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        @foreach($pemasukan as $pemasukan)
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-8 col-sm-12">
				<h3>{{$pemasukan->item_pemasukan}}</h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Sumber Pendanaan</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pemasukan->nama_sumberpemasukan}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Tertanggal</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pemasukan->tanggal_pemasukan}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Nominal</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pemasukan->nominal_pemasukan}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Penanggung Jawab</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pemasukan->pic_pemasukan}}</p>
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