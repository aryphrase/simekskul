@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        @foreach($pengeluaran as $pengeluaran)
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-8 col-sm-12">
				<h3>{{$pengeluaran->item_pengeluaran}}</h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Jenis</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pengeluaran->nama_jenispengeluaran}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Tertanggal</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pengeluaran->tanggal_pengeluaran}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Jumlah</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pengeluaran->jumlah_item}}&nbsp;{{$pengeluaran->nama_satuanitem}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Harga Satuan</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pengeluaran->harga_satuan}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Nominal Pengeluaran</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pengeluaran->nominal_pengeluaran}}</p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Penanggung Jawab</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p>{{$pengeluaran->pic_pengeluaran}}</p>
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
<script type="text/javascript">
	$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

});
</script>

@include('script.sidebarjs')


@endsection