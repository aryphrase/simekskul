<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
	<?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <br>
        <h2>Daftar Laporan Kegiatan</h2>
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
                    <th>Judul Laporan</th>
                    <th>Tanggal Laporan</th>
                    <th colspan="3">Action</th>
                </tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
                <tr>
                    <td><?php echo e($i); ?></td>
                    <td><?php echo e($laporan->judul_laporan); ?></td>
                    <td>a</td>
                    <td width="5%"><?php echo e(link_to_route('laporan.cetakpdfsatuan', 'PDF',[$laporan->id_laporan],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <?php if($jenis == 2): ?>
                    <td width="5%">
                        <?php echo e(link_to_route('laporan.edit','Edit',[$laporan->id_laporan],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td width="5%">
                      
                    </td>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>