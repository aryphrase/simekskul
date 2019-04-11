<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <?php $__currentLoopData = $pembina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row" style="padding:30px 0px">
            <div class="col col-md-2 col-sm 12">
                <img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:64px;" alt=""><br>
                <h4><?php echo e($pembina->nama_pembina); ?></h4><br>
                <p><?php echo e($pembina->nama_jenisuser); ?></p>
            </div>
            <div class="col col-md-8 col-sm-12">
                <h3>Informasi Dasar</h3>
                <br>
                <div class="col col-md-3 col-sm-3">
                    <p><strong>Tempat dan Tanggal Lahir</strong></p>
                </div>
                <div class="col col-md-7 col-sm-5">
                    <p><?php echo e($pembina->tempatlahir_pembina); ?>, <?php echo e($pembina->tanggallahir_pembina); ?></p>
                </div>
                <br><br><hr>
                <div class="col col-md-3 col-sm-3">
                    <p><strong>Alamat</strong></p>
                </div>
                <div class="col col-md-7 col-sm-5">
                    <p><?php echo e($pembina->alamat_pembina); ?></p>
                </div>
                <br><hr>
                <div class="col col-md-3 col-sm-3">
                    <p><strong>Nomor HP</strong></p>
                </div>
                <div class="col col-md-7 col-sm-5">
                    <p><?php echo e($pembina->nomorhp_pembina); ?></p>
                </div>
                <br><hr>
                <div class="col col-md-3 col-sm-3">
                    <p><strong>Akun Instagram</strong></p>
                </div>
                <div class="col col-md-7 col-sm-5">
                    <p><?php echo e($pembina->ig_pembina); ?></p>
                </div>
                <br><hr>
                <h3>Ekstrakurikuler yang dibina</h3>
                <br>
                <div style="overflow-x: auto;">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Ekstrakurikuler</th>
                        </tr>
                        <?php $__currentLoopData = $pembinaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembinaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo e($pembinaan->nama_ekskul); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>