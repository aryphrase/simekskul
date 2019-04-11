@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Formulir Program Kerja Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdataproker')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

        	<div class="form-group{{ $errors->has('nama_proker') ? 'has-error' : '' }}">
        		<label for="nama_proker">Nama Program Kerja</label><br>
        		<input type="text" id="nama_proker" name="nama_proker"  />
                <span class="text-danger">{{ $errors->first('nama_proker') }}</span>
        	</div>
            <div class="form-group">
                <label for="deskripsi_proker">Deskripsi</label><br>
                <textarea id="deskripsi_proker" name="deskripsi_proker"  ></textarea>
            </div>
            <div class="form-group">
                <label for="frekuensi_proker_id">Frekuensi Program Kerja</label><br>
                <select id="frekuensi_proker_id" name="frekuensi_proker_id" >
                    @foreach($frek_proker as $frek)
                    <option value="{{$frek->id_frekuensiproker}}">{{$frek->nama_frekuensiproker}}</option>
                    @endforeach    
                </select>
            </div>
            <div class="form-group{{ $errors->has('waktu_proker') ? 'has-error' : '' }}">
                <label for="waktu_proker">Waktu</label><br>
                <input type="date" id="waktu_proker" name="waktu_proker"  />
                <span class="text-danger">{{ $errors->first('waktu_proker') }}</span>
            </div>
            <div class="form-group{{ $errors->has('tempat_proker') ? 'has-error' : '' }}">
                <label for="tempat_proker">Tempat Penyelanggaraan</label><br>
                <input type="text" id="tempat_proker" name="tempat_proker"  />
                <span class="text-danger">{{ $errors->first('tempat_proker') }}</span>
            </div>
            <div class="form-group">
                <label for="jenis_proker_id">Jenis Program Kerja</label><br>
                <select id="jenis_proker_id" name="jenis_proker_id" >
                	@foreach($jenis_proker as $jenis_proker)
                    <option value="{{$jenis_proker->id_jenisproker}}">{{$jenis_proker->nama_jenisproker}}</option>
                    @endforeach		
                </select>
            </div>
            <div class="form-group">
                <label for="target_proker">Target Peserta</label><br>
                <input type="text" id="target_proker" name="target_proker"  />
            </div>
            <div class="form-group">
                <label for="anggaran_proker">Rencana Anggaran</label><br>
                <textarea id="anggaran_proker" name="anggaran_proker">
                    @include('layout.rtf_pemasukan')
                    <br>
                    @include('layout.rtf_pengeluaran')
                </textarea>
            </div>
        	<hr>

            @foreach($ekskul as $ekskul)
            <input type="hidden" name="ekskul_id" value="{{ $ekskul->id_ekskul }}">
            @endforeach
            <input type="hidden" name="user_id" value="{{ $auth }}">
            <input type="hidden" name="status_proker_id" value="1">
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
@include('script.texteditorjs')

@endsection