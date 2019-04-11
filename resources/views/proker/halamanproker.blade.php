@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        @foreach($proker as $proker)
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-8 col-sm-12">
				<h3>{{$proker->nama_proker}}</h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Jenis Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$proker->nama_jenisproker}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Deskripsi Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$proker->deskripsi_proker}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Frekuensi Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$proker->nama_frekuensiproker}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Target Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$proker->target_proker}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Anggaran Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$proker->anggaran_proker}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Status Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$proker->nama_statusproker}}</p>
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