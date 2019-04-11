<!DOCTYPE html>
<html>
<head>
	<title><?php echo e($namafile); ?>.pdf</title>
	<style type="text/css">
		@page  { 
			margin: 0.5in 0.5in;
        }
        body{
        	margin:30px;
        	line-height: 0.6;
        	font-size:12pt;
        }
        .container{
            padding : 5px;
            line-height: 1.5;
        }
        .wide-spacing1{
        	line-height: 1.5;
        }
        .wide-spacing2{
        	line-height: 1.0;
        }
        .wide-spacing3{
            line-height: 2.5;
        }
        .page-break {
            page-break-after: always;
        } 
        table{
        	width: 100%;
        	border: 1pt solid black;
        	border-collapse: collapse;
        	font-size : 12px;
            padding-bottom: 20px;
        }

        td,th{
            padding: 10px;
            border: 1px solid;
            padding-bottom: -10px;
        }

        .no-border{
            /*border-spacing :0px;*/
            border-collapse: collapse;
            /*border-style: outset;*/
            border : 1px solid #fff;
        }

        table.no-border th, table.no-border td{
            border : 1px solid #fff;
        }

        tr.sempit{
            padding-bottom: 0;
        } 

        footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px; }
	</style>
</head>
	<body>
        <?php $__currentLoopData = $proposal1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="cover" class="wide-spacing3 page-break" style="font-size: 18pt";>
            <p align="center"><?php echo e($judulcover); ?><br><?php echo e($namaekskul); ?></p>
            <br><br><br><br><br>
            <br><br><br>
            <p align="center">SMA NEGERI 4 SURAKARTA<br>Jalan L.U. Adi Sucipto No.1 Surakarta</p>
        </div>

		<div id="header">
			<p style="text-align:center;font-size:14pt;"><?php echo e($namaekskul); ?></p>
			<p style="text-align:center;font-size:16pt;"><strong>SMA NEGERI 4 SURAKARTA</strong></p>
			<p style="text-align:center;font-size:10pt">Jalan L.U. Adi Sucipto No.1 Telp (0271) 711943 Fax. (0271) 728616  Surakarta 57139 (0271) 5534454</p>
			<hr>
		</div>
		
        <div id="proposal-depan" class="wide-spacing2 page-break" style="font-size: 12pt";>
		  <ol type="A">
            <li><strong>PENDAHULUAN</strong></li>
            <?php echo $proposal->pendahuluan; ?>

            <li><strong>NAMA KEGIATAN</strong></li>
            <div class="container">
                <?php echo $proposal->nama_kegiatan; ?>

            </div>
            <li><strong>DASAR KEGIATAN</strong></li>
            <div class="container">
                <?php echo $proposal->dasar_kegiatan; ?>

            </div>
            <li><strong>TUJUAN</strong></li>
            <div class="container">
                <?php echo $proposal->tujuan_kegiatan; ?>

            </div>
            <li><strong>SASARAN</strong></li>
            <p><em>(terlampir)</em></p>
            <li><strong>PELAKSANAAN KEGIATAN</strong></li>
            <div class="container">
                <?php echo $proposal->pelaksanaan_kegiatan; ?>

            </div>
            <li><strong>SUSUNAN PANITIA</strong></li>
            <p><em>(terlampir)</em></p>
            <li><strong>SUSUNAN ACARA</strong></li>
            <p><em>(terlampir)</em></p>
            <li><strong>REALISASI DANA</strong></li>
            <p><em>(terlampir)</em></p>
            <li><strong>PENUTUP</strong></li>
            <div class="container">
            <?php echo $proposal->penutup; ?>

            </div>
            <li><strong>LEMBAR PENGESAHAN</strong></li>
            <p><em>(terlampir)</em></p>
          </ol>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div id="sasaran" class="wide-spacing2 page-break" style="font-size: 12pt";>
            <p><em>Lampiran 1</em></p>
            <p align="center"><strong>SASARAN</strong></p>
            <div class="container">
            <?php echo $proposal->sasaran; ?>

            </div>
        </div>

        <div id="susunan-panitia" class="wide-spacing2 page-break" style="font-size: 12pt";>
            <p><em>Lampiran 2</em></p>
            <p align="center"><strong>SUSUNAN PANITIA</strong></p>
            <div class="container">
            <?php echo $proposal->susunan_panitia; ?>

            </div>
        </div>

        <div id="susunan-acara" class="wide-spacing2 page-break" style="font-size: 12pt";>
            <p><em>Lampiran 3</em></p>
            <p align="center"><strong>SUSUNAN ACARA</strong></p>
            <div class="container">
            <?php echo $proposal->susunan_acara; ?>

            </div>
        </div>

        <div id="realisasi-dana" class="wide-spacing2 page-break" style="font-size: 12pt";>
            <p><em>Lampiran 4</em></p>
            <p align="center"><strong>REALISASI DANA</strong></p>
            <div class="container">
            <ol type="A">
                <li>PEMASUKAN</li>
                <?php echo $proposal->pemasukan_kegiatan; ?>

                <li>PENGELUARAN</li>
                <?php echo $proposal->pengeluaran_kegiatan; ?>

            </ol>
            </div>
        </div>

        <div id="lembar pengesahan" class="wide-spacing2" style="font-size: 12pt";>
            <p><em>Lampiran 5</em></p>
            <p align="center"><strong>LEMBAR PENGESAHAN</strong></p>
            <table class="no-border">
                <tr>
                    <td>
                        <p align="center"><strong>Ketua <?php echo e($name); ?></strong></p>
                        <br><br><br><br>
                        <p align="center"><?php echo e($proposal->ketua_ekskul); ?></p>
                    </td>
                    <td>
                        <p align="center"><strong>Ketua Pelaksana</strong></p>
                        <br><br><br><br>
                        <p align="center"><?php echo e($proposal->ketua_pelaksana); ?></p>
                    </td>
                </tr>
                <?php $__currentLoopData = $sekolah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sekolah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <p align="center"><strong>Ketua OSIS</strong></p>
                        <br><br><br><br>
                        <p align="center"><?php echo e($sekolah->nama_ketuaosis); ?></p>
                    </td>
                    <td>
                        <p align="center"><strong>Kasie VII OSIS</strong></p>
                        <br><br><br><br>
                        <p align="center"><?php echo e($sekolah->nama_kasie7); ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p align="center"><strong>Wakasek Kesiswaan</strong></p>
                        <br><br><br><br>
                        <p align="center"><?php echo e($sekolah->nama_wkkesiswaan); ?></p>
                    </td>
                    <td>
                        <p align="center"><strong>Pembina <?php echo e($name); ?></strong></p>
                        <br><br><br><br>
                        <p align="center">Hanna Anisa</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p align="center">Mengetahui,<br><strong>Plt. Kepala<br>SMA Negeri 4 Surakarta</strong></p>
                        <br><br><br><br>
                        <p align="center"><?php echo e($sekolah->nama_kepsek); ?></p>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>

		<footer>
		<p style="font-size:8px;font-family:'Courier', sans-serif;">Generated by Simekskul. <?php echo e(\Carbon\Carbon::now()); ?> + 7h (Western Indonesian Time)</p>
		</footer>
	</body>
</html>