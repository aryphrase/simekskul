@extends('layout.master')

@section('content')
<div class="wrapper">
    
	@include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Lengkapi Data Ekstrakurikuler anda, di sini ...</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdataekskul')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">

             @if(count($errors))
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br/>
              <ul>
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
              </div>
            @endif
            
            @foreach($ekskul as $ekskul)
        	<div class="form-group{{ $errors->has('nama_siswa') ? 'has-error' : '' }}">
        		<label for="nama_ekskul">Nama Ekstrakurikuler</label><br>
                <p>{{ $ekskul->username }}</p>
        		<input type="text" id="nama_ekskul" name="nama_ekskul" required />
        	</div>
            @endforeach
            <div class="form-group">
                <label for="deskripsi_ekskul">Visi dan Misi</label><br>
                <textarea id="deskripsi_ekskul" name="deskripsi_ekskul" required></textarea>
                <span class="text-danger">{{ $errors->first('deskripsi_ekskul') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_ekskul">Logo Ekstrakurikuler</label><br>
                <input type="file" id="logo_ekskul" name="logo_ekskul" required />
                <span class="text-danger">{{ $errors->first('logo_ekskul') }}</span>
            </div>
            <div class="form-group">
                <label for="jenis_ekskul_id">Jenis Ekstrakurikuler</label><br>
                <select id="jenis_ekskul_id" name="jenis_ekskul_id">
                	@foreach($jenis_ekskul as $jenis_ekskul)
                    <option value="{{$jenis_ekskul->id_jenisekskul}}">{{$jenis_ekskul->nama_jenisekskul}}</option>
                    @endforeach
                </select>
            </div>
        	<hr>

            <input type="hidden" name="user_id" value="{{ $auth }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                <button class="btn .btn-danger danger" type="reset">Batal</button>
        	</div>
        </form>
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')


@endsection