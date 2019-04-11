@extends('layout.master')

@section('content')
<div class="wrapper">
    
	@include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Buat Data Pembinaan</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdatapembinaan')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                
        	<div class="form-group{{ $errors->has('pembina_id') ? 'has-error' : '' }}">
                <label for="pembina_id">Ekstrakurikuler yang dipilih</label><br>
                <select id="pembina_id" name="pembina_id" >
                    @foreach($pembina as $pembina)
                    <option value="{{$pembina->id_pembina}}">{{$pembina->nama_pembina}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group{{ $errors->has('ekskul_id') ? 'has-error' : '' }}">
                <label for="ekskul_id">Ekstrakurikuler yang dipilih</label><br>
                <select id="ekskul_id" name="ekskul_id" >
                    @foreach($ekskul as $ekskul)
                    <option value="{{$ekskul->id_ekskul}}">{{$ekskul->nama_ekskul}}</option>
                    @endforeach
                </select>
            </div>

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