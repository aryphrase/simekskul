@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Pembina Ekstrakurikuler</h2>
        <hr>

        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <a style="color:#fff;" href="{{ url('/pembinaan/create')}}">Tambah Pembina Ekstrakurikuler</a>
        </button>
        <br><br>

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
                        <option value="">pilih status</option>
                    </select>
                </div>
                <div class="col col-md-3 space">
                    <button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th style="width:2%;">No</th>
        			<th style="width:5%;">Nama</th>
        			<th style="width:8%;">Ekstrakurikuler</th>
                    @if($jenis == 1)
        			<th colspan="2" style="width:10%;">Action</th>
                    @endif
        		</tr>
                <?php $i = 0 ?>
                @foreach($pembinaan as $pembinaan)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$pembinaan->nama_pembina}}</td>
        			<td>{{$pembinaan->nama_ekskul}}</td>
                    @if($jenis == 1)
                    <td>
                      {!! Form::open(array('route'=>['pembinaan.destroy',$pembinaan->id_pembinaan],'method'=>'DELETE')) !!}
                          
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