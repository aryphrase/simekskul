<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Formulir Program Kerja Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="<?php echo e(url('/inputdataproker')); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

        	<div class="form-group<?php echo e($errors->has('nama_proker') ? 'has-error' : ''); ?>">
        		<label for="nama_proker">Nama Program Kerja</label><br>
        		<input type="text" id="nama_proker" name="nama_proker"  />
                <span class="text-danger"><?php echo e($errors->first('nama_proker')); ?></span>
        	</div>
            <div class="form-group">
                <label for="deskripsi_proker">Deskripsi</label><br>
                <textarea id="deskripsi_proker" name="deskripsi_proker"  ></textarea>
            </div>
            <div class="form-group">
                <label for="frekuensi_proker_id">Frekuensi Program Kerja</label><br>
                <select id="frekuensi_proker_id" name="frekuensi_proker_id" >
                    <?php $__currentLoopData = $frek_proker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($frek->id_frekuensiproker); ?>"><?php echo e($frek->nama_frekuensiproker); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </select>
            </div>
            <div class="form-group<?php echo e($errors->has('waktu_proker') ? 'has-error' : ''); ?>">
                <label for="waktu_proker">Waktu</label><br>
                <input type="date" id="waktu_proker" name="waktu_proker"  />
                <span class="text-danger"><?php echo e($errors->first('waktu_proker')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('tempat_proker') ? 'has-error' : ''); ?>">
                <label for="tempat_proker">Tempat Penyelanggaraan</label><br>
                <input type="text" id="tempat_proker" name="tempat_proker"  />
                <span class="text-danger"><?php echo e($errors->first('tempat_proker')); ?></span>
            </div>
            <div class="form-group">
                <label for="jenis_proker_id">Jenis Program Kerja</label><br>
                <select id="jenis_proker_id" name="jenis_proker_id" >
                	<?php $__currentLoopData = $jenis_proker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_proker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jenis_proker->id_jenisproker); ?>"><?php echo e($jenis_proker->nama_jenisproker); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
                </select>
            </div>
            <div class="form-group">
                <label for="target_proker">Target Peserta</label><br>
                <input type="text" id="target_proker" name="target_proker"  />
            </div>
            <div class="form-group">
                <label for="anggaran_proker">Rencana Anggaran</label><br>
                <textarea id="anggaran_proker" name="anggaran_proker">
                    <?php echo $__env->make('layout.rtf_pemasukan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <br>
                    <?php echo $__env->make('layout.rtf_pengeluaran', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
        	<hr>

            <?php $__currentLoopData = $ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="ekskul_id" value="<?php echo e($ekskul->id_ekskul); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
            <input type="hidden" name="status_proker_id" value="1">
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
<?php echo $__env->make('script.texteditorjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>