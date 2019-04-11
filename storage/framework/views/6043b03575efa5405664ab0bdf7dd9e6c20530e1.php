<?php $__env->startSection('content'); ?>
<div class="wrapper">
    
    <?php echo $__env->make('layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Buat Proposal Kegiatan</h2>
        <hr>
        <form class="edit-form" action="<?php echo e(url('/inputdataproposal')); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div id="info-form" style="font-size:12px;padding:12px">
                <h4>Panduan Pengisian Form</h4>
                <ol>
                    <li>Isi form dengan keadaan yang sebenar-benarnya</li>
                    <li>Ada info bantuan yang bisa anda lihat dengan mengklik <i class="glyphicon glyphicon-question-sign help"></i></li>
                    <li>Di beberapa <em>field</em> ada templat berbentuk tabel yang bisa langsung anda gunakan</li>
                </ol>
            </div>

        	<div class="form-group">
                <label for="judul_proposal">Judul
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#judul_proposal"></i>
                </label><br>
                <div id="judul_proposal" class="collapse" style="font-size:12px;padding:10px">
                    Contoh : "Proposal Lomba Puisi se-Kota Surakarta"
                </div>
                <input type="text" id="judul_proposal" name="judul_proposal" required />   
            </div>
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#nama_kegiatan"></i>
                </label><br>
                <div id="nama_kegiatan" class="collapse" style="font-size:12px;padding:10px">
                    Contoh : "Lomba Puisi se-Kota Surakarta"
                </div>
                <input type="text" id="nama_kegiatan" name="nama_kegiatan" required />   
            </div>
            <div class="form-group">
                <label for="ketua_ekskul">Ketua Ekstrakurikuler</label><br>
                <input type="text" id="ketua_ekskul" name="ketua_ekskul" required />   
            </div>
            <div class="form-group">
                <label for="ketua_pelaksana">Ketua Pelaksana / Penanggung Jawab</label><br>
                <input type="text" id="ketua_pelaksana" name="ketua_pelaksana" required />   
            </div>
            <div class="form-group">
                <label for="pendahuluan">Pendahuluan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#pendahuluan"></i>
                </label><br>
                <div id="pendahuluan" class="collapse" style="font-size:12px;padding:10px">
                    <strong>Contoh :</strong> 
                    <p>Esktrakurikuler X akan mengadakan kegiatan ... Kegiatan ini adalah salah satu kegiatan yang dilaksanakan oleh Esktrakurikuler X setiap tahun. Kegiatan ini bertujuan untuk ..., sehingga mampu ... Kegiatan ini juga diharapkan ....
                    </p>
                    <p>
                    Untuk kepentingan itulah, Esktrakurikuler X merasa perlu untuk mengadakan kegiatan ini dengan harapan .... 
                    </p>
                </div>
                <textarea id="pendahuluan" name="pendahuluan"></textarea>
            </div>
            <div class="form-group">
                <label for="dasar_kegiatan">Dasar Kegiatan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#dasar_kegiatan"></i>
                </label><br>
                <div id="dasar_kegiatan" class="collapse" style="font-size:12px;padding:10px">
                    <strong>Contoh :</strong> 
                    "Program kerja Ekstrakurikuler 2018/2019"
                </div>
                <textarea id="dasar_kegiatan" name="dasar_kegiatan"></textarea>
            </div>
            <div class="form-group">
                <label for="tujuan_kegiatan">Tujuan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#tujuan_kegiatan"></i>
                </label><br>
                <div id="tujuan_kegiatan" class="collapse" style="font-size:12px;padding:10px">
                    <strong>Contoh :</strong> 
                    <ol>
                        <li>Meningkatkan dan memantapkan ilmu kepalangmerahan</li>
                        <li>Membentuk insan yang berbudi luhur, berwawasan luas, kreatif, berjiwa sosial tinggi, serta memiliki rasa solidaritas terhadap sesama manusia yang tinggi pula</li>
                        <li>Memupuk rasa kebersamaan dan meningkatkan mutu dan kualitas sumber daya manusia</li>
                        <li>Berkarya dan berbakti di masyarakat </li>
                        <li>Mendidik Mental dan fisik anggota PMR selanjutnya</li>
                        <li>Mempererat hubungan antar Anggota dan antar Angkatan</li>
                    </ol>
                </div>
                <textarea id="tujuan_kegiatan" name="tujuan_kegiatan">
                    <ol>
                        <li>Tujuan 1</li>
                        <li>Tujuan 2</li>
                        <li>Tujuan 3</li>
                    </ol>
                </textarea>
            </div>
            <div class="form-group">
                <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#pelaksanaan_kegiatan"></i>
                </label><br>
                <div id="pelaksanaan_kegiatan" class="collapse" style="font-size:12px;padding:10px">
                    <strong>Contoh :</strong> 
                    <ol>
                    <li>DIKLAT RUANG
                        <table style="border:1px solid #fff">
                        <tr>
                            <td>Hari, tanggal</td>
                            <td>:</td>
                            <td>Senin-Rabu, 8-10 Oktober 2018</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>16.00 – 17.30 WIB</td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td>Ruang Multimedia SMA Negeri 4 Surakarta</td>
                        </tr>
                        </table>
                    </li>
                    </ol>
                </div>
                <textarea id="pelaksanaan_kegiatan" name="pelaksanaan_kegiatan">
                    <?php echo $__env->make('layout.rtf_pelaksanaankegiatan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="penutup">Penutup
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#penutup"></i>
                </label><br>
                <div id="penutup" class="collapse" style="font-size:12px;padding:10px">
                    <strong>Contoh :</strong>
                    <p>Demikian rencana kegiatan ini kami susun dengan harapan mampu memberikan ....</p>

                    <p>Kami menyadari bahwa kegiatan ini tidak dapat berjalan dengan lancar sesuai yang kita harapkan tanpa bantuan, dukungan, partisipasi, dan kerja sama dari pihak-pihak yang terkait. Maka dari itu, kami mengharap adanya koordinasi yang baik dan menyeluruh dari ....</p>

                    <p>Atas perhatian dan kerjasama semua pihak, kami ucapkan terima kasih.</p>
                </div>

                <textarea id="penutup" name="penutup"></textarea>
            </div>
            <div class="form-group">
                <label for="sasaran">Sasaran
                <i class="glyphicon glyphicon-question-sign help" data-toggle="collapse" data-target="#sasaran"></i>
                </label><br>
                <div id="sasaran" class="collapse" style="font-size:12px;padding:10px">
                    
                </div>
                <textarea id="sasaran" name="sasaran">
                    <?php echo $__env->make('layout.rtf_sasaran', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="susunan_panitia">Susunan Panitia</label><br>
                <textarea id="susunan_panitia" name="susunan_panitia">
                    <?php echo $__env->make('layout.rtf_panitia', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="susunan_acara">Susunan Acara</label><br>
                <textarea id="susunan_acara" name="susunan_acara">
                    <?php echo $__env->make('layout.rtf_acara', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="pemasukan_kegiatan">Estimasi Pemasukan Kegiatan</label><br>
                <textarea id="pemasukan_kegiatan" name="pemasukan_kegiatan">
                    <?php echo $__env->make('layout.rtf_pemasukan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="pengeluaran_kegiatan">Estimasi Pengeluaran Kegiatan</label><br>
                <textarea id="pengeluaran_kegiatan" name="pengeluaran_kegiatan">
                    <?php echo $__env->make('layout.rtf_pengeluaran', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </textarea>
            </div>

            <?php $__currentLoopData = $ekskul2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="ekskul_id" value="<?php echo e($ekskul2->id_ekskul); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="user_id" value="<?php echo e($auth); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            
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

<?php echo $__env->make('script.texteditorjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('script.sidebarjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>