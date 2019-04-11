<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Pemasukkan Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="/keuangan/pemasukan/<?php echo e($pemasukan->id_pemasukan); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="item_pemasukan">Item Pemasukan</label><br>
        		<input type="text" id="item_pemasukan" name="item_pemasukan" value="<?php echo e($pemasukan->item_pemasukan); ?>" />
        	</div>
            <div class="form-group<?php echo e($errors->has('tanggal_pemasukan') ? 'has-error' : ''); ?>">
                <label for="tanggal_pemasukan">Tertanggal</label><br>
                <input type="date" id="tanggal_pemasukan" name="tanggal_pemasukan" value="<?php echo e($pemasukan->tanggal_pemasukan); ?>"/>
            </div>
            <div class="form-group">
                <label for="sumber_pemasukan_id">Sumber Dana</label><br>
                <select id="sumber_pemasukan_id" name="sumber_pemasukan_id">
                    <?php $__currentLoopData = $sumber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($sumber->id_sumberpemasukan); ?>"<?php echo e($selected_sumber == $sumber->id_sumberpemasukan ? 'selected="selected"' : ''); ?>><?php echo e($sumber->nama_sumberpemasukan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nominal_pemasukan">Jumlah Nominal</label><br>
                <p>Rp&nbsp;</p><input type="number" id="nominal_pemasukan" name="nominal_pemasukan" value="<?php echo e($pemasukan->nominal_pemasukan); ?>"/>
            </div>
            <div class="form-group">
                <label for="pic_pemasukan">Penanggung Jawab (<em>Person In Charge</em>)</label><br>
                <input type="text" id="pic_pemasukan" name="pic_pemasukan" value="<?php echo e($pemasukan->pic_pemasukan); ?>"/>
            </div>
        	<hr>

            <input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Update</button>
                <button class="btn .btn-danger danger" style="color: #333;"><a href="<?php echo e(URL::to('keuangan')); ?>">Kembali</a></button>
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