<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <?php $__currentLoopData = $proker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-8 col-sm-12">
				<h3><?php echo e($proker->nama_proker); ?></h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Jenis Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($proker->nama_jenisproker); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Deskripsi Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($proker->deskripsi_proker); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Frekuensi Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($proker->nama_frekuensiproker); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Target Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($proker->target_proker); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Anggaran Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($proker->anggaran_proker); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Status Proker</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($proker->nama_statusproker); ?></p>
				</div>
				<br><hr>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>