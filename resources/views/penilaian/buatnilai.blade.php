@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Masukkan Data Pengeluaran Ekstrakurikuler Anda, disini ....</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdatapenilaian')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

        	<div class="form-group">
                <label for="siswa_id">Pilih Siswa</label><br>
                <select id="siswa_id" name="siswa_id" >
                    @foreach($siswa as $siswa)
                    <option value="{{$siswa->id_siswa}}">{{$siswa->nama_siswa}}</option>
                    @endforeach     
                </select>
            </div>

            <div class="form-group">
                <label for="nilai_id">Masukkan Nilai</label><br>
                <select id="nilai_id" name="nilai_id" >
                    @foreach($nilai as $nilai)
                    <option value="{{$nilai->id_nilai}}">{{$nilai->nama_nilai}}</option>
                    @endforeach     
                </select>
            </div>

            <div class="form-group">
                <label for="semester_id">Semester</label><br>
                <select id="semester_id" name="semester_id" >
                    @foreach($semester as $semester)
                    <option value="{{$semester->id_semester}}">{{$semester->nama_semester}}</option>
                    @endforeach     
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_nilai">Tertanggal</label><br>
                <p>{{$tanggal}}</p>
                <input type="hidden" id="tanggal_nilai" name="tanggal_nilai" value="{{ $tanggal }}"/>
            </div>

            @foreach($pembina1 as $pembina1)
            <input type="hidden" name="pembina_id" value="{{ $pembina1->id_pembina }}">
            @endforeach

            <input type="hidden" name="ekskul_id" value="{{ $idekskul }}">

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