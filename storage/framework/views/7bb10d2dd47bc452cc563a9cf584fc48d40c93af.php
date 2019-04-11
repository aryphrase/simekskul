<!DOCTYPE html>
<html>
<head>
	<title>laporankeuangan.pdf</title>
	<style type="text/css">
		@page  { 
			margin: 0.5in 0.5in;
        }
        body{
        	margin:30px;
        	line-height: 0.6;
        	font-size:12px;
        }
        .wide-spacing1{
        	line-height: 1.5;
        }
        .wide-spacing2{
        	line-height: 1.0;
        }

        table{
        	width: 100%;
        	border: 1pt solid black;
        	border-collapse: collapse;
        	font-size:12px;
        }

        td,th{
        	padding: 10px;
        	border: 1px solid;
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
			<p class="wide-spacing1" style="text-align:center;font-size:20px;text-transform:uppercase;"><strong>Laporan Keuangan Ekstrakurikuler <?php echo e($name); ?><strong></p>
			<p style="text-align:center;font-size:14px;">Daftar Pemasukan</p>
			<table class="wide-spacing2">
				<tr>
        			<th>No</th>
        			<th>Nama Pemasukan</th>
        			<th>Tanggal</th>
        			<th>Jenis Pemasukan</th>
        			<th>Nominal</th>
        			<th>Penanggung Jawab</th>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $pemasukan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemasukan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($pemasukan->item_pemasukan); ?></td>
        			<td><?php echo e($pemasukan->tanggal_pemasukan); ?></td>
        			<td><?php echo e($pemasukan->nama_sumberpemasukan); ?></td>
        			<td><?php echo e($pemasukan->nominal_pemasukan); ?></td>
        			<td><?php echo e($pemasukan->pic_pemasukan); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</tr>
			</table>
			<br>
			<table class="wide-spacing2">
        		<tr>
        			<td>Total Pemasukan dari Anggaran Sekolah</td>
        			<td>Rp. <?php echo e($jumlah_bos); ?></td>
        		</tr>
                <tr>
                    <td>Total Pemasukan dari Sponsor</td>
                    <td>Rp. <?php echo e($jumlah_sponsor); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Hibah atau Sumbangan</td>
                    <td>Rp. <?php echo e($jumlah_hibah); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari CSR (Corporate Social Responsibility)</td>
                    <td>Rp. <?php echo e($jumlah_csr); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Dana Usaha Mandiri</td>
                    <td>Rp. <?php echo e($jumlah_danus); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Pinjaman Bank</td>
                    <td>Rp. <?php echo e($jumlah_pinjambank); ?></td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Pinjaman selain bank</td>
                    <td>Rp. <?php echo e($jumlah_pinjamnonbank); ?></td>
                </tr>
        	</table>
        	<br>
			<p style="text-align:center;font-size:14px;">Daftar Pengeluaran</p>
			<table class="wide-spacing2">
				<tr>
        			<th>No</th>
        			<th>Nama Pengeluaran</th>
        			<th>Tanggal</th>
        			<th>Jenis Pengeluaran</th>
        			<th>Nominal</th>
        			<th>Penanggung Jawab</th>
        		</tr>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $pengeluaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengeluaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
        		<tr>
        			<td><?php echo e($i); ?></td>
        			<td><?php echo e($pengeluaran->item_pengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->tanggal_pengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->nama_jenispengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->nominal_pengeluaran); ?></td>
        			<td><?php echo e($pengeluaran->pic_pengeluaran); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</tr>
			</table>
			<br>
			<table class="wide-spacing2">
                <tr>
                    <td>Total Pengeluaran untuk Pembelian</td>
                    <td>Rp <?php echo e($jumlah_beli); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Pembayaran Jasa</td>
                    <td>Rp <?php echo e($jumlah_bayarjasa); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Pembayaran Hutang</td>
                    <td>Rp <?php echo e($jumlah_bayarhutang); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Honorarium</td>
                    <td>Rp <?php echo e($jumlah_honor); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Donasi</td>
                    <td>Rp <?php echo e($jumlah_donasi); ?></td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Iuran</td>
                    <td>Rp <?php echo e($jumlah_iuran); ?></td>
                </tr>
        	</table>
		</div>

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

		<footer>
		<p style="font-size:8px;font-family:'Courier', sans-serif;">Generated by Simekskul. <?php echo e(\Carbon\Carbon::now()); ?> + 7h (Western Indonesian Time)</p>
		</footer>
	</body>
</html>