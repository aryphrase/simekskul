<?php $__env->startSection('content'); ?>
<div class="wrapper">
	<nav id="sidebar">
        <div class="sidebar-header">
            <h3>Simekskul Smaracatur</h3>
        </div>

        <button class="accordion">Pengguna</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">Daftar Pengguna</a></li>
		  		<li><a href="#">Daftar Siswa</a></li>
		  		<li><a href="#">Daftar Pembina</a></li>
		  	</ul>
		</div>

		<button class="accordion">Pendaftaran</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">Daftar Pendaftar</a></li>
		  		<li><a href="#">Cetak Daftar Pendaftar</a></li>
		  		<li><a href="#">Cetak Bukti Pendaftaran</a></li>
		  	</ul>
		</div>

		<button class="accordion">Ekstrakurikuler</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">Anggota Ekstrakurikuler</a></li>
		  		<li><a href="#">Profil Ekstrakurikuler</a></li>
		  	</ul>
		</div>

		<button class="accordion">Penilaian</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">Daftar Nilai</a></li>
		  		<li><a href="#">Cetak Daftar Nilai</a></li>
		  	</ul>
		</div>

		<button class="accordion">Proker dan Kegiatan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">Daftar Proker</a></li>
		  		<li><a href="#">Cetak Data Proker</a></li>
		  	</ul>
		</div>

		<button class="accordion">Keuangan</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">Daftar Data Keuangan</a></li>
		  		<li><a href="#">Cetak Data Keuangan</a></li>
		  	</ul>
		</div>

		<button class="accordion">Rapat</button>
		<div class="panel">
		  	<ul class="list-unstyled">
		  		<li><a href="#">Daftar Rapat</a></li>
		  		<li><a href="#">Cetak Notulen Rapat</a></li>
		  	</ul>
		</div>

		<button><a href="<?php echo e(url('/logout')); ?>">Logout</a></button>

	</nav>

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <h2>Daftar Notulen Rapat Ekstrakurikuler Pramuka</h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Rapat</th>
        			<th>Tempat</th>
        			<th>Waktu</th>
        			<th colspan="2">Action</th>
        		</tr>
        		<tr>
        			<td>1</td>
        			<td>Rapat Koordinasi Proker Jambore</td>
        			<td>Kelas XII SMA Negeri 4</td>
        			<td>27/07/2018 15.00 - 16.00</td>
        			<td>
        				<button class="btn btn-success">Lihat Selengkapnya</button>
        			</td>
        			<td>
        				<button class="btn btn-info"><i class="fa fa-edit" style="font-size:12px"></i></button>
        				<button class="btn btn-danger"><i class="fa fa-delete" style="font-size:12px"></i></button>
        			</td>
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