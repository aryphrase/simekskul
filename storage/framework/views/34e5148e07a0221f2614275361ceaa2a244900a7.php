<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

   	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <h2>Daftar Rincian Ekstrakurikuler <?php echo e($name); ?></h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Siswa</th>
        			<th>Nilai</th>
        			<th>Deskripsi</th>
        			<th>Semester</th>
                    <?php if($jenis == 3): ?>
        			<th colspan="2" style="width:5%">Action</th>
                    <?php endif; ?>
        		</tr>
                <?php $i = 0 ?>
        		<?php $__currentLoopData = $penilaian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penilaian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($penilaian->nama_siswa); ?></td>
        			<td><?php echo e($penilaian->nama_nilai); ?></td>
        			<td><?php echo e($penilaian->deskripsi_nilai); ?></td>
                    <td><?php echo e($penilaian->nama_semester); ?></td>
                    <?php if($jenis == 3): ?>
                    <td>
                        <?php echo e(link_to_route('penilaian.edit','Edit',[$penilaian->id_penilaian],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td>
                         <?php echo Form::open(array('route'=>['penilaian.destroy',$penilaian->id_penilaian],'method'=>'DELETE')); ?>

                          
                        <?php echo Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']); ?>

                        <?php echo Form::close(); ?> 
                    </td>
                    <?php endif; ?>
        		</tr>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</table>
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