<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <h2>Edit Data Rapat</h2>
        <hr>
        <form class="edit-form" action="/rapat/<?php echo e($rapat->id_rapat); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_rapat">Nama Rapat</label><br>
        		<input type="text" id="nama_rapat" name="nama_rapat" value="<?php echo e($rapat->nama_rapat); ?>" />
        	</div>
            <div class="form-group">
                <label for="peserta_rapat">Peserta</label><br>
               <textarea id="peserta_rapat" name="peserta_rapat" ><?php echo e($rapat->peserta_rapat); ?></textarea>
            </div>
            <div class="form-group">
                <label for="tempat_rapat">Tempat</label><br>
                <input type="text" id="tempat_rapat" name="tempat_rapat" value="<?php echo e($rapat->tempat_rapat); ?>" />
            </div>
            <div class="form-group">
                <div class="row">
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="tanggal_rapat">Tanggal</label><br>
                        <input type="text" id="tanggal_rapat" name="tanggal_rapat" value="<?php echo e($rapat->tanggal_rapat); ?>" />
                    </div>
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="waktumulai_rapat">Waktu Mulai</label><br>
                        <input type="time" id="waktumulai_rapat" name="waktumulai_rapat" value="<?php echo e($rapat->waktumulai_rapat); ?>" />
                    </div>
                    <div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
                        <label for="waktuselesai_rapat">Waktu Selesai</label><br>
                        <input type="time" id="waktuselesai_rapat" name="waktuselesai_rapat" value="<?php echo e($rapat->waktuselesai_rapat); ?>" />
                    </div>
                </div>
            </div>
           <div class="form-group">
                <label for="jenis_rapat_id">Jenis Rapat</label><br>
                <select id="jenis_rapat_id" name="jenis_rapat_id" >
                    <?php $__currentLoopData = $jenis_rapat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_rapat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jenis_rapat->id_jenisrapat); ?>"<?php echo e($selected_jenis_rapat == $jenis_rapat->id_jenisrapat ? 'selected="selected"' : ''); ?>><?php echo e($jenis_rapat->nama_jenisrapat); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
            <div class="form-group">
                <label for="agenda_rapat">Agenda Rapat</label><br>
                <textarea id="agenda_rapat" name="agenda_rapat" ><?php echo e($rapat->agenda_rapat); ?></textarea>
            </div>
            <div class="form-group">
                <label for="hasil_rapat">Hasil Rapat</label><br>
                <textarea id="hasil_rapat" name="hasil_rapat" ><?php echo e($rapat->hasil_rapat); ?></textarea>            
            </div>
        	<hr>

            <input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                <button class="btn .btn-danger danger" type="reset">Batal</button>
        	</div>
        </form>
    </div>
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