@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        @foreach($ekskul as $ekskul)
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-2 col-sm 12">
				<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:64px;" alt=""><br>
				<h4>{{$ekskul->nama_ekskul}}</h4><br>
				<p>{{$ekskul->nama_jenisekskul}}</p>
			</div>
			<div class="col col-md-8 col-sm-12">
				<h3>Informasi Dasar</h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Deskripsi</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$ekskul->deskripsi_ekskul}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Didirikan</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>-</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Visi</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>-</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Misi</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>-</p>
				</div>
				<br><hr>
				<h3>Pembina Ekstrakurikuler</h3>
				<br>
				<div style="overflow-x: auto;">
					<table>
						<tr>
							<th>No</th>
							<th>Pembina</th>
						</tr>
						@foreach($pembinaan as $pembinaan)
						<tr>
							<td>1</td>
							<td>{{$pembinaan->nama_pembina}}</td>
						</tr>
						@endforeach
					</table>
				</div>
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