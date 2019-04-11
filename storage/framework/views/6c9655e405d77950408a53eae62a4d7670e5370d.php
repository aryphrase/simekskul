<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
	<?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <h2>Edit Data Siswa</h2>
        <hr>
        <form class="edit-form" action="/siswa/<?php echo e($siswa->id_siswa); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="nama_siswa">Nama</label><br>
        		<input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo e($siswa->nama_siswa); ?>"/>
        	</div>
            <div class="form-group">
                <label for="kelas_id">Kelas</label><br>
                <select id="kelas_id" name="kelas_id" >
                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kelas->id_kelas); ?>"<?php echo e($selected_kelas == $kelas->id_kelas ? 'selected="selected"' : ''); ?>><?php echo e($kelas->nama_kelas); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="foto_siswa">Foto</label><br>
                <input type="file" id="foto_siswa" name="foto_siswa" value="<?php echo e($siswa->foto_siswa); ?>"/>
            </div>
        	<div class="form-group">
    			<div class="row">
    				<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tempatlahir_siswa">Tempat Lahir</label><br>
		        		<input type="text" id="tempatlahir_siswa" name="tempatlahir_siswa" value="<?php echo e($siswa->tempatlahir_siswa); ?>"/>
		        	</div>
		        	<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tanggallahir_siswa">Tanggal Lahir</label><br>
		        		<input type="date" id="tanggallahir_siswa" name="tanggallahir_siswa" value="<?php echo e($siswa->tanggallahir_siswa); ?>"/>
		        	</div>
	        	</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
        				<label for="nama_ayah">Nama Ayah</label><br>
        				<input type="text" id="nama_ayah" name="nama_ayah"  value="<?php echo e($siswa->nama_ayah); ?>"/>
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
        				<label for="nama_ibu">Nama Ibu</label><br>
        				<input type="text" id="nama_ibu" name="nama_ibu"  value="<?php echo e($siswa->nama_ibu); ?>"/>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="alamat_siswa">Alamat Siswa</label><br>
        		<input type="text" id="alamat_siswa" name="alamat_siswa" value="<?php echo e($siswa->alamat_siswa); ?>" />
        	</div>
        	<div class="form-group">
        		<label for="alamat_ayah">Alamat Ayah</label><br>
        		<input type="text" id="alamat_ayah" name="alamat_ayah"  value="<?php echo e($siswa->alamat_ayah); ?>"/>
        	</div>
        	<div class="form-group">
        		<label for="alamat_ibu">Alamat Ibu</label><br>
        		<input type="text" id="alamat_ibu" name="alamat_ibu"  value="<?php echo e($siswa->alamat_ibu); ?>"/>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_siswa">Nomor HP Siswa</label><br>
        				<input type="text" id="nomorhp_siswa" name="nomorhp_siswa" value="<?php echo e($siswa->nomorhp_siswa); ?>"/>
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_ayah">Nomor HP Ayah</label><br>
        				<input type="text" id="nomorhp_ayah" name="nomorhp_ayah" value="<?php echo e($siswa->nomorhp_ayah); ?>"/>
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_ibu">Nomor HP Ibu</label><br>
        				<input type="text" id="nomorhp_ibu" name="nomorhp_ibu" value="<?php echo e($siswa->nomorhp_ibu); ?>"/>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="ig_siswa">Akun Instagram</label><br>
        		<input type="text" id="ig_siswa" name="ig_siswa" value="<?php echo e($siswa->ig_siswa); ?>"/>
        	</div>
        	<hr>

            <input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Update</button>
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