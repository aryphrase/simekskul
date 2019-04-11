<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
	<?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <br>
        <h2>Daftar Ekstrakurikuler SMA Negeri 4 Surakarta</h2>
        <hr>

        <div class="search-box">
            <div class="row">
                <div class="col col-md-9 space">
                    &nbsp;
                </div>
                <div class="col col-md-3 space">
                    <form class="search" action="#">
                        <input type="text" placeholder="Cari.." name="search">
                        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="dropdown-filter">
            <div class="row">
                <div class="col col-md-3 space">
                    <select name="kelas" id="kelas" style="">
                        <option value="">pilih jenis</option>
                    </select>
                </div>
                <div class="col col-md-3 space">
                    <button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                </div>
            </div>
        </div>

        <?php $__currentLoopData = $ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid-card card">
			<table class="borderless">
				<tr>
					<td width="10%"><img class="img-circle" style="width:100%;" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" />
					<td><a href="#"><h4><?php echo e($ekskul->nama_ekskul); ?></h4></a><br><p>Jumlah Anggota :</p></td>
					<td width="10%">
						<button class="btn btn-success"><a href="<?php echo e(url('/ekskul/'.$ekskul->id_ekskul.'/show')); ?>" style="color:#fff;">Lihat Profil</a></button>
					</td>
					<?php if($jenis == 2): ?>
					<td width="5%">
						<?php echo e(link_to_route('ekskul.edit','Edit',[$ekskul->id_ekskul],['class'=>'btn btn-primary btn-md'])); ?>

					</td>
					<td width="10%">
						<?php echo Form::open(array('route'=>['ekskul.destroy',$ekskul->id_ekskul],'method'=>'DELETE')); ?>

                          
                        <?php echo Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']); ?>

                      	<?php echo Form::close(); ?> 
					</td>
					<?php endif; ?>
				</tr>
			</table>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>