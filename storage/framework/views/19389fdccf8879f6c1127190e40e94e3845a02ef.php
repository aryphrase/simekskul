<?php $__env->startSection('content'); ?>
<body class="gradient-green" style="overflow: hidden;">
	<div class="register-page">
		<div class="form">
			<div class="brand">Simekskul Smaracatur</div>
			
			<?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
        	<?php endif; ?>
	    	<form class="register-form" action="<?php echo e(url('/registerPost')); ?>" method="post">
	    		<?php echo e(csrf_field()); ?>

	      		<input type="text" class="form-control" id="name" name="name" placeholder="username"/>
	      		<input type="password" class="form-control" id="password" name="password" placeholder="password"/>
	      		<input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="password"/>
	      		<input type="email" class="form-control" id="email" name="email" placeholder="email address"/>
	      		<button type="submit">buat akun</button>
	      		<button type="reset">batal</button>
	      		<p class="message">Sudah mendaftar? silahkan <a href="<?php echo e(URL::to('login')); ?>">masuk</a></p>
	    	</form>

	  	</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>