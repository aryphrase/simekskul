<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Buat Laporan Pertanggungjawaban Kegiatan</h2>
        <hr>
        <form class="edit-form" action="<?php echo e(url('/inputdatalaporan')); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

            <div id="info-form" style="font-size:12px;padding:12px">
                <h4>Panduan Pengisian Form</h4>
                <ol>
                    <li>Isi form dengan keadaan yang sebenar-benarnya</li>
                    <li>Ada info bantuan yang bisa anda lihat dengan mengklik <i class="glyphicon glyphicon-question-sign help"></i></li>
                    <li>Di beberapa <em>field</em> ada templat berbentuk tabel yang bisa langsung anda gunakan</li>
                </ol>
            </div>

            <div class="form-group">
                <label for="judul_proposal">Judul
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#judul_laporan"></i>
                </label><br>
                <div id="judul_laporan" class="collapse" style="font-size:12px;padding:10px">
                    Contoh : "Laporan Pertanggungjawaban Lomba Puisi se-Kota Surakarta"
                </div>
                <input type="text" id="judul_laporan" name="judul_laporan" required />   
            </div>
            <div class="form-group">
                <label for="ketua_ekskul">Ketua Ekstrakurikuler</label><br>
                <input type="text" id="ketua_ekskul" name="ketua_ekskul" required />   
            </div>
            <div class="form-group">
                <label for="ketua_pelaksana">Ketua Pelaksana</label><br>
                <input type="text" id="ketua_pelaksana" name="ketua_pelaksana" required />   
            </div>
            <div class="form-group">
                <label for="tempat_kegiatan">Tempat Kegiatan</label><br>
                <input type="text" id="tempat_kegiatan" name="tempat_kegiatan" required />   
            </div>
            <div class="form-group">
                <label for="pendahuluan">Pendahuluan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#pendahuluan"></i>
                </label><br>
                <div id="pendahuluan" class="collapse" style="font-size:12px;padding:10px">
                    <strong>Contoh :</strong> 
                    <p>Esktrakurikuler X akan mengadakan kegiatan ... Kegiatan ini adalah salah satu kegiatan yang dilaksanakan oleh Esktrakurikuler X setiap tahun. Kegiatan ini bertujuan untuk ..., sehingga mampu ... Kegiatan ini juga diharapkan ....
                    </p>
                    <p>
                    Untuk kepentingan itulah, Esktrakurikuler X merasa perlu untuk mengadakan kegiatan ini dengan harapan .... 
                    </p>
                </div>
                <textarea id="pendahuluan" name="pendahuluan"></textarea>
            </div>
            <div class="form-group">
                <label for="waktu_kegiatan">Pelaksanaan Kegiatan</label><br>
                <textarea id="waktu_kegiatan" name="waktu_kegiatan">
                    <?php echo $__env->make('layout.rtf_pelaksanaankegiatan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="hasil_yangdicapai">Hasil Yang Dicapai</label><br>
                <textarea id="hasil_yangdicapai" name="hasil_yangdicapai">
                    <?php echo $__env->make('layout.rtf_hasil', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="hambatan_kegiatan">Hambatan</label><br>
                <textarea id="hambatan_kegiatan" name="hambatan_kegiatan">
                    <?php echo $__env->make('layout.rtf_hambatan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="pemecahan_masalah">Pemecahan Masalah</label><br>
                <textarea id="pemecahan_masalah" name="pemecahan_masalah">
                    <?php echo $__env->make('layout.rtf_pemecahanmasalah', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="penutup">Penutup
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#penutup"></i></label><br>
                <textarea id="penutup" name="penutup"></textarea>
            </div>
            <div class="form-group">
                <label for="sasaran">Sasaran</label><br>
                <textarea id="sasaran" name="sasaran">
                    <?php echo $__env->make('layout.rtf_sasaran', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="susunan_panitia">Susunan Panitia</label><br>
                <textarea id="susunan_panitia" name="susunan_panitia">
                    <?php echo $__env->make('layout.rtf_panitia', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="susunan_acara">Susunan Acara</label><br>
                <textarea id="susunan_acara" name="susunan_acara">
                    <?php echo $__env->make('layout.rtf_acara', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="pemasukan_kegiatan">Realisasi Pemasukan Kegiatan</label><br>
                <textarea id="pemasukan_kegiatan" name="pemasukan_kegiatan">
                    <?php echo $__env->make('layout.rtf_pemasukan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="pengeluaran_kegiatan">Realisasi Pengeluaran Kegiatan</label><br>
                <textarea id="pengeluaran_kegiatan" name="pengeluaran_kegiatan">
                    <?php echo $__env->make('layout.rtf_pengeluaran', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>

            <?php $__currentLoopData = $ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="ekskul_id" value="<?php echo e($ekskul->id_ekskul); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('script.texteditorjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>