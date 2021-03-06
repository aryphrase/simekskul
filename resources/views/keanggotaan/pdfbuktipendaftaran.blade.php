<!DOCTYPE html>
<html>
<head>
@foreach($pendaftaran1 as $pendaftaran1)
	<title>notulen-{{$namaekskul}}-{{$namasiswa}}.pdf</title>
	<style type="text/css">
		@page { 
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
		<div id="container">
			<p class="wide-spacing1" style="text-align:center;font-size:20px;text-transform:uppercase;"><strong>Bukti Pendaftaran Ekstrakurikuler {{$pendaftaran1->nama_ekskul}}</strong></p>
			
			<div id="tabel">
				<table style="border:0;" class="wide-spacing2">
					<tr>
						<td style="border:0;">Nama</td>
						<td style="border:0;">{{$pendaftaran1->nama_siswa}}</td>
					</tr>
					<tr>
						<td style="border:0;">Kelas</td>
						<td style="border:0;">{{$pendaftaran1->nama_kelas}}</td>
					</tr>
					<tr>
						<td style="border:0;">Alasan Bergabung</td>
						<td style="border:0;">{{$pendaftaran1->alasan_bergabung}}</td>
					</tr>
				</table>
			</div>
		

			<div id="signature">
				<table style="border:0;" class="wide-spacing2">
					<tr>
						<td style="border:0;width:50%;">
							
						</td>
						<td style="border:0;width:50%;">
							<p style="text-align:center;">Surakarta, {{$tanggal}}</p>
							<p style="text-align:center;">Pendaftar,</p>
							<br><br><br><br><br><br>
							<p style="text-align:center;">{{$pendaftaran1->nama_siswa}}</p>
						</td>
					</tr>
				</table>
			</div>
		</div>
		@endforeach
		<footer>
		<p style="font-size:8px;font-family:'Courier', sans-serif;">Generated by Simekskul. {{\Carbon\Carbon::now()}} + 7h (Western Indonesian Time)</p>
		</footer>
	</body>
</html>