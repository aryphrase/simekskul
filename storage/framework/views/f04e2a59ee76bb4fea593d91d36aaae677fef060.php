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

        <h2>Edit Data Program Kerja</h2>
        <hr>
        <form class="edit-form" action="" method="post">
        	<div class="form-group">
        		<label for="nama_proker">Nama Program Kerja</label><br>
        		<input type="text" id="nama_proker" name="nama_proker" required />
        	</div>
            <div class="form-group">
                <label for="deskripsi_proker">Deskripsi</label><br>
                <textarea id="deskripsi_proker" name="deskripsi_proker" required ></textarea>
            </div>
            <div class="form-group">
                <label for="frekuensi_proker">Frekuensi Program Kerja</label><br>
                <select id="frekuensi_proker" name="frekuensi_proker" required>
                    <option value="Satu kali">Satu kali</option>        
                    <option value="Tahunan">Tahunan</option>      
                    <option value="Bulanan">Bulanan</option>
                    <option value="Mingguan">Mingguan</option>    
                    <option value="Harian">Harian</option>        
                </select>
            </div>
            <div class="form-group">
                <label for="waktu_proker">Waktu</label><br>
                <input type="date" id="waktu_proker" name="waktu_proker" required />
            </div>
            <div class="form-group">
                <label for="tempat_proker">Tempat Penyelanggaraan</label><br>
                <input type="text" id="tempat_proker" name="tempat_proker" required />
            </div>
            <div class="form-group">
                <label for="jenis_proker">Jenis Program Kerja</label><br>
                <select id="jenis_proker" name="jenis_proker" required>
                	<option value="Rapat dan Kesekretariatan">Rapat dan Kesekretariatan</option>        
                    <option value="Event rutin">Event rutin</option>
                    <option value="Latihan rutin">Latihan rutin</option>   
                    <option value="Pengayaan Kompetensi">Pengayaan Kompetensi</option>        
                    <option value="Pengadaan">Pengadaan</option>       
                    <option value="Lainnya">Lainnya</option>		
                </select>
            </div>
            <div class="form-group">
                <label for="target_proker">Target Peserta</label><br>
                <input type="text" id="target_proker" name="target_proker" required />
            </div>
            <div class="form-group">
                <label for="anggaran_proker">Rencana Anggaran</label><br>
                <p>Rp </p><input type="number" id="anggaran_proker" name="anggaran_proker" required />
            </div>
        	<hr>
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