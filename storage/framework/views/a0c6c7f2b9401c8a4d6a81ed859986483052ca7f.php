<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Sistem Informasi Ekstrakurikuler SMA Negeri 4 Surakarta - <?php echo $__env->yieldContent('title'); ?></title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,800,900">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

		<!-- Bootstrap -->
		<link href="<?php echo e(URL::asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/css/bootstrap.css')); ?>" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('assets/css/style.css')); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('assets/css/login.css')); ?>">

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

		<?php if($jenis == 1): ?>
			<?php echo $__env->make('script.chart1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php elseif($jenis == 2): ?>
			<?php echo $__env->make('script.chart2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php elseif($jenis == 4): ?>
			<?php echo $__env->make('script.chart4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
		
	</head>
	<body>
		
		<?php echo $__env->yieldContent('nav'); ?>

		<?php echo $__env->yieldContent('content'); ?>
	
	</body>
</html>