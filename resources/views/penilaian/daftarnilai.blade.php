@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

   	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Rincian Ekstrakurikuler {{$name}}</h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th>No</th>
        			<th>Nama Siswa</th>
        			<th>Nilai</th>
        			<th>Deskripsi</th>
        			<th>Semester</th>
                    @if($jenis == 3)
        			<th colspan="2" style="width:5%">Action</th>
                    @endif
        		</tr>
                <?php $i = 0 ?>
        		@foreach($penilaian as $penilaian)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$penilaian->nama_siswa}}</td>
        			<td>{{$penilaian->nama_nilai}}</td>
        			<td>{{$penilaian->deskripsi_nilai}}</td>
                    <td>{{$penilaian->nama_semester}}</td>
                    @if($jenis == 3)
                    <td>
                        {{ link_to_route('penilaian.edit','Edit',[$penilaian->id_penilaian],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td>
                         {!! Form::open(array('route'=>['penilaian.destroy',$penilaian->id_penilaian],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                        {!! Form::close() !!} 
                    </td>
                    @endif
        		</tr>
        		@endforeach
        	</table>
        </div>
    </div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')


@endsection