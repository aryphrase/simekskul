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
        <form class="edit-form" action="/penilaian/{{$penilaian->id_penilaian}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
                <label for="nilai_id">Edit Nilai</label><br>
                <select id="nilai_id" name="nilai_id" >
                    @foreach($nilai as $nilai)
                    <option value="{{$nilai->id_nilai}}"{{$selected_nilai == $nilai->id_nilai ? 'selected="selected"' : ''}}>{{$nilai->nama_nilai}}</option>
                    @endforeach     
                </select>
            </div>

            <input type="hidden" name="_method" value="put">
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