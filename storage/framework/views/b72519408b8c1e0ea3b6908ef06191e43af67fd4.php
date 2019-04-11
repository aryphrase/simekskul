<?php $__env->startSection('content'); ?>
<body class="gradient-green" style="overflow: hidden;">
    <div class="register-page">
        <div class="form">
            <div class="brand">Simekskul</div>
            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form class="register-form" action="<?php echo e(route('register')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <!-- username -->
                <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nama Lengkap" value="<?php echo e(old('username')); ?>" required />
                    <?php if($errors->has('username')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('username')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- email -->
                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?php echo e(old('email')); ?>" required/>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- password -->
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"  placeholder="Ulangi" required />
                </div>

                <div class="form-group<?php echo e($errors->has('jenis_user_id') ? ' has-error' : ''); ?>">
                    <label for="jenis_user_id">Jenis User</p></label>
                    <select style="width:100%" id="jenis_user_id" name="jenis_user_id">
                        <option value="1">Admin Sekolah</option>
                        <option value="2">Admin Ekstrakurikuler</option>
                        <option value="3">Pembina Ekstrakurikuler</option>
                        <option value="4">Siswa</option>
                    </select>

                     <?php if($errors->has('jenis_user_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('jenis_user_id')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <button type="submit">buat akun</button>
                    <button type="reset">batal</button>
                    <p class="message">Sudah mendaftar? silahkan <a href="<?php echo e(route('login')); ?>">masuk</a></p>
                </div>
            </form>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>