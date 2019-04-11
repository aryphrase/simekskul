@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Bukti Pendaftaran Ekstrakurikuler</h2>
        <hr>
        <div style="overflow-x: auto;">
            <table>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Action</th>
                </tr>
                <?php $i = 0 ?>
                @foreach($pendaftaran as $pendaftaran)
                <?php $i++ ?>
                <tr>
                    <td>{{$i}}</td>
                    <td>Bukti Pendaftaran Ekstrakurikuler {{$pendaftaran->nama_ekskul}} {{$pendaftaran->nama_siswa}}</td>
                    <td width="5%">
                        {{ link_to_route('keanggotaan.cetakbuktipendaftaran', 'Cetak',[$pendaftaran->id_keanggotaan],['class'=>'btn btn-primary btn-md']) }}
                    </td>
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