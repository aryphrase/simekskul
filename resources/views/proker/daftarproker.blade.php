@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>


        <h2>Daftar Program Kerja dan Kegiatan Ekstrakurikuler {{$name}}</h2>
        <hr>

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

        <div class="dropdown-filter">
            <div class="row">
                <div class="col col-md-3 space">
                    <select name="kelas" id="kelas" style="">
                        <option value="">pilih jenis</option>
                    </select>
                </div>
                <div class="col col-md-3 space">
                    <select name="kelas" id="angkatan">
                        <option value="">pilih status</option>
                    </select>
                </div>
                <div class="col col-md-3 space">
                    <button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                </div>
            </div>
        </div>

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
        
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Program Kerja</th>
                    <th>Jenis</th>
        			<th>Tempat Penyelenggaraan</th>
        			<th>Tanggal</th>
        			<th>Rencana Anggaran</th>
        			<th colspan="3">Action</th>
        		</tr>
                <?php $i = 0 ?>
                @foreach($proker as $proker)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$proker->nama_proker}}</td>
                    <td>{{$proker->nama_jenisproker}}</td>
        			<td>{{$proker->tempat_proker}}</td>
        			<td>{{$proker->waktu_proker}}</td>
                    <td>Rp. {{$proker->anggaran_proker}}</td>
        			<td width="5%">
        				<button class="btn btn-success"><a href="{{url('/proker/'.$proker->id_proker.'/show')}}" style="color:#fff;"><small>Lihat Selengkapnya</small></a></button>
        			</td>
        			@if($jenis == 2)
                    <td width="5%">{{ link_to_route('proker.edit','Edit',[$proker->id_proker],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td width="5%">
                      {!! Form::open(array('route'=>['proker.destroy',$proker->id_proker],'method'=>'DELETE','onsubmit'=>'return ConfirmDelete()')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit'] ) !!}
                      {!! Form::close() !!} 
                    </td>
                    @endif
                @endforeach
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 

@include('script.sidebarjs')


@endsection