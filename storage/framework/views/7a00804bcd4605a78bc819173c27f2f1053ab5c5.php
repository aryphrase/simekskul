<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Siswa</h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th style="width:2%;">No</th>
        			<th style="width:20%;">Nama</th>
        			<th style="width:8%;">Kelas</th>
                    <th style="width:30%;">Alamat</th>
        			<th style="width:10%;">Nomor HP Siswa</th>
        			<th style="width:10%;">Nomor HP Orang Tua</th>
        			<th colspan="3" style="width:10%;">Action</th>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($siswa->nama_siswa); ?></td>
        			<td><?php echo e($siswa->nama_kelas); ?></td>
                    <td><?php echo e($siswa->alamat_siswa); ?></td>
        			<td><?php echo e($siswa->nomorhp_siswa); ?></td>
        			<td><?php echo e($siswa->nomorhp_ayah); ?></td>
        			<td>
        				<button class="btn btn-success"><a href="<?php echo e(url('/siswa/'.$siswa->id_siswa.'/show')); ?>" style="color:#fff;">Lihat Profil</a></button>
        			</td>
                    <?php if($jenis == 1): ?>
                    <td><?php echo e(link_to_route('siswa.edit','Edit',[$siswa->id_siswa],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td>
                      <?php echo Form::open(array('route'=>['siswa.destroy',$siswa->id_siswa],'method'=>'DELETE')); ?>

                          
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