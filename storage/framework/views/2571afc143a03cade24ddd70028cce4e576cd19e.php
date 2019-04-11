<?php $__env->startSection('content'); ?>
<div class="wrapper">

	<?php echo $__env->make('sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            Buka/Tutup Sidebar
        </button>

        <h2>Asah Minat dan Bakatmu, dimulai dari sini ...</h2>
        <hr>
        <p>Formulir ini diperuntukkan untuk pendaftaran ekstrakurikuler di SMA Negeri 4 Surakarta. Formulir ini digunakan untuk mendaftar satu ekstrakurikuler saja</p>
        <form class="edit-form" action="" method="post">
        	<div class="form-group">
        		<label for="nama_siswa">Nama</label><br>
        		<p id="nama_siswa">Ary Prasetyo</p>
        	</div>
        	<div class="form-group">
        		<label for="kelas_siswa">Kelas</label><br>
        		<p>X MIA 1</p>
        	</div>
        	<div class="form-group">
                <label for="ekstrakurikuler_id">Ekstrakurikuler yang dipilih</label><br>
                <select id="ekstrakurikuler_id" name="ekstrakurikuler_id" required>
                    <option value="Paskibra">Paskibra</option>        
                    <option value="OSIS">OSIS</option>      
                    <option value="Karya Ilmiah Remajan">Karya Ilmiah Remaja</option>
                    <option value="Basket">Basket</option>    
                    <option value="Kerohanian Islam">Kerohanian Islam</option>        
                </select>
            </div>
            <div class="form-group">
                <label for="alasan_pendaftaran">Alasan</label><br>
                <textarea id="alasan_pendaftaran" name="alasan_pendaftaran" required ></textarea>
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