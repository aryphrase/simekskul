@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Siswa</h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th style="width:2%;">No</th>
        			<th style="width:20%;">Nama</th>
        			<th style="width:8%;">Kelas</th>
                    <th style="width:30%;">Alamat</th>
        			<th style="width:10%;">Nomor HP Siswa</th>
        			<th style="width:10%;">Nomor HP Orang Tua</th>
        			<th colspan="3" style="width:10%;">Action</th>
        		</tr>
                <?php $i = 0 ?>
                @foreach($siswa as $siswa)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$siswa->nama_siswa}}</td>
        			<td>{{$siswa->nama_kelas}}</td>
                    <td>{{$siswa->alamat_siswa}}</td>
        			<td>{{$siswa->nomorhp_siswa}}</td>
        			<td>{{$siswa->nomorhp_ayah}}</td>
        			<td>
        				<button class="btn btn-success"><a href="{{url('/siswa/'.$siswa->id_siswa.'/show')}}" style="color:#fff;">Lihat Profil</a></button>
        			</td>
                    @if($jenis == 1)
                    <td>{{ link_to_route('siswa.edit','Edit',[$siswa->id_siswa],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td>
                      {!! Form::open(array('route'=>['siswa.destroy',$siswa->id_siswa],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                      {!! Form::close() !!} 
                    </td>
                    @endif
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