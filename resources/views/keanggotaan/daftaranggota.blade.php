@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        @if(($jenis == 1) || ($jenis == 4))
            <h2>Daftar Anggota Ekstrakurikuler</h2>
        @elseif ($jenis == 2)
            <h2>Daftar Anggota Ekstrakurikuler {{$name}}</h2>
        @elseif ($jenis == 3)
            <h2>Daftar Anggota Ekstrakurikuler yang berada dalam binaan anda</h2>
        @endif
        <hr>

        <div class="search-box">
            <div class="row">
                <div class="col col-md-9 space">
                    &nbsp;
                </div>
                <div class="col col-md-3 space">
                    {!! Form::open(['method'=>'GET','url'=>'keanggotaan/carianggota','role'=>'search']) !!}                    
                        <input type="text" placeholder="Cari.." name="search">
                        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="dropdown-filter">
            <div class="row">
                <div class="col col-md-3 space">
                    <select name="kelas" id="kelas" style="">
                        <option value="">pilih kelas</option>
                    </select>
                </div>
                <div class="col col-md-3 space">
                    <select name="kelas" id="angkatan">
                        <option value="">pilih status</option>
                    </select>
                </div>
                @if($jenis == 1)
                <div class="col col-md-3 space">
                    <select name="kelas" id="kelas">
                        <option value="">pilih ekstrakurikuler</option>
                    </select>
                </div>
                @endif
                <div class="col col-md-3 space">
                    <button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama</th>
                    <th>Kelas</th>
                    <th>Status Anggota</th>
                    <th>Jabatan</th>
                    @if($jenis == 1)
                    <th>Ekstrakurikuler</th>
                    @endif
                    @if($jenis == 2)
                    <th colspan="3">Action</th>
                    @elseif(($jenis == 1) || ($jenis == 3) || ($jenis == 4))
                    <th>Action</th>
                    @endif
                </tr>
        		@if($keanggotaan->isEmpty())
        			<tr>
        				<td colspan="5">Belum ada data</td>
        			</tr>
        		@else
                <?php $i = 0 ?>
                @foreach($keanggotaan as $keanggotaan)
                <?php $i++ ?>
        		<tr>
                    
        			<td>{{$i}}</td>
        			<td>{{$keanggotaan->nama_siswa}}</td>
                    <td>{{$keanggotaan->nama_kelas}}</td>
                    <td>{{$keanggotaan->nama_statusanggota}}</td>
                    <td>{{$keanggotaan->jabatan}}</td>
                    @if($jenis == 1)
                    <td>{{$keanggotaan->nama_ekskul}}</td>
                    @endif
                    @if($jenis == 2)
                    <td><button class="btn btn-success"><a href="{{url('/siswa/'.$keanggotaan->id_siswa)}}" style="color:#fff;">Lihat Profil</a></button></td>
                    <td width="5%">{{ link_to_route('keanggotaan.editKeanggotaan','Edit',[$keanggotaan->id_keanggotaan],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td width="5%">
                      {!! Form::open(array('route'=>['keanggotaan.destroy',$keanggotaan->id_keanggotaan],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                      {!! Form::close() !!} 
                    </td>
                    @elseif(($jenis == 1) || ($jenis == 3) || ($jenis == 4))
                    <td><button class="btn btn-success"><a href="{{url('/siswa/'.$keanggotaan->id_siswa)}}" style="color:#fff;">Lihat Profil</a></button></td>
                    @endif
                @endforeach
                @endif
        		</tr>
        	</table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')

@endsection