<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Formulir Data Sekolah</h2>
        <hr>
        <form class="edit-form" action="<?php echo e(url('/inputdatasekolah')); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

        	<div class="form-group<?php echo e($errors->has('nama_kepsek') ? 'has-error' : ''); ?>">
        		<label for="nama_kepsek">Nama Kepala Sekolah</label><br>
        		<input type="text" id="nama_kepsek" name="nama_kepsek"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kepsek')); ?></span>
        	</div>
            <div class="form-group<?php echo e($errors->has('nama_wkkesiswaan') ? 'has-error' : ''); ?>">
                <label for="nama_wkkesiswaan">Nama Wakil Kepala Sekolah Bid. Kesiswaan</label><br>
                <input type="text" id="nama_wkkesiswaan" name="nama_wkkesiswaan"  />
                <span class="text-danger"><?php echo e($errors->first('nama_wkkesiswaan')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_ketuaosis') ? 'has-error' : ''); ?>">
                <label for="nama_ketuaosis">Nama Ketua OSIS</label><br>
                <input type="text" id="nama_ketuaosis" name="nama_ketuaosis"  />
                <span class="text-danger"><?php echo e($errors->first('nama_ketuaosis')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie1') ? 'has-error' : ''); ?>">
                <label for="nama_kasie1">Nama Kasie I OSIS</label><br>
                <input type="text" id="nama_kasie1" name="nama_kasie1"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie1')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie2') ? 'has-error' : ''); ?>">
                <label for="nama_kasie2">Nama Kasie II OSIS</label><br>
                <input type="text" id="nama_kasie2" name="nama_kasie2"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie2')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie3') ? 'has-error' : ''); ?>">
                <label for="nama_kasie3">Nama Kasie III OSIS</label><br>
                <input type="text" id="nama_kasie3" name="nama_kasie3"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie3')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie4') ? 'has-error' : ''); ?>">
                <label for="nama_kasie4">Nama Kasie IV OSIS</label><br>
                <input type="text" id="nama_kasie4" name="nama_kasie4"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie4')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie5') ? 'has-error' : ''); ?>">
                <label for="nama_kasie1">Nama Kasie V OSIS</label><br>
                <input type="text" id="nama_kasie5" name="nama_kasie5"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie5')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie6') ? 'has-error' : ''); ?>">
                <label for="nama_kasie1">Nama Kasie VI OSIS</label><br>
                <input type="text" id="nama_kasie6" name="nama_kasie6"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie6')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie7') ? 'has-error' : ''); ?>">
                <label for="nama_kasie7">Nama Kasie VII OSIS</label><br>
                <input type="text" id="nama_kasie7" name="nama_kasie7"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie7')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie8') ? 'has-error' : ''); ?>">
                <label for="nama_kasie8">Nama Kasie VII OSIS</label><br>
                <input type="text" id="nama_kasie8" name="nama_kasie8"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie8')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie9') ? 'has-error' : ''); ?>">
                <label for="nama_kasie9">Nama Kasie IX OSIS</label><br>
                <input type="text" id="nama_kasie9" name="nama_kasie9"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie9')); ?></span>
            </div>
            <div class="form-group<?php echo e($errors->has('nama_kasie10') ? 'has-error' : ''); ?>">
                <label for="nama_kasie10">Nama Kasie X OSIS</label><br>
                <input type="text" id="nama_kasie10" name="nama_kasie10"  />
                <span class="text-danger"><?php echo e($errors->first('nama_kasie10')); ?></span>
            </div>
            
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