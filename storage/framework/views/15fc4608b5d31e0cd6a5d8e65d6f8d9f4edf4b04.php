<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Silahkan Mendaftar Ekstrakurikuler, disini ...</h2>
        <hr>
        <form class="edit-form" action="<?php echo e(url('/pendaftaran')); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
        		<input type="hidden" name="siswa_id" value="<?php echo e($siswa->id_siswa); ?>">
        	</div>
        	<div class="form-group<?php echo e($errors->has('ekskul_id') ? 'has-error' : ''); ?>">
        		<label for="ekskul_id">Ekstrakurikuler yang dipilih</label><br>
        		<select id="ekskul_id" name="ekskul_id" >
                    <?php $__currentLoopData = $ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ekskul->id_ekskul); ?>"><?php echo e($ekskul->nama_ekskul); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
        	</div>
        	<div class="form-group<?php echo e($errors->has('alasan_bergabung') ? 'has-error' : ''); ?>">
        		<label for="alasan_bergabung">Alasan Bergabung</label><br>
        		<textarea id="alasan_bergabung" name="alasan_bergabung" placeholder="Tuliskan alasan, motivasi dan tujuan anda bergabung..."></textarea>
        	</div>
        	<hr>

        	<input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
        	<input type="hidden" name="statusanggota_id" value="2">
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