<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Masukkan Data Pemasukkan Ekstrakurikuler Anda, disini ....</h2>
        <hr>
        <form class="edit-form" action="<?php echo e(url('/inputdatapemasukan')); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

        	<div class="form-group<?php echo e($errors->has('item_pemasukan') ? 'has-error' : ''); ?>">
        		<label for="item_pemasukan">Item Pemasukan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#itempemasukan"></i>
                </label><br>
                <div id="itempemasukan" class="collapse" style="font-size:12px;padding:10px">
                    Nama dari pemasukan, contoh : "Sponsor PT. XYZ", "Dana Sekolah Januari 2019", "Iuran Kas Januari 2019"
                </div>
        		<input type="text" id="item_pemasukan" name="item_pemasukan"/>
                <span class="text-danger"><?php echo e($errors->first('item_pemasukkan')); ?></span>
        	</div>
            <div class="form-group<?php echo e($errors->has('tanggal_pemasukan') ? 'has-error' : ''); ?>">
                <label for="tanggal_pemasukan">Tertanggal</label><br>
                <input type="date" id="tanggal_pemasukan" name="tanggal_pemasukan"/>
            </div>
            <div class="form-group<?php echo e($errors->has('sumber_pemasukan_id') ? 'has-error' : ''); ?>">
                <label for="sumber_pemasukan_id">Sumber Dana&nbsp;
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#sumberpemasukan"></i>
                </label><br>
                <div id="sumberpemasukan" class="collapse" style="font-size:12px;padding:10px">
                    Sumber pemasukan yang anda pilih adalah :
                    <ol>
                        <li><strong>Sekolah</strong>, jika dana masuk berasal dari anggaran sekolah atau BOS</li>
                        <li><strong>Sponsor</strong>, jika dana didapat dari perusahaan dengan perjanjian timbal balik</li>
                        <li><strong>Hibah</strong>, jika dana didapat dari suatu pihak secara cuma-cuma</li>
                        <li><strong>CSR (Corporate Social Responsiblity)</strong>, jika dana didapat dari perusahaan sebagai CSR</li>
                        <li><strong>Dana Usaha Mandiri</strong>, jika dana didapat dari usaha yang dilakukan oleh ekstrakurikuler sendiri</li>
                        <li><strong>Iuran Anggota</strong>, jika dana didapat dari iuran kas anggota ekstrakurikuler</li>
                    </ol>
                </div>
                <select id="sumber_pemasukan_id" name="sumber_pemasukan_id">
                    <?php $__currentLoopData = $sumber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($sumber->id_sumberpemasukan); ?>"><?php echo e($sumber->nama_sumberpemasukan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                </select>
            </div>
            <div class="form-group">
                <label for="nominal_pemasukan">Jumlah Nominal</label><br>
                <p>Rp&nbsp;&nbsp;</p><input type="number" id="nominal_pemasukan" name="nominal_pemasukan"/>
            </div>
            <div class="form-group">
                <label for="pic_pemasukan">Penanggung Jawab (<em>Person In Charge</em>)
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#pic"></i>
                </label><br>
                <div id="pic" class="collapse" style="font-size:12px;padding:10px">
                    Penanggung Jawab adalah bendahara atau anggota eksktrakurikuler yang menerima dana masuk dan diketahui oleh bendahara
                </div>
                <input type="text" id="pic_pemasukan" name="pic_pemasukan"/>
            </div>
        	<hr>

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

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>