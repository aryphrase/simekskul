<?php $__env->startSection('content'); ?>
<body class="gradient-green" style="overflow: hidden;">

	<div class="container" style="text-align:center;">
		<img style="width:30%;padding-top:10%;" src="<?php echo e(URL::asset('assets/images/ilustration404.png')); ?>">
		<br><br>
		<p style="color:#fff;font-size:36px;">Kami tidak menemukan apa yang anda cari</p>
		<p style="color:#fff;font-size:16px;">Halaman mungkin telah berpindah alamat, tidak pernah ada atau dihapus</p><br>
		<button class="border"><a href="<?php echo e(URL::to('/')); ?>">KEMBALI</a></button>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>