@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Pemasukkan Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="/keuangan/pemasukan/{{$pemasukan->id_pemasukan}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="item_pemasukan">Item Pemasukan</label><br>
        		<input type="text" id="item_pemasukan" name="item_pemasukan" value="{{$pemasukan->item_pemasukan}}" />
        	</div>
            <div class="form-group{{ $errors->has('tanggal_pemasukan') ? 'has-error' : '' }}">
                <label for="tanggal_pemasukan">Tertanggal</label><br>
                <input type="date" id="tanggal_pemasukan" name="tanggal_pemasukan" value="{{$pemasukan->tanggal_pemasukan}}"/>
            </div>
            <div class="form-group">
                <label for="sumber_pemasukan_id">Sumber Dana</label><br>
                <select id="sumber_pemasukan_id" name="sumber_pemasukan_id">
                    @foreach($sumber as $sumber)
                    <option value="{{$sumber->id_sumberpemasukan}}"{{$selected_sumber == $sumber->id_sumberpemasukan ? 'selected="selected"' : ''}}>{{$sumber->nama_sumberpemasukan}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nominal_pemasukan">Jumlah Nominal</label><br>
                <p>Rp&nbsp;</p><input type="number" id="nominal_pemasukan" name="nominal_pemasukan" value="{{$pemasukan->nominal_pemasukan}}"/>
            </div>
            <div class="form-group">
                <label for="pic_pemasukan">Penanggung Jawab (<em>Person In Charge</em>)</label><br>
                <input type="text" id="pic_pemasukan" name="pic_pemasukan" value="{{$pemasukan->pic_pemasukan}}"/>
            </div>
        	<hr>

            <input type="hidden" name="user_id" value="{{$auth}}">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Update</button>
                <button class="btn .btn-danger danger" style="color: #333;"><a href="{{ URL::to('keuangan') }}">Kembali</a></button>
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