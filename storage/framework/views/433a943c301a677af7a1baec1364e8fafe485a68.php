<!DOCTYPE html>
<html>
<head>
<?php $__currentLoopData = $rapat1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rapat1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<title>notulen-<?php echo e($namafile); ?>.pdf</title>
	<style type="text/css">
		@page  { 
			margin: 0.5in 0.5in;
        }
        body,p{
        	margin:30px;
        	line-height: 1.5;
        	font-size:12pt;
        }
        .container{
            padding-bottom : 5px;
            line-height: 1.5;
        }
        .wide-spacing1{
        	line-height: 1.5;
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
            line-height: 1.5;
        }

        td,th{
            padding: 10px;
            border: 1px solid;
            line-height: 1.5;
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
		<div id="header">
			<p style="text-align:center;">PEMERINTAH PROVINSI JAWA TENGAH</p>
			<p style="text-align:center;">DINAS PENDIDIKAN</p>
			<p style="text-align:center;font-size:20px;"><strong>SMA NEGERI PERCONTOHAN</strong></p>
			<p style="text-align:center;">Jalan Srikaya 26 Surakarta, Jawa Tengah (0271) 5534454</p>
			<hr>
		</div>
		
		<div id="container">
			<p class="wide-spacing1" style="text-align:center;font-size:20px;text-transform:uppercase;"><strong>Notulen <?php echo e($rapat1->nama_rapat); ?></strong></p>
			
			<div id="tabel">
				<table style="border:0;" class="wide-spacing2">
					<tr>
						<td style="border:0;">Jenis</td>
						<td style="border:0;"><?php echo e($rapat1->nama_jenisrapat); ?></td>
					</tr>
					<tr>
						<td style="border:0;">Lokasi</td>
						<td style="border:0;"><?php echo e($rapat1->tempat_rapat); ?></td>
					</tr>
					<tr>
						<td style="border:0;">Peserta</td>
						<td style="border:0;"><?php echo e($rapat1->peserta_rapat); ?></td>
					</tr>
					<tr>
						<td style="border:0;">Waktu</td>
						<td style="border:0;"><?php echo e($rapat1->tanggal_rapat); ?>, <?php echo e($rapat1->waktumulai_rapat); ?> - <?php echo e($rapat1->waktuselesai_rapat); ?></td>
					</tr>
					<tr>
						<td style="border:0;">Agenda</td>
						<td style="border:0;"></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo e($rapat1->agenda_rapat); ?></td>
					</tr>
					<tr>
						<td style="border:0;">Hasil</td>
						<td style="border:0;"></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo e($rapat1->hasil_rapat); ?></td>
					</tr>
				</table>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<div id="signature">
				<table style="border:0;" class="wide-spacing2">
					<tr>
						<td style="border:0;width:50%;">
							<br><br>
							<p style="text-align:center;">Pembina Ekstrakurikuler,</p>
							<br><br><br><br><br><br>
							<?php $__currentLoopData = $pembina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<p style="text-align:center;"><?php echo e($pembina->nama_pembina); ?></p>
							<p style="text-align:center;">NIP. <?php echo e($pembina->nip_pembina); ?></p>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td style="border:0;width:50%;">
							<p style="text-align:center;">Surakarta, <?php echo e($tanggal); ?></p>
							<p style="text-align:center;">Ketua Ekstrakurikuler<br><?php echo e($name); ?>,</p>
							<br><br><br><br><br><br>
							<?php $__currentLoopData = $ketua; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ketua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<p style="text-align:center;"><?php echo e($ketua->nama_siswa); ?></p>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<footer>
		<p style="font-size:8px;font-family:'Courier', sans-serif;">Generated by Simekskul. <?php echo e(\Carbon\Carbon::now()); ?> + 7h (Western Indonesian Time)</p>
		</footer>
	</body>
</html>