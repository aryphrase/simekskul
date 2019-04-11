@extends('layout.master')

@section('content')
<body class="gradient-green" style="overflow: hidden;">

	<div class="container" style="text-align:center;">
		<img style="width:23%;padding-top:10%;" src="{{ URL::asset('assets/images/ilustration403.png') }}">
		<br><br>
		<p style="color:#fff;font-size:36px;">Ah, Tidak!</p><br>
		<p style="color:#fff;font-size:16px;">Anda tidak diizinkan untuk mengakses halaman ini.</p><br>
		<button class="border"><a href="{{ URL::to('/') }}">KEMBALI</a></button>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
@endsection