<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Data Rincian Kas Ekstrakurikuler <?php echo e($name); ?></h2>
        <hr>
        <?php if(session()->has('pemasukanadded')): ?>
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> <?php echo e(session('pemasukanadded')); ?>

            </div>
        <?php elseif(session()->has('pengeluaranadded')): ?>
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> <?php echo e(session('pengeluaranadded')); ?>

            </div>
        <?php elseif(session()->has('pemasukanedited')): ?>
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> <?php echo e(session('pemasukanedited')); ?>

            </div>
        <?php elseif(session()->has('pengerluaranedited')): ?>
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> <?php echo e(session('pengerluaranedited')); ?>

            </div>
        <?php endif; ?>

        <h3>Pemasukan</h3>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Pemasukan</th>
        			<th>Tanggal</th>
        			<th>Jenis Pemasukan</th>
        			<th>Nominal</th>
        			<th>Penanggung Jawab</th>
        			<th colspan="2">Action</th>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $pemasukan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemasukan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($pemasukan->item_pemasukan); ?></td>
        			<td><?php echo e($pemasukan->tanggal_pemasukan); ?></td>
        			<td><?php echo e($pemasukan->nama_sumberpemasukan); ?></td>
        			<td><?php echo e($pemasukan->nominal_pemasukan); ?></td>
        			<td><?php echo e($pemasukan->pic_pemasukan); ?></td>
        			<td width="5%">
                        <button class="btn btn-success"><a href="<?php echo e(url('/keuangan/pemasukan/'.$pemasukan->id_pemasukan.'/showpemasukan')); ?>" style="color:#fff;"><small>Lihat Selengkapnya</small></a></button>
                    </td>
                    <td width="5%"><?php echo e(link_to_route('keuangan.editPemasukan','Edit',[$pemasukan->id_pemasukan],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td width="5%">
                      <?php echo Form::open(array('route'=>['keuangan.destroyPemasukan',$pemasukan->id_pemasukan],'method'=>'DELETE')); ?>

                          
                        <?php echo Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']); ?>

                      <?php echo Form::close(); ?> 
                    </td>
        		</tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</table>
        </div>
        <br>
        <div style="overflow-x: auto;width: 50%;">
        	<table>
        		<tr>
        			<td>Total Pemasukan dari Anggaran Sekolah</td>
        			<td>Rp. <?php echo e($jumlah_bos); ?></td>
        		</tr>
                <tr>
                    <td>Total Pemasukan dari Sponsor</td>
                    <td>Rp. <?php echo e($jumlah_sponsor); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Hibah atau Sumbangan</td>
                    <td>Rp. <?php echo e($jumlah_hibah); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari CSR (Corporate Social Responsibility)</td>
                    <td>Rp. <?php echo e($jumlah_csr); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Dana Usaha Mandiri</td>
                    <td>Rp. <?php echo e($jumlah_danus); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Iuran Kas</td>
                    <td>Rp. <?php echo e($jumlah_iuran); ?></td>
                </tr>
        	</table>
        </div>

        <hr>

        <h3>Pengeluaran</h3>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Pengeluaran</th>
        			<th>Tanggal</th>
        			<th>Jenis Pengeluaran</th>
        			<th>Nominal</th>
        			<th>Penanggung Jawab</th>
        			<th colspan="2">Action</th>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $pengeluaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengeluaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($pengeluaran->item_pengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->tanggal_pengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->nama_jenispengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->nominal_pengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->pic_pengeluaran); ?></td>
        			<td width="5%">
                        <button class="btn btn-success"><a href="<?php echo e(url('/keuangan/pengeluaran/'.$pengeluaran->id_pengeluaran.'/showpengeluaran')); ?>" style="color:#fff;"><small>Lihat Selengkapnya</small></a></button>
                    </td>
                    <td width="5%"><?php echo e(link_to_route('keuangan.editPengeluaran','Edit',[$pengeluaran->id_pengeluaran],['class'=>'btn btn-primary btn-md'])); ?>

                    </td>
                    <td width="5%">
                      <?php echo Form::open(array('route'=>['keuangan.destroyPengeluaran',$pengeluaran->id_pengeluaran],'method'=>'DELETE')); ?>

                          
                        <?php echo Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']); ?>

                      <?php echo Form::close(); ?> 
                    </td>
        		</tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</table>
        </div>
        <br>
        <div style="overflow-x: auto;width: 50%;">
        	<table>
                <tr>
                    <td>Total Pengeluaran untuk Pembelian</td>
                    <td>Rp <?php echo e($jumlah_beli); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Pembayaran Hutang</td>
                    <td>Rp <?php echo e($jumlah_bayaracara); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Honorarium</td>
                    <td>Rp <?php echo e($jumlah_honor); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Donasi</td>
                    <td>Rp <?php echo e($jumlah_donasi); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Iuran Organisasi</td>
                    <td>Rp <?php echo e($jumlah_iuranorganisasi); ?></td>
                </tr>
        	</table>
        </div>
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