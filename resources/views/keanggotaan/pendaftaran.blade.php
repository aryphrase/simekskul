@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Silahkan Mendaftar Ekstrakurikuler, disini ...</h2>
        <hr>
        <form class="edit-form" action="{{url('/pendaftaran')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

            <div class="form-group{{ $errors->has('siswa_id') ? 'has-error' : '' }}">
        		<label for="siswa_id">Nama Siswa</label><br>
                @foreach($siswa as $siswa)
        		<p>{{$siswa->nama_siswa}}</p>
                @endforeach
        		<input type="hidden" name="siswa_id" value="{{ $siswa->id_siswa }}">
        	</div>
        	<div class="form-group{{ $errors->has('ekskul_id') ? 'has-error' : '' }}">
        		<label for="ekskul_id">Ekstrakurikuler yang dipilih</label><br>
        		<select id="ekskul_id" name="ekskul_id" >
                    @foreach($ekskul as $ekskul)
                    <option value="{{$ekskul->id_ekskul}}">{{$ekskul->nama_ekskul}}</option>
                    @endforeach
                </select>
        	</div>
        	<div class="form-group{{ $errors->has('alasan_bergabung') ? 'has-error' : '' }}">
        		<label for="alasan_bergabung">Alasan Bergabung</label><br>
        		<textarea id="alasan_bergabung" name="alasan_bergabung" placeholder="Tuliskan alasan, motivasi dan tujuan anda bergabung..."></textarea>
        	</div>
        	<hr>

        	<input type="hidden" name="user_id" value="{{ $auth }}">
        	<input type="hidden" name="statusanggota_id" value="2">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Kirim</button>
                <button class="btn .btn-danger danger" type="reset">Batal</button>
        	</div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')

@endsection