<?php $__env->startSection('content'); ?>
<body class="gradient-green" style="overflow: hidden;">
		<div class="login-page">
			<div class="form">
				<div class="brand">Simekskul Smaracatur</div>
		    	<?php if(\Session::has('alert')): ?>
				    <div class="alert alert-danger">
				        <div><?php echo e(Session::get('alert')); ?></div>
				    </div>
				<?php endif; ?>
				<?php if(\Session::has('alert-success')): ?>
				    <div class="alert alert-success">
				        <div><?php echo e(Session::get('alert-success')); ?></div>
				    </div>
				<?php endif; ?>
		    	<form class="login-form" action="<?php echo e(url('/loginPost')); ?>" method="post">
		    		<?php echo e(csrf_field()); ?>

		      		<input type="text" placeholder="username"/>
		      		<input type="password" placeholder="password"/>
		      		<button type="submit">masuk</button>
		      		<p class="message">Belum memiliki akun? <a href="<?php echo e(url('register')); ?>">Buat disini</a></p>
		    	</form>
		  	</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>	
    	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>