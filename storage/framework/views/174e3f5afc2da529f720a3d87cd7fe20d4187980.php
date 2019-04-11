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

        <h2>Edit Data Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="" method="post">
        	<div class="form-group">
        		<label for="nama_ekskul">Nama Ekstrakurikuler</label><br>
        		<input type="text" id="nama_ekskul" name="nama_ekskul" required />
        	</div>
            <div class="form-group">
                <label for="logo_ekskul">Logo Ekstrakurikuler</label><br>
                <input type="file" id="logo_ekskul" name="logo_ekskul" required />
            </div>
            <div class="form-group">
                <label for="foto_ekskul">Foto Ekstrakurikuler</label><br>
                <input type="file" id="foto_ekskul" name="foto_ekskul" required />
            </div>
            <div class="form-group">
                <label for="jenis_ekskul">Jenis Ekstrakurikuler</label><br>
                <select id="jenis_ekskul" name="jenis_ekskul">
                	<option value="Krida">Krida</option>		
					<option value="Karya Ilmiah dan Pengetahuan">Karya Ilmiah dan Pengetahuan</option>		
					<option value="Olahraga">Olahraga</option>
					<option value="Seni dan Budaya">Seni dan Budaya</option>	
					<option value="Keagamaan">Keagamaan</option>		
					<option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pembina_ekskul">Pembina Ekstrakurikuler</label><br>
                <select id="pembina_ekskul" name="pembina_ekskul">
                	<option value="1">Pak To</option>
                	<option value="2">Bu Har</option>		
                </select>
            </div>
        	<!-- <div class="form-group">
    			<div class="row">
    				<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tempatlahir_pembina">Tempat Lahir</label><br>
		        		<input type="text" id="tempatlahir_pembina" name="tempatlahir_pembina" required />
		        	</div>
		        	<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tempatlahir_pembina">Tanggal Lahir</label><br>
		        		<input type="date" id="tempatlahir_pembina" name="tempatlahir_pembina" required />
		        	</div>
	        	</div>
        	</div> -->
            <div class="form-group">
                <label for="ketua_ekskul">Ketua</label><br>
                <input type="text" id="ketua_ekskul" name="ketua_ekskul" required />
            </div>
            <div class="form-group">
                <label for="wakil1_ekskul">Wakil Ketua I</label><br>
                <input type="text" id="wakil1_ekskul" name="wakil1_ekskul" required />
            </div>
        	<div class="form-group">
        		<label for="wakil2_ekskul">Wakil Ketua II</label><br>
        		<input type="text" id="wakil2_ekskul" name="wakil2_ekskul" />
        	</div>
        	<div class="form-group">
        		<label for="sekretaris_ekskul">Sekretaris</label><br>
        		<input type="text" id="sekretaris_ekskul" name="sekretaris_ekskul" />
        	</div>
        	<div class="form-group">
        		<label for="bendahara_ekskul">Bendahara</label><br>
        		<input type="text" id="bendahara_ekskul" name="bendahara_ekskul" />
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