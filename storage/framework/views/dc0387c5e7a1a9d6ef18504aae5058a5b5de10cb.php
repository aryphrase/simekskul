<nav id="sidebar" class="scroll">
        <div class="sidebar-header">
            <h3><a href="<?php echo e(URL::to('/')); ?>" style="color:#fff;">Simekskul</a></h3>
        </div>
		
        <div style="background-color:#612496;padding:10px;">
        	<p><strong>Anda Login Sebagai</strong></p><br>
        	<p><?php echo e($name); ?><br> 
        	<?php $__currentLoopData = $jenisapa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisapa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		<small><?php echo e($jenisapa->nama_jenisuser); ?></small>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</p>
        </div>

        <button><a href="<?php echo e(url('/halamanutama')); ?>">Dasbor</a></button>

        <?php if($jenis == 1): ?>  
        <button class="accordion">Pengguna</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<?php if($jenis == 1): ?>
		  		<li><a href="<?php echo e(url('/pengguna')); ?>">Daftar Pengguna</a></li>
		  		<?php endif; ?>
		  		<li><a href="<?php echo e(URL::to('siswa')); ?>">Daftar Siswa</a></li>
		  		<li><a href="<?php echo e(URL::to('pembina')); ?>">Daftar Guru</a></li>
		  	</ul>
		</div>
		<?php endif; ?>

		<?php if(($jenis == 1) || ($jenis == 2) || ($jenis == 4)): ?>
		<button class="accordion">Keanggotaan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<?php if($jenis == 1): ?>
		  		<li><a href="<?php echo e(url('/keanggotaan')); ?>">Daftar Anggota</a></li>
		  		<li><a href="#">Cetak Daftar Anggota</a></li>
		  		<?php endif; ?>
		  		<?php if($jenis == 2): ?>
		  		<li><a href="<?php echo e(url('/keanggotaan')); ?>">Daftar Pendaftar</a></li>
		  		<li><a href="#">Cetak Daftar Pendaftar</a></li>
		  		<?php endif; ?>
		  		<?php if($jenis == 4): ?>
		  		<li><a href="<?php echo e(url('/keanggotaan/pendaftaran/create')); ?>">Borang Pendaftaran</a></li>
		  		<li><a href="<?php echo e(url('/keanggotaan/pendaftaran/buktipendaftaran')); ?>">Cetak Bukti Pendaftaran</a></li>
		  		<?php endif; ?>
		  	</ul>
		</div>
		<?php endif; ?>

		<button class="accordion">Data Ekstrakurikuler</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<?php if($jenis == 1): ?>
		  		<li><a href="<?php echo e(url('/ekskul')); ?>">Daftar Ekstrakurikuler</a></li>
		  		<li><a href="<?php echo e(url('/pembinaan')); ?>">Daftar Pembina</a></li>
		  		<li><a href="<?php echo e(url('/keanggotaan')); ?>">Anggota Ekstrakurikuler</a></li>
				<li><a href="<?php echo e(url('/proker')); ?>">Daftar Proker</a></li>
				<li><a href="<?php echo e(url('/laporan')); ?>">Laporan Kegiatan</a></li>
				<li><a href="<?php echo e(url('/keuangan')); ?>">Data Kas</a></li>
				<li><a href="<?php echo e(url('/rapat')); ?>">Daftar Rapat</a></li>
		  		<?php elseif($jenis == 2): ?>
		  		<li><a href="<?php echo e(url('/keanggotaan')); ?>">Pengelolaan Anggota</a></li>
		  		<li><a href="#">Cetak Daftar Anggota</a></li>
		  		<?php elseif($jenis == 3): ?> 
		  		<li><a href="<?php echo e(url('/ekskul')); ?>">Daftar Ekstrakurikuler</a></li>
				<li><a href="<?php echo e(url('/keanggotaan')); ?>">Anggota Ekstrakurikuler</a></li>
				<li><a href="<?php echo e(url('/proker')); ?>">Daftar Proker</a></li>
				<li><a href="<?php echo e(url('/laporan')); ?>">Laporan Kegiatan</a></li>
				<li><a href="<?php echo e(url('/keuangan')); ?>">Data Kas</a></li>
				<li><a href="<?php echo e(url('/rapat')); ?>">Daftar Rapat</a></li>
				<?php elseif($jenis == 4): ?>
				<li><a href="<?php echo e(url('/ekskul')); ?>">Daftar Ekstrakurikuler</a></li>
				<li><a href="<?php echo e(url('/keanggotaan')); ?>">Anggota Ekstrakurikuler</a></li>
		  		<?php endif; ?>
		  	</ul>
		</div>

		<!-- <?php if($jenis != 2): ?>
		<button class="accordion">Penilaian</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<?php if($jenis == 3): ?>
		  		<li><a href="<?php echo e(url('/penilaian/create')); ?>">Borang Masukan Nilai</a></li>
		  		<?php endif; ?>
		  		<li><a href="#">Daftar Nilai</a></li>
		  		<?php if(($jenis == 1) || ($jenis == 3)): ?>
		  		<li><a href="#">Cetak Daftar Nilai</a></li>
		  		<?php endif; ?>
		  	</ul>
		</div>
		<?php endif; ?> -->

		<?php if($jenis == 2): ?>
		<button class="accordion">Proker dan Kegiatan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<?php if($jenis == 2): ?>
		  		<li><a href="<?php echo e(url('/proker/create')); ?>">Borang Masukan Proker</a></li>
		  		<li><a href="<?php echo e(url('/laporan/create')); ?>">Buat Laporan Kegiatan</a></li>
		  		<li><a href="<?php echo e(url('/proposal/create')); ?>">Buat Proposal Kegiatan</a></li>
		  		<li><a href="<?php echo e(url('/proker')); ?>">Daftar Proker</a></li>
		  		<li><a href="<?php echo e(url('/proposal')); ?>">Daftar Proposal</a></li>
		  		<li><a href="<?php echo e(url('/laporan')); ?>">Daftar Laporan Kegiatan</a></li>
		  		<?php endif; ?>
		  	</ul>
		</div>
		<?php endif; ?>

		<?php if($jenis == 2): ?>
		<button class="accordion">Kas</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="<?php echo e(url('/keuangan')); ?>">Data Kas</a></li>
		  		<li><a href="<?php echo e(url('/keuangan/pemasukan/create')); ?>">Input Pemasukan Kas</a></li>
		  		<li><a href="<?php echo e(url('/keuangan/pengeluaran/create')); ?>">Input Pengeluaran Kas</a></li>
		  	</ul>
		</div>
		<?php endif; ?>

		<?php if($jenis == 2): ?>
		<button class="accordion">Rapat</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="<?php echo e(url('/rapat/create')); ?>">Buat Notulen Rapat</a></li>
		  		<li><a href="<?php echo e(url('/rapat')); ?>">Daftar Rapat</a></li>
		  		<li><a href="#">Cetak Notulen Rapat</a></li>
		  	</ul>
		</div>
		<?php endif; ?>

		<?php if($jenis == 1): ?>
		<button class="accordion">Setelan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="<?php echo e(url('/sekolah/1/edit')); ?>">Ubah Data Sekolah</a></li>
		  	</ul>
		</div>
		<?php endif; ?>

		<button><a href="<?php echo e(url('/logout')); ?>">Logout</a></button>

	</nav>