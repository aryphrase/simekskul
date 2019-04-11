<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
	<?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Lengkapi Data Ekstrakurikuler anda, di sini ...</h2>
        <hr>
        <form class="edit-form" action="<?php echo e(url('/inputdataekskul')); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">

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
                
        	<div class="form-group<?php echo e($errors->has('nama_siswa') ? 'has-error' : ''); ?>">
        		<label for="nama_ekskul">Nama Ekstrakurikuler</label><br>
        		<input type="text" id="nama_ekskul" name="nama_ekskul" required />
                <span class="text-danger"><?php echo e($errors->first('nama_ekskul')); ?></span>
        	</div>
            <div class="form-group">
                <label for="deskripsi_ekskul">Visi dan Misi</label><br>
                <textarea id="deskripsi_ekskul" name="deskripsi_ekskul" required></textarea>
                <span class="text-danger"><?php echo e($errors->first('deskripsi_ekskul')); ?></span>
            </div>
            <div class="form-group">
                <label for="logo_ekskul">Logo Ekstrakurikuler</label><br>
                <input type="file" id="logo_ekskul" name="logo_ekskul" required />
                <span class="text-danger"><?php echo e($errors->first('logo_ekskul')); ?></span>
            </div>
            <div class="form-group">
                <label for="jenis_ekskul_id">Jenis Ekstrakurikuler</label><br>
                <select id="jenis_ekskul_id" name="jenis_ekskul_id">
                	<?php $__currentLoopData = $jenis_ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jenis_ekskul->id_jenisekskul); ?>"><?php echo e($jenis_ekskul->nama_jenisekskul); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        	<hr>

            <input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
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