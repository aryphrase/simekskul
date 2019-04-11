<!DOCTYPE html>
<html>
<head>
	<title>laporankeuangan.pdf</title>
	<style type="text/css">
		@page { 
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
			<p class="wide-spacing1" style="text-align:center;font-size:20px;text-transform:uppercase;"><strong>Laporan Keuangan Ekstrakurikuler {{$name}}<strong></p>
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
                @foreach($pemasukan as $pemasukan)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$pemasukan->item_pemasukan}}</td>
        			<td>{{$pemasukan->tanggal_pemasukan}}</td>
        			<td>{{$pemasukan->nama_sumberpemasukan}}</td>
        			<td>{{$pemasukan->nominal_pemasukan}}</td>
        			<td>{{$pemasukan->pic_pemasukan}}</td>
                @endforeach
        		</tr>
			</table>
			<br>
			<table class="wide-spacing2">
        		<tr>
        			<td>Total Pemasukan dari Anggaran Sekolah</td>
        			<td>Rp. {{$jumlah_bos}}</td>
        		</tr>
                <tr>
                    <td>Total Pemasukan dari Sponsor</td>
                    <td>Rp. {{$jumlah_sponsor}}</td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Hibah atau Sumbangan</td>
                    <td>Rp. {{$jumlah_hibah}}</td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari CSR (Corporate Social Responsibility)</td>
                    <td>Rp. {{$jumlah_csr}}</td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Dana Usaha Mandiri</td>
                    <td>Rp. {{$jumlah_danus}}</td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Pinjaman Bank</td>
                    <td>Rp. {{$jumlah_pinjambank}}</td>
                </tr>
                <tr>
                    <td>Total Pemasukan dari Pinjaman selain bank</td>
                    <td>Rp. {{$jumlah_pinjamnonbank}}</td>
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
                @foreach($pengeluaran as $pengeluaran)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$pengeluaran->item_pengeluaran}}</td>
        			<td>{{$pengeluaran->tanggal_pengeluaran}}</td>
        			<td>{{$pengeluaran->nama_jenispengeluaran}}</td>
        			<td>{{$pengeluaran->nominal_pengeluaran}}</td>
        			<td>{{$pengeluaran->pic_pengeluaran}}</td>
                @endforeach
        		</tr>
			</table>
			<br>
			<table class="wide-spacing2">
                <tr>
                    <td>Total Pengeluaran untuk Pembelian</td>
                    <td>Rp {{$jumlah_beli}}</td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Pembayaran Jasa</td>
                    <td>Rp {{$jumlah_bayarjasa}}</td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Pembayaran Hutang</td>
                    <td>Rp {{$jumlah_bayarhutang}}</td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Honorarium</td>
                    <td>Rp {{$jumlah_honor}}</td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Donasi</td>
                    <td>Rp {{$jumlah_donasi}}</td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Iuran</td>
                    <td>Rp {{$jumlah_iuran}}</td>
                </tr>
        	</table>
		</div>

		<footer>
		<p style="font-size:8px;font-family:'Courier', sans-serif;">Generated by Simekskul. {{\Carbon\Carbon::now()}} + 7h (Western Indonesian Time)</p>
		</footer>
	</body>
</html>