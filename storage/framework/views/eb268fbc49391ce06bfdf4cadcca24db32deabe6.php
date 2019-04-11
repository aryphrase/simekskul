<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Guru</h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th style="width:5%">No</th>
        			<th style="width:20%">Nama</th>
        			<th style="width:40%">Alamat</th>
        			<th style="width:5%">Nomor HP</th>
        			<th style="width:10%" colspan="3">Action</th>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $pembina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($pembina->nama_pembina); ?></td>
        			<td><?php echo e($pembina->alamat_pembina); ?></td>
        			<td><?php echo e($pembina->nomorhp_pembina); ?></td>
                    <td>
                        <button class="btn btn-success"><a href="<?php echo e(url('/pembina/'.$pembina->id_pembina.'/show')); ?>" style="color:#fff;">Lihat Profil</a></button>
                    </td>
                    <?php if($jenis == 1): ?>
        			<td><?php echo e(link_to_route('pembina.edit','Edit',[$pembina->id_pembina],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td>
                      <?php echo Form::open(array('route'=>['pembina.destroy',$pembina->id_pembina],'method'=>'DELETE')); ?>

                          
                        <?php echo Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']); ?>

                      <?php echo Form::close(); ?> 
                    </td>
                    <?php endif; ?>
        		</tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</table>
        </div>
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