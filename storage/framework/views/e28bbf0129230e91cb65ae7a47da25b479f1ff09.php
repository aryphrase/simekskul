<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Keanggotaan Ekstrakurikuler</h2>
        <hr>

        <form class="edit-form" action="/updatedatakeanggotaan/<?php echo e($keanggotaan->id_keanggotaan); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <?php if(count($errors)): ?>
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br/>
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              </div>
            <?php endif; ?>

            <div class="form-group<?php echo e($errors->has('siswa_id') ? 'has-error' : ''); ?>">
                <label for="siswa_id">Nama Siswa</label><br>
                <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($siswa->nama_siswa); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> 
            <div class="form-group<?php echo e($errors->has('ekskul_id') ? 'has-error' : ''); ?>">
                <label for="ekskul_id">Ekstrakurikuler yang dipilih</label><br>
                <?php $__currentLoopData = $ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($ekskul->nama_ekskul); ?></p>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="form-group<?php echo e($errors->has('statusanggota_id') ? 'has-error' : ''); ?>">
                <label for="statusanggota_id">Status Keanggotaan</label><br>
                <select id="statusanggota_id" name="statusanggota_id" >
                    <?php $__currentLoopData = $statusanggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusanggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($statusanggota->id_statusanggota); ?>"<?php echo e($selected_statusanggota == $statusanggota->id_statusanggota ? 'selected="selected"' : ''); ?>><?php echo e($statusanggota->nama_statusanggota); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label><br>
                <input type="text" id="jabatan" name="jabatan" value="<?php echo e($keanggotaan->jabatan); ?>" />
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

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>