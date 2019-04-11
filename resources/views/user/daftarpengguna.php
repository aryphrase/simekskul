@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Pengguna</h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th style="width:2%;">No</th>
        			<th style="width:20%;">Nama Pengguna</th>
                    <th style="width:20%;">Email</th>
        			<th style="width:10%;">Action</th>
        		</tr>
                <?php $i = 0 ?>
                @foreach($siswa as $siswa)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$siswa->username}}</td>
        			<td>{{$siswa->email}}</td>
                    @if($jenis == 1)
                    <td>{{ link_to_route('siswa.edit','Ubah Password',[$users->id],['class'=>'btn btn-primary btn-md']) }}
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