<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Sunting Data Sekolah</h2>
        <hr>
        <form class="edit-form" action="/sekolah/<?php echo e($sekolah->id_datasekolah); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group">
                <label for="nama_kepsek">Nama Kepala Sekolah</label><br>
                <input type="text" id="nama_kepsek" name="nama_kepsek" value="<?php echo e($sekolah->nama_kepsek); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_wkkesiswaan">Nama Wakil Kepala Sekolah Bid. Kesiswaan</label><br>
                <input type="text" id="nama_wkkesiswaan" name="nama_wkkesiswaan" value="<?php echo e($sekolah->nama_wkkesiswaan); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_ketuaosis">Nama Ketua OSIS</label><br>
                <input type="text" id="nama_ketuaosis" name="nama_ketuaosis" value="<?php echo e($sekolah->nama_ketuaosis); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie1">Nama Kasie I OSIS</label><br>
                <input type="text" id="nama_kasie1" name="nama_kasie1" value="<?php echo e($sekolah->nama_kasie1); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie2">Nama Kasie II OSIS</label><br>
                <input type="text" id="nama_kasie2" name="nama_kasie2" value="<?php echo e($sekolah->nama_kasie2); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie3">Nama Kasie III OSIS</label><br>
                <input type="text" id="nama_kasie3" name="nama_kasie3" value="<?php echo e($sekolah->nama_kasie3); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie4">Nama Kasie IV OSIS</label><br>
                <input type="text" id="nama_kasie4" name="nama_kasie4" value="<?php echo e($sekolah->nama_kasie4); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie5">Nama Kasie V OSIS</label><br>
                <input type="text" id="nama_kasie5" name="nama_kasie5" value="<?php echo e($sekolah->nama_kasie5); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie6">Nama Kasie VI OSIS</label><br>
                <input type="text" id="nama_kasie6" name="nama_kasie6" value="<?php echo e($sekolah->nama_kasie6); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie7">Nama Kasie VII OSIS</label><br>
                <input type="text" id="nama_kasie7" name="nama_kasie7" value="<?php echo e($sekolah->nama_kasie7); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie8">Nama Kasie VIII OSIS</label><br>
                <input type="text" id="nama_kasie8" name="nama_kasie8" value="<?php echo e($sekolah->nama_kasie8); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie9">Nama Kasie IX OSIS</label><br>
                <input type="text" id="nama_kasie9" name="nama_kasie9" value="<?php echo e($sekolah->nama_kasie9); ?>"/>
            </div>
            <div class="form-group">
                <label for="nama_kasie1">Nama Kasie X OSIS</label><br>
                <input type="text" id="nama_kasie10" name="nama_kasie10" value="<?php echo e($sekolah->nama_kasie10); ?>"/>
            </div>
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