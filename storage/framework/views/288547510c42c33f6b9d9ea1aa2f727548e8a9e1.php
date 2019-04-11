<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <?php if(($jenis == 1) || ($jenis == 4)): ?>
            <h2>Daftar Anggota Ekstrakurikuler</h2>
        <?php elseif($jenis == 2): ?>
            <h2>Daftar Anggota Ekstrakurikuler <?php echo e($name); ?></h2>
        <?php elseif($jenis == 3): ?>
            <h2>Daftar Anggota Ekstrakurikuler yang berada dalam binaan anda</h2>
        <?php endif; ?>
        <hr>

        <div class="search-box">
            <div class="row">
                <div class="col col-md-9 space">
                    &nbsp;
                </div>
                <div class="col col-md-3 space">
                    <?php echo Form::open(['method'=>'GET','url'=>'keanggotaan/carianggota','role'=>'search']); ?>                    
                        <input type="text" placeholder="Cari.." name="search">
                        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

        <div class="dropdown-filter">
            <div class="row">
                <div class="col col-md-3 space">
                    <select name="kelas" id="kelas" style="">
                        <option value="">pilih kelas</option>
                    </select>
                </div>
                <div class="col col-md-3 space">
                    <select name="kelas" id="angkatan">
                        <option value="">pilih status</option>
                    </select>
                </div>
                <?php if($jenis == 1): ?>
                <div class="col col-md-3 space">
                    <select name="kelas" id="kelas">
                        <option value="">pilih ekstrakurikuler</option>
                    </select>
                </div>
                <?php endif; ?>
                <div class="col col-md-3 space">
                    <button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama</th>
                    <th>Kelas</th>
                    <th>Status Anggota</th>
                    <th>Jabatan</th>
                    <?php if($jenis == 1): ?>
                    <th>Ekstrakurikuler</th>
                    <?php endif; ?>
                    <?php if($jenis == 2): ?>
                    <th colspan="3">Action</th>
                    <?php elseif(($jenis == 1) || ($jenis == 3) || ($jenis == 4)): ?>
                    <th>Action</th>
                    <?php endif; ?>
                </tr>
        		<?php if($keanggotaan->isEmpty()): ?>
        			<tr>
        				<td colspan="5">Belum ada data</td>
        			</tr>
        		<?php else: ?>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $keanggotaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keanggotaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
                    
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($keanggotaan->nama_siswa); ?></td>
                    <td><?php echo e($keanggotaan->nama_kelas); ?></td>
                    <td><?php echo e($keanggotaan->nama_statusanggota); ?></td>
                    <td><?php echo e($keanggotaan->jabatan); ?></td>
                    <?php if($jenis == 1): ?>
                    <td><?php echo e($keanggotaan->nama_ekskul); ?></td>
                    <?php endif; ?>
                    <?php if($jenis == 2): ?>
                    <td><button class="btn btn-success"><a href="<?php echo e(url('/siswa/'.$keanggotaan->id_siswa)); ?>" style="color:#fff;">Lihat Profil</a></button></td>
                    <td width="5%"><?php echo e(link_to_route('keanggotaan.editKeanggotaan','Edit',[$keanggotaan->id_keanggotaan],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td width="5%">
                      <?php echo Form::open(array('route'=>['keanggotaan.destroy',$keanggotaan->id_keanggotaan],'method'=>'DELETE')); ?>

                          
                        <?php echo Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']); ?>

                      <?php echo Form::close(); ?> 
                    </td>
                    <?php elseif(($jenis == 1) || ($jenis == 3) || ($jenis == 4)): ?>
                    <td><button class="btn btn-success"><a href="<?php echo e(url('/siswa/'.$keanggotaan->id_siswa)); ?>" style="color:#fff;">Lihat Profil</a></button></td>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
        		</tr>
        	</table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>