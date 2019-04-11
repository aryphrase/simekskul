@extends('layout.master')

@section('content')
<div class="wrapper">
    
	@include('layout.sidebar')
	
	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <br>
        <p style="padding-top:20px;">berikut adalah daftar program kerja dan kegiatan dari ekstrakurikuler</p>
        <hr>
        <div class="row">
        	<div class="col col-md-4 col-sm-12">
		        <div class="horizontal-card">
		        	<a href="#">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>OSIS</h4>
					</a>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Paskibra</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Basket</h4>
		        </div>
		    </div>
		    <div class="col col-md-4 col-sm-12">
		        <div class="horizontal-card">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Sepak Bola / Futsal</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>MTQ</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Pecinta Alam</h4>
		        </div>
		    </div>
		    <div class="col col-md-4 col-sm-12">
		        <div class="horizontal-card">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Otaku</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="{{ URL::asset('assets/images/profile.jpg') }}" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Teater</h4>
		        </div>
		    </div>
		</div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')


@endsection