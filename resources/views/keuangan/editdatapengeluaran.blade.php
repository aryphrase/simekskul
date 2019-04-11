@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Edit Data Pengeluaran Ekstrakurikuler</h2>
        <hr>
        <form class="edit-form" action="/keuangan/pengeluaran/{{$pengeluaran->id_pengeluaran}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        	<div class="form-group">
        		<label for="item_pengeluaran">Nama Item</label><br>
        		<input type="text" id="item_pengeluaran" name="item_pengeluaran" value="{{$pengeluaran->item_pengeluaran}}" />
        	</div>
            <div class="form-group">
                <label for="tanggal_pengeluaran">Tertanggal</label><br>
                <input type="date" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="{{$pengeluaran->tanggal_pengeluaran}}" />
            </div>
        	<div class="form-group">
        		<label for="jumlah_item">Jumlah Item</label><br>
        		<input type="text" id="jumlah_item" name="jumlah_item"  value="{{$pengeluaran->jumlah_item}}"/>
        	</div>
        	<div class="form-group">
        		<label for="satuan_item_id">Satuan Item</label><br>
        		<select id="satuan_item_id" name="satuan_item_id" >
                    @foreach($satuan as $satuan)
                    <option value="{{$satuan->id_satuanitem}}"{{$selected_satuan == $satuan->id_jenisproker ? 'selected="selected"' : ''}}>{{$satuan->nama_satuanitem}}</option>
                    @endforeach  
                </select>
        	</div>
            <div class="form-group">
                <label for="jenis_pengeluaran_id">Jenis Pengeluaran</label><br>
                <select id="jenis_pengeluaran_id" name="jenis_pengeluaran_id" >
                    @foreach($jenis_pengeluaran as $jenis_pengeluaran)
                    <option value="{{$jenis_pengeluaran->id_jenispengeluaran}}"{{$selected_jenis == $jenis_pengeluaran->id_jenispengeluaran ? 'selected="selected"' : ''}}>{{$jenis_pengeluaran->nama_jenispengeluaran}}</option>
                    @endforeach  
                </select>
            </div>
            <div class="form-group">
                <label for="harga_satuan">Harga Satuan</label><br>
                <p>Rp&nbsp;</p><input type="number" id="harga_satuan" name="harga_satuan" value="{{$pengeluaran->harga_satuan}}" />
            </div>
            <div class="form-group">
                <label for="nominal_pengeluaran">Jumlah</label><br>
                <p>Rp&nbsp;</p><input type="number" id="nominal_pengeluaran" name="nominal_pengeluaran" value="{{$pengeluaran->nominal_pengeluaran}}" />
            </div>
            <div class="form-group">
                <label for="pic_pengeluaran">Penanggung Jawab (<em>Person In Charge</em>)</label><br>
                <input type="text" id="pic_pengeluaran" name="pic_pengeluaran" value="{{$pengeluaran->pic_pengeluaran}}" />
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