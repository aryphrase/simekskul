@extends('layout.master')

@section('content')
<div class="wrapper">
    
	@include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <br>
        <h2>Daftar Ekstrakurikuler SMA Negeri 4 Surakarta</h2>
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
                    <button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                </div>
            </div>
        </div>

        <h2>Daftar Guru</h2>
        <hr>
        <div style="overflow-x: auto;">
            <table>
                <tr>
                    <th style="width:5%">No</th>
                    <th style="width:20%">Nama</th>
                    <th style="width:40%">Alamat</th>
                    <th style="width:5%">Nomor HP</th>
                    <th style="width:10%" colspan="3">Action</th>
                </tr>
                <?php $i = 0 ?>
                @foreach($ekskul as $ekskul)
                <?php $i++ ?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$ekskul->username}}</td>
                    <td>
                        <button class="btn btn-success"><a href="{{url('/ekskul/'.$ekskul->id.'/buatdataekskul')}}" style="color:#fff;">Buat Data</a></button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- @foreach($ekskul as $ekskul)
        <div class="grid-card card">
			<table class="borderless">
				<tr>
					<td width="10%"><img class="img-circle" style="width:100%;" src="{{ URL::asset('assets/images/profile.jpg') }}" />
					<td><a href="#"><h4>{{$ekskul->nama_ekskul}}</h4></a><br><p>Jumlah Anggota :</p></td>
					<td width="10%">
						<button class="btn btn-success"><a href="{{url('/ekskul/'.$ekskul->id_ekskul.'/show')}}" style="color:#fff;">Lihat Profil</a></button>
					</td>
					@if($jenis == 2)
					<td width="5%">
						{{ link_to_route('ekskul.edit','Edit',[$ekskul->id_ekskul],['class'=>'btn btn-primary btn-md']) }}
					</td>
					<td width="10%">
						{!! Form::open(array('route'=>['ekskul.destroy',$ekskul->id_ekskul],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                      	{!! Form::close() !!} 
					</td>
					@endif
				</tr>
			</table>
		</div>
		@endforeach -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')


@endsection