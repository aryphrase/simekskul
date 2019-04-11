<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Pembina Ekstrakurikuler</h2>
        <hr>

        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <a style="color:#fff;" href="<?php echo e(url('/pembinaan/create')); ?>">Tambah Pembina Ekstrakurikuler</a>
        </button>
        <br><br>

        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th style="width:2%;">No</th>
        			<th style="width:5%;">Nama</th>
        			<th style="width:8%;">Ekstrakurikuler</th>
                    <?php if($jenis == 1): ?>
        			<th colspan="2" style="width:10%;">Action</th>
                    <?php endif; ?>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $pembinaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembinaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($pembinaan->nama_pembina); ?></td>
        			<td><?php echo e($pembinaan->nama_ekskul); ?></td>
                    <?php if($jenis == 1): ?>
                    <td>
                      <?php echo Form::open(array('route'=>['pembinaan.destroy',$pembinaan->id_pembinaan],'method'=>'DELETE')); ?>

                          
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

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>