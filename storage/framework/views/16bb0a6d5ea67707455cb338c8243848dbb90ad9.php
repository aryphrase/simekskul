<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Notulen Rapat</h2>
        <hr>

        <?php if(session()->has('added')): ?>
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> <?php echo e(session('added')); ?>

            </div>
        <?php elseif(session()->has('edited')): ?>
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> <?php echo e(session('edited')); ?>

            </div>
        <?php endif; ?>

        <div class="search-box">
            <div class="row">
                <div class="col col-md-9 space">
                    &nbsp;
                </div>
                <div class="col col-md-3 space">
                    <form class="search" action="#">
                        <input type="text" placeholder="Cari.." name="search">
                        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Rapat</th>
        			<th>Tempat</th>
        			<th>Waktu</th>
        			<th colspan="4">Action</th>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $rapat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rapat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($rapat->nama_rapat); ?></td>
        			<td><?php echo e($rapat->tempat_rapat); ?></td>
        			<td><?php echo e($rapat->tanggal_rapat); ?> <?php echo e($rapat->waktumulai_rapat); ?> - <?php echo e($rapat->waktuselesai_rapat); ?></td>
        			<td width="5%">
                        <button class="btn btn-success"><a href="<?php echo e(url('/rapat/'.$rapat->id_rapat.'/show')); ?>" style="color:#fff;"><small>Lihat Selengkapnya</small></a></button>
                    </td>
                    <td width="5%"><?php echo e(link_to_route('rapat.cetakpdfsatuan', 'Cetak',[$rapat->id_rapat],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td width="5%"><?php echo e(link_to_route('rapat.edit','Edit',[$rapat->id_rapat],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td width="5%">
                      <?php echo Form::open(array('route'=>['rapat.destroy',$rapat->id_rapat],'method'=>'DELETE')); ?>

                          
                        <?php echo Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']); ?>

                      <?php echo Form::close(); ?> 
                    </td>
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