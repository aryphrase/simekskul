@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Data Rincian Kas Ekstrakurikuler {{$name}}</h2>
        <hr>
        @if(session()->has('pemasukanadded'))
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{ session('pemasukanadded') }}
            </div>
        @elseif(session()->has('pengeluaranadded'))
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{ session('pengeluaranadded') }}
            </div>
        @elseif(session()->has('pemasukanedited'))
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{ session('pemasukanedited') }}
            </div>
        @elseif(session()->has('pengerluaranedited'))
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{ session('pengerluaranedited') }}
            </div>
        @endif

        <h3>Pemasukan</h3>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Pemasukan</th>
        			<th>Tanggal</th>
        			<th>Jenis Pemasukan</th>
        			<th>Nominal</th>
        			<th>Penanggung Jawab</th>
        			<th colspan="2">Action</th>
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
        			<td width="5%">
                        <button class="btn btn-success"><a href="{{url('/keuangan/pemasukan/'.$pemasukan->id_pemasukan.'/showpemasukan')}}" style="color:#fff;"><small>Lihat Selengkapnya</small></a></button>
                    </td>
                    <td width="5%">{{ link_to_route('keuangan.editPemasukan','Edit',[$pemasukan->id_pemasukan],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td width="5%">
                      {!! Form::open(array('route'=>['keuangan.destroyPemasukan',$pemasukan->id_pemasukan],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                      {!! Form::close() !!} 
                    </td>
        		</tr>
                @endforeach
        	</table>
        </div>
        <br>
        <div style="overflow-x: auto;width: 50%;">
        	<table>
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
                    <td>Total Pemasukan dari Iuran Kas</td>
                    <td>Rp. {{$jumlah_iuran}}</td>
                </tr>
        	</table>
        </div>

        <hr>

        <h3>Pengeluaran</h3>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Pengeluaran</th>
        			<th>Tanggal</th>
        			<th>Jenis Pengeluaran</th>
        			<th>Nominal</th>
        			<th>Penanggung Jawab</th>
        			<th colspan="2">Action</th>
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
        			<td width="5%">
                        <button class="btn btn-success"><a href="{{url('/keuangan/pengeluaran/'.$pengeluaran->id_pengeluaran.'/showpengeluaran')}}" style="color:#fff;"><small>Lihat Selengkapnya</small></a></button>
                    </td>
                    <td width="5%">{{ link_to_route('keuangan.editPengeluaran','Edit',[$pengeluaran->id_pengeluaran],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td width="5%">
                      {!! Form::open(array('route'=>['keuangan.destroyPengeluaran',$pengeluaran->id_pengeluaran],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                      {!! Form::close() !!} 
                    </td>
        		</tr>
                @endforeach
        	</table>
        </div>
        <br>
        <div style="overflow-x: auto;width: 50%;">
        	<table>
                <tr>
                    <td>Total Pengeluaran untuk Pembelian</td>
                    <td>Rp {{$jumlah_beli}}</td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Pembayaran Hutang</td>
                    <td>Rp {{$jumlah_bayaracara}}</td>
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
                    <td>Total Pengeluaran untuk Iuran Organisasi</td>
                    <td>Rp {{$jumlah_iuranorganisasi}}</td>
                </tr>
        	</table>
        </div>
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')


@endsection