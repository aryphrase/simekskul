<?php $__env->startSection('content'); ?>
<div class="wrapper">
	<nav id="sidebar">
        <div class="sidebar-header">
            <h3>Simekskul Smaracatur</h3>
        </div>

        <button class="accordion">Anggota</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">A</a></li>
		  		<li><a href="#">B</a></li>
		  		<li><a href="#">C</a></li>
		  	</ul>
		</div>

		<button class="accordion">Pendaftaran</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">A</a></li>
		  		<li><a href="#">B</a></li>
		  		<li><a href="#">C</a></li>
		  	</ul>
		</div>

		<button class="accordion">Proker dan Kegiatan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">A</a></li>
		  		<li><a href="#">B</a></li>
		  		<li><a href="#">C</a></li>
		  	</ul>
		</div>

		<button class="accordion">Keuangan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">A</a></li>
		  		<li><a href="#">B</a></li>
		  		<li><a href="#">C</a></li>
		  	</ul>
		</div>

		<button class="accordion">Rapat</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">A</a></li>
		  		<li><a href="#">B</a></li>
		  		<li><a href="#">C</a></li>
		  	</ul>
		</div>

		<button><a href="<?php echo e(url('/logout')); ?>">Logout</a></button>

	</nav>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <h2>Edit Data Siswa</h2>
        <hr>
        <form class="edit-form" action="" method="post">
        	<div class="form-group">
        		<label for="nama_siswa">Nama</label><br>
        		<input type="text" id="nama_siswa" name="nama_siswa" required />
        	</div>
            <div class="form-group">
                <label for="foto_siswa">Foto</label><br>
                <input type="file" id="foto_siswa" name="foto_siswa" required />
            </div>
        	<div class="form-group">
    			<div class="row">
    				<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tempatlahir_siswa">Tempat Lahir</label><br>
		        		<input type="text" id="tempatlahir_siswa" name="tempatlahir_siswa" required />
		        	</div>
		        	<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tanggallahir_siswa">Tanggal Lahir</label><br>
		        		<input type="date" id="tanggallahir_siswa" name="tanggallahir_siswa" required />
		        	</div>
	        	</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
        				<label for="nama_ayah">Nama Ayah</label><br>
        				<input type="text" id="nama_ayah" name="nama_ayah" required />
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
        				<label for="nama_ibu">Nama Ibu</label><br>
        				<input type="text" id="nama_ibu" name="nama_ibu" required />
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="alamat_siswa">Alamat Siswa</label><br>
        		<input type="text" id="alamat_siswa" name="alamat_siswa" required />
        	</div>
        	<div class="form-group">
        		<label for="alamat_ayah">Alamat Ayah</label><br>
        		<input type="text" id="alamat_ayah" name="alamat_ayah" required />
        	</div>
        	<div class="form-group">
        		<label for="alamat_ibu">Alamat Ibu</label><br>
        		<input type="text" id="alamat_ibu" name="alamat_ibu" required />
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_siswa">Nomor HP Siswa</label><br>
        				<input type="text" id="nomorhp_siswa" name="nomorhp_siswa" required />
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_ayah">Nomor HP Ayah</label><br>
        				<input type="text" id="nomorhp_ayah" name="nomorhp_ayah" required />
        			</div>
        			<div style="margin:0;padding:0;" class="col col-md-3 col-sm-12">
        				<label for="nomorhp_ibu">Nomor HP Ibu</label><br>
        				<input type="text" id="nomorhp_ibu" name="nomorhp_ibu" required />
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="ig_siswa">Akun Instagram</label><br>
        		<input type="text" id="ig_siswa" name="ig_siswa" />
        	</div>
        	<hr>
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
<script type="text/javascript">
	$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

});
</script>
<script type="text/javascript">
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	    acc[i].addEventListener("click", function() {
	        /* Toggle between adding and removing the "active" class,
	        to highlight the button that controls the panel */
	        this.classList.toggle("active");

	        /* Toggle between hiding and showing the active panel */
	        var panel = this.nextElementSibling;
	        if (panel.style.display === "block") {
	            panel.style.display = "none";
	        } else {
	            panel.style.display = "block";
	        }
	    });
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>