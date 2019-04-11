<?php $__env->startSection('content'); ?>
<div class="wrapper">

	<?php echo $__env->make('sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <br>
        <p style="padding-top:20px;">berikut adalah daftar program kerja dan kegiatan dari ekstrakurikuler</p>
        <hr>
        <div class="row">
        	<div class="col col-md-4 col-sm-12">
		        <div class="horizontal-card">
		        	<a href="#">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>OSIS</h4>
					</a>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Paskibra</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Basket</h4>
		        </div>
		    </div>
		    <div class="col col-md-4 col-sm-12">
		        <div class="horizontal-card">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Sepak Bola / Futsal</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>MTQ</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Pecinta Alam</h4>
		        </div>
		    </div>
		    <div class="col col-md-4 col-sm-12">
		        <div class="horizontal-card">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Otaku</h4>
		        </div>
		        <div class="horizontal-card">
					<img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:48px;" alt="">&nbsp;&nbsp;&nbsp;<h4>Teater</h4>
		        </div>
		    </div>
		</div>
    </div>
</div>

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
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>