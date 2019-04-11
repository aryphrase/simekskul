<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <?php $__currentLoopData = $pemasukan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemasukan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row" style="padding:30px 0px">
			<div class="col col-md-8 col-sm-12">
				<h3><?php echo e($pemasukan->item_pemasukan); ?></h3>
				<br>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Sumber Pendanaan</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($pemasukan->nama_sumberpemasukan); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Tertanggal</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($pemasukan->tanggal_pemasukan); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Nominal</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($pemasukan->nominal_pemasukan); ?></p>
				</div>
				<br><hr>
				<div class="col col-md-3 col-sm-3">
					<p><strong>Penanggung Jawab</strong></p>
				</div>
				<div class="col col-md-5 col-sm-5">
					<p><?php echo e($pemasukan->pic_pemasukan); ?></p>
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
<script type="text/javascript">
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	    acc[i].addEventListener("click", function() {
	        /* Toggle between adding and removing the "active" class,
	        to highlight the button that controls the panel */
	        this.classList.toggle("active");

	        /* Toggle between hiding and showing the active panel */
	        var panel = this.nextElementSibling;
	        if (panel.style.display === "block") {
	            panel.style.display = "none";
	        } else {
	            panel.style.display = "block";
	        }
	    });
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>