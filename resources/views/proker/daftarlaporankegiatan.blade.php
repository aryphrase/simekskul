@extends('layout.master')

@section('content')
<div class="wrapper">
    
	@include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <br>
        <h2>Daftar Laporan Kegiatan</h2>
        <hr>

        @if(session()->has('added'))
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{ session('added') }}
            </div>
        @elseif(session()->has('edited'))
            <div class="alert alert-success fade in" style="width:100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{ session('edited') }}
            </div>
        @endif

        <div class="search-box">
            <div class="row">
                <div class="col col-md-9 space">
                    &nbsp;
                </div>
                <div class="col col-md-3 space">
                    <form class="search" action="#">
                        <input type="text" placeholder="Cari.." name="search">
                        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table>
                <tr>
                    <th>No</th>
                    <th>Judul Laporan</th>
                    <th>Tanggal Laporan</th>
                    <th colspan="3">Action</th>
                </tr>
                <?php $i = 0 ?>
                @foreach($laporan as $laporan)
                <?php $i++ ?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$laporan->judul_laporan}}</td>
                    <td>a</td>
                    <td width="5%">{{ link_to_route('laporan.cetakpdfsatuan', 'PDF',[$laporan->id_laporan],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    @if($jenis == 2)
                    <td width="5%">
                        {{ link_to_route('laporan.edit','Edit',[$laporan->id_laporan],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td width="5%">
                      
                    </td>
                    @endif
                @endforeach
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