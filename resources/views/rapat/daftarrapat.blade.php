@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Notulen Rapat</h2>
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
        			<th>Nama Rapat</th>
        			<th>Tempat</th>
        			<th>Waktu</th>
        			<th colspan="4">Action</th>
        		</tr>
                <?php $i = 0 ?>
                @foreach($rapat as $rapat)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$rapat->nama_rapat}}</td>
        			<td>{{$rapat->tempat_rapat}}</td>
        			<td>{{$rapat->tanggal_rapat}} {{$rapat->waktumulai_rapat}} - {{$rapat->waktuselesai_rapat}}</td>
        			<td width="5%">
                        <button class="btn btn-success"><a href="{{url('/rapat/'.$rapat->id_rapat.'/show')}}" style="color:#fff;"><small>Lihat Selengkapnya</small></a></button>
                    </td>
                    <td width="5%">{{ link_to_route('rapat.cetakpdfsatuan', 'Cetak',[$rapat->id_rapat],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td width="5%">{{ link_to_route('rapat.edit','Edit',[$rapat->id_rapat],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td width="5%">
                      {!! Form::open(array('route'=>['rapat.destroy',$rapat->id_rapat],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                      {!! Form::close() !!} 
                    </td>
        		</tr>
                @endforeach
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