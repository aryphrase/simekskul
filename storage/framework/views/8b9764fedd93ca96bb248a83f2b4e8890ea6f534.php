<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Program Kerja</h2>
        <hr>
        <form class="edit-form" action="/proker/<?php echo e($proker->id_proker); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_proker">Nama Program Kerja</label><br>
        		<input type="text" id="nama_proker" name="nama_proker" value="<?php echo e($proker->nama_proker); ?>"/>
        	</div>
            <div class="form-group">
                <label for="deskripsi_proker">Deskripsi</label><br>
                <textarea id="deskripsi_proker" name="deskripsi_proker"><?php echo e($proker->deskripsi_proker); ?></textarea>
            </div>
            <div class="form-group">
                <label for="frekuensi_proker_id">Frekuensi Program Kerja</label><br>
                <select id="frekuensi_proker_id" name="frekuensi_proker_id" >
                    <?php $__currentLoopData = $frek_proker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($frek->id_frekuensiproker); ?>"<?php echo e($selected_frek_proker == $frek->id_frekuensiproker ? 'selected="selected"' : ''); ?>><?php echo e($frek->nama_frekuensiproker); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="waktu_proker">Waktu</label><br>
                <input type="date" id="waktu_proker" name="waktu_proker" value="<?php echo e($proker->waktu_proker); ?>"/>
            </div>
            <div class="form-group">
                <label for="tempat_proker">Tempat Penyelanggaraan</label><br>
                <input type="text" id="tempat_proker" name="tempat_proker" value="<?php echo e($proker->tempat_proker); ?>"/>
            </div>
            <div class="form-group">
                <label for="jenis_proker_id">Jenis Program Kerja</label><br>
                <select id="jenis_proker_id" name="jenis_proker_id" >
                	<?php $__currentLoopData = $jenis_proker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_proker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jenis_proker->id_jenisproker); ?>"<?php echo e($selected_jenis_proker == $jenis_proker->id_jenisproker ? 'selected="selected"' : ''); ?>><?php echo e($jenis_proker->nama_jenisproker); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="target_proker">Target Peserta</label><br>
                <input type="text" id="target_proker" name="target_proker" value="<?php echo e($proker->target_proker); ?>" />
            </div>
            <div class="form-group">
                <label for="anggaran_proker">Rencana Anggaran</label><br>
                <p>Rp&nbsp;&nbsp;</p><input type="number" id="anggaran_proker" name="anggaran_proker" value="<?php echo e($proker->anggaran_proker); ?>" />
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

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>