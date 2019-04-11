<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Proposal Kegiatan</h2>
        <hr>
        <form class="edit-form" action="/proposal/<?php echo e($proposal->id_proposal); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group">
                <label for="judul_proposal">Judul</label><br>
                <input type="text" id="judul_proposal" name="judul_proposal" value="<?php echo e($proposal->judul_proposal); ?>"/>   
            </div>
            <div class="form-group">
                <label for="ketua_ekskul">Ketua Ekstrakurikuler</label><br>
                <input type="text" id="ketua_ekskul" name="ketua_ekskul" value="<?php echo e($proposal->ketua_ekskul); ?>"/>   
            </div>
            <div class="form-group">
                <label for="ketua_pelaksana">Ketua Pelaksana</label><br>
                <input type="text" id="ketua_pelaksana" name="ketua_pelaksana" value="<?php echo e($proposal->ketua_pelaksana); ?>"/>   
            </div>
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label><br>
                <input type="text" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo e($proposal->nama_kegiatan); ?>"/>   
            </div>
            <div class="form-group">
                <label for="pendahuluan">Pendahuluan</label><br>
                <textarea id="pendahuluan" name="pendahuluan"><?php echo $proposal->pendahuluan; ?></textarea>
            </div>
            <div class="form-group">
                <label for="dasar_kegiatan">Dasar Kegiatan</label><br>
                <textarea id="dasar_kegiatan" name="dasar_kegiatan"><?php echo $proposal->dasar_kegiatan; ?></textarea>
            </div>
            <div class="form-group">
                <label for="tujuan_kegiatan">Tujuan</label><br>
                <textarea id="tujuan_kegiatan" name="tujuan_kegiatan"><?php echo $proposal->tujuan_kegiatan; ?></textarea>
            </div>
            <div class="form-group">
                <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan</label><br>
                <textarea id="pelaksanaan_kegiatan" name="pelaksanaan_kegiatan"><?php echo $proposal->pelaksanaan_kegiatan; ?></textarea>
            </div>
            <div class="form-group">
                <label for="penutup">Penutup</label><br>
                <textarea id="penutup" name="penutup"><?php echo $proposal->penutup; ?></textarea>
            </div>
            <div class="form-group">
                <label for="sasaran">Sasaran</label><br>
                <textarea id="sasaran" name="sasaran"><?php echo $proposal->sasaran; ?></textarea>
            </div>
            <div class="form-group">
                <label for="susunan_panitia">Susunan Panitia</label><br>
                <textarea id="susunan_panitia" name="susunan_panitia"><?php echo $proposal->susunan_panitia; ?></textarea>
            </div>
            <div class="form-group">
                <label for="susunan_acara">Susunan Acara</label><br>
                <textarea id="susunan_acara" name="susunan_acara"><?php echo $proposal->susunan_acara; ?></textarea>
            </div>
            <div class="form-group">
                <label for="pemasukan_kegiatan">Estimasi Pemasukan Kegiatan</label><br>
                <textarea id="pemasukan_kegiatan" name="pemasukan_kegiatan"><?php echo $proposal->pemasukan_kegiatan; ?></textarea>
            </div>
            <div class="form-group">
                <label for="pengeluaran_kegiatan">Estimasi Pengeluaran Kegiatan</label><br>
                <textarea id="pengeluaran_kegiatan" name="pengeluaran_kegiatan"><?php echo $proposal->pengeluaran_kegiatan; ?></textarea>
            </div>


            <?php $__currentLoopData = $ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="ekskul_id" value="<?php echo e($ekskul->id_ekskul); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('script.texteditorjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>