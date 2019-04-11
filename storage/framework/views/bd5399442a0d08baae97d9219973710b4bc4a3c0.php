<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
	<?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <h2>Edit Data Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="/ekskul/<?php echo e($ekskul->id_ekskul); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_ekskul">Nama Ekstrakurikuler</label><br>
        		<input type="text" id="nama_ekskul" name="nama_ekskul" value="<?php echo e($ekskul->nama_ekskul); ?>" />
        	</div>
            <div class="form-group">
                <label for="deskripsi_ekskul">Visi dan Misi</label><br>
                <textarea id="deskripsi_ekskul" name="deskripsi_ekskul"><?php echo e($ekskul->deskripsi_ekskul); ?></textarea>
            </div>
            <div class="form-group">
                <label for="logo_ekskul">Logo Ekstrakurikuler</label><br>
                <input type="file" id="logo_ekskul" name="logo_ekskul"  value="<?php echo e($ekskul->logo_ekskul); ?>"/>
            </div>
            <div class="form-group">
                <label for="foto_ekskul">Foto Ekstrakurikuler</label><br>
                <input type="file" id="foto_ekskul" name="foto_ekskul"  value="<?php echo e($ekskul->foto_ekskul); ?>"/>
            </div>
            <div class="form-group">
                <label for="jenis_ekskul_id">Jenis Ekstrakurikuler</label><br>
                <select id="jenisekskul_id" name="jenis_ekskul_id">
                    <?php $__currentLoopData = $jenis_ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jenis_ekskul->id_jenisekskul); ?>"<?php echo e($selected_jenis_ekskul == $jenis_ekskul->id_jenisekskul ? 'selected="selected"' : ''); ?>><?php echo e($jenis_ekskul->nama_jenisekskul); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        	<hr>

            <input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Update</button>
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