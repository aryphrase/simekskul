<?php $__env->startSection('content'); ?>
<div class="parallax">
	<div class="container">
		<div class="row">
			<div class="col col-md-6">
				<img class="web-illustration" src="<?php echo e(URL::asset('assets/images/ilustration.png')); ?>" / alt="">
			</div>
			<div class="col col-md-6">
				<div class="caption">
					<h1><strong>Selamat Datang di Simekskul</strong></h1>
					<p>Sistem Informasi Manajemen Ekstrakurikuler<br>gabung segera!</p>
					<button class="border"><a href="#kategori">MEMULAI</a></button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="kategori" style="background-color:white;text-align:center;padding:50px 80px;">
	<div class="photo-grid">
			<div class="row">
				<div class="col col-md-12">
					<h2 style="text-align:center;letter-spacing:2px;padding-bottom:5px;color:#777;">Ekstrakurikuler</h2>
					<hr>
				</div>
				<div class="col col-md-12">
					<p style="text-align:right;font-size:16px;padding-bottom:3px;color:#888;"><a href="<?php echo e(URL::to('ekstrakurikuler')); ?>">Lihat Selengkapnya</a></p>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="<?php echo e(URL::asset('assets/images/rails.jpg')); ?>" alt="">
						<div class="imagcaption"><strong>OSIS</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="<?php echo e(URL::asset('assets/images/park.jpg')); ?>" alt="">
						<div class="imagcaption"><strong>Paskibra</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="<?php echo e(URL::asset('assets/images/traffic.jpg')); ?>" alt="">
						<div class="imagcaption"><strong>Karya Ilmiah Remaja</strong></div>
					</div>
				</div>
				<div class="col col-md-3">
					<div class="lightbox">
						<img style="width:100%;" src="<?php echo e(URL::asset('assets/images/bridge.jpg')); ?>" alt="">
						<div class="imagcaption"><strong>Teater</strong></div>
					</div>
				</div>
			</div>
	</div>
</div>

<span><hr></span>

<div id="informasi">
	<div class="container">
		<div class="row">
			<div class="col col-md-12">
				<h2 style="text-align:center;letter-spacing:2px;padding-bottom:5px;color:#777;">Laporan Kegiatan</h2>
				<hr>
			</div>
			<div class="col-lg-4">
			    <div class="card">
				  	<img src="<?php echo e(URL::asset('assets/images/park.jpg')); ?>" style="width:100%">
				  	<div class="imagcaption">
				  		<p>OSIS</p>
				    	<h4><b>Lomba Cerdas Cermat se-Kota Surakarta</b></h4> 
				    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p> 
				  	</div>
				</div>
			</div>
			<div class="col-lg-4">
			    <div class="card">
				  	<img src="<?php echo e(URL::asset('assets/images/rails.jpg')); ?>" style="width:100%">
				  	<div class="imagcaption">
				    	<p>Pramuka</p>
				    	<h4><b>Jambore di Stadion Manahan</b></h4> 
				    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p> 
				  	</div>
				</div>
			</div>
			<div class="col-lg-4">
			    <div class="card">
				  	<img src="<?php echo e(URL::asset('assets/images/bridge.jpg')); ?>" style="width:100%">
				  	<div class="imagcaption">
				    	<p>Rohis</p>
				    	<h4><b>Tangkal Radikalisme, Rohis Smaracatur Gelar Sosialisasi Bahaya Terorisme</b></h4> 
				    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p> 
				  	</div>
				</div>
			 </div>
			 <div class="col-lg-4">
			    <div class="card">
				  	<img src="<?php echo e(URL::asset('assets/images/traffic.jpg')); ?>" style="width:100%">
				  	<div class="imagcaption">
				  		<p>OSIS</p>
				    	<h4><b>Lomba Cerdas Cermat se-Kota Surakarta</b></h4> 
				    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p> 
				  	</div>
				</div>
			</div>
			<div class="col-lg-4">
			    <div class="card">
				  	<img src="<?php echo e(URL::asset('assets/images/park.jpg')); ?>" style="width:100%">
				  	<div class="imagcaption">
				    	<p>Pramuka</p>
				    	<h4><b>Jambore Provinsi di Stadion Manahan</b></h4> 
				    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p> 
				  	</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>