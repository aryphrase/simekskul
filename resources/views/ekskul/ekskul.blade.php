@extends('layout.master')
@extends('layout.nav')

@section('content')
<div id="kategori" style="background-color:white;text-align:center;padding:50px 80px;">
	<div class="photo-grid">
		<div class="container">
			<div class="row">
				<div class="col col-md-12">
					<h2 style="text-align:center;letter-spacing:2px;padding-bottom:5px;color:#777;">Daftar Ekstrakurikuler<br>SMA Negeri 4 Surakarta</h2>
					<hr>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/rails.jpg') }}" alt="">
						<div class="imagcaption"><strong>OSIS</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/park.jpg') }}" alt="">
						<div class="imagcaption"><strong>Paskibra</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/traffic.jpg') }}" alt="">
						<div class="imagcaption"><strong>Basket</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/bridge.jpg') }}" alt="">
						<div class="imagcaption"><strong>Sepak Bola / Futsal</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/rails.jpg') }}" alt="">
						<div class="imagcaption"><strong>MTQ</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/park.jpg') }}" alt="">
						<div class="imagcaption"><strong>Pecinta Alam</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/traffic.jpg') }}" alt="">
						<div class="imagcaption"><strong>Otaku</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/bridge.jpg') }}" alt="">
						<div class="imagcaption"><strong>Teater</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/rails.jpg') }}" alt="">
						<div class="imagcaption"><strong>Majalah Dinding</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/park.jpg') }}" alt="">
						<div class="imagcaption"><strong>Pramuka</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/traffic.jpg') }}" alt="">
						<div class="imagcaption"><strong>Seni Tari</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/bridge.jpg') }}" alt="">
						<div class="imagcaption"><strong>Seni Musik</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/rails.jpg') }}" alt="">
						<div class="imagcaption"><strong>Keroncong</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/park.jpg') }}" alt="">
						<div class="imagcaption"><strong>Modern Dance</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/traffic.jpg') }}" alt="">
						<div class="imagcaption"><strong>PKS</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/bridge.jpg') }}" alt="">
						<div class="imagcaption"><strong>PMR</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/rails.jpg') }}" alt="">
						<div class="imagcaption"><strong>Karate</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/park.jpg') }}" alt="">
						<div class="imagcaption"><strong>Taekwondo</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/traffic.jpg') }}" alt="">
						<div class="imagcaption"><strong>English Conversation Club</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="{{ URL::asset('assets/images/bridge.jpg') }}" alt="">
						<div class="imagcaption"><strong>Karya Ilmiah Remaja</strong></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection