@extends('layout.maaster')

@section('content')
<div class="wrapper">
	
	@include('layout.sidebar')

	<div id="content" style="background-color:#eee;">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
        </button>

        @if($jenis == 1)
            <h2>Anda berada di halaman khusus Admin Sekolah</h2><hr>

            <div class="row">
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH PENGGUNA</p><br>
                        <p class="count" style="color:#dc143c;font-size:24px;">{{$jumlah_user}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH EKSKUL</p><br>
                        <p class="count" style="color:#483d8b;font-size:24px;">{{$jumlah_ekskul}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH PEMBINA</p><br>
                        <p class="count" style="color:#2e8b57;font-size:24px;">{{$jumlah_pembina}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH SISWA</p><br>
                        <p class="count" style="color:#008080;font-size:24px;">{{$jumlah_siswa}}</p>  
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col col-md-4 col-sm-12">
                    <div class="chart" id="chart_jenisekskul"></div>
                </div>
                <div class="col col-md-4 col-sm-12">
                    <div class="chart" id="chart_jumlahanggota"></div>
                </div>
            </div>


        @elseif($jenis == 2)
            <h2>Anda berada di halaman khusus Admin {{$name}}</h2><hr>
            @if($ekskul1->isEmpty())
                <div class="danger-alert">
                    <p>Data ekstrakurikuler anda masih kosong, sila isi <a href="{{ url('/ekskul/create')}}">disini</a></p>
                </div>
            @else
            <div class="row">
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH ANGGOTA</p><br>
                        <p class="count" style="color:#dc143c;font-size:24px;">{{$jumlah_anggota}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>PROKER SELESAI</p><br>
                        <p class="count" style="color:#483d8b;font-size:24px;">{{$proker_selesai}}</p><p style="font-size:24px;">&nbsp;/&nbsp;</p><p class="count" style="color:#483d8b;font-size:24px;">{{$jumlah_proker}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>SERAPAN KAS</p><br>
                        <p class="count" style="color:#2e8b57;font-size:24px;">{{$dana_persen}}</p><p>%</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH RAPAT</p><br>
                        <p class="count" style="color:#008080;font-size:24px;">{{$jumlah_rapat}}</p>  
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-md-4 col-sm-12">
                    <div class="chart" id="chart_jenisproker"></div>
                </div>
            </div>
            @endif

        @elseif($jenis == 3) 
            @if($pembina1->isEmpty())
                <h2>Selamat datang Sdr. {{$name}}, di Sistem Informasi Ekstrakurikuler SMA Negeri 4 Surakarta</h2><hr>

                <div class="danger-alert">
                    <p>Data diri anda masih kosong, sila isi <a href="{{ url('/pembina/create')}}">disini</a></p>
                </div>
            @else
                @foreach($pembina1 as $pembina1)
                @if($pembina1->jeniskelamin_pembina == "L") 
                    <h2>Selamat datang Bapak {{$name}}, di Sistem Informasi Ekstrakurikuler SMA Negeri 4 Surakarta</h2>
                @elseif($pembina1->jeniskelamin_pembina == "P")
                    <h2>Selamat datang Ibu {{$name}}, di Sistem Informasi Ekstrakurikuler SMA Negeri 4 Surakarta</h2>
                @endif
                @endforeach
            @endif

            <div class="row">
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>EKSKUL YANG DIBINA</p><br>
                        <p class="count" style="color:#483d8b;font-size:24px;">{{$jumlah_ekskul}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>SISWA BINAAN</p><br>
                        <p class="count" style="color:#008080;font-size:24px;">{{$siswa}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH PEMBINA</p><br>
                        <p class="count" style="color:#2e8b57;font-size:24px;">{{$jumlah_pembina}}</p>  
                    </div>
                </div>
            </div>

        @elseif($jenis == 4)
            <h2>Hai, {{$name}}. Selamat Datang di Sistem Informasi Ekstrakurikuler SMA Negeri 4 Surakarta</h2><hr>

            @if($siswa->isEmpty())
            <div class="danger-alert">
                <p>Data diri anda masih kosong, sila isi <a href="{{ url('/siswa/create')}}">disini</a></p>
            </div>
            @endif

            <div class="row">
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH EKSKUL</p><br>
                        <p class="count" style="color:#483d8b;font-size:24px;">{{$jumlah_ekskul}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH PEMBINA</p><br>
                        <p class="count" style="color:#2e8b57;font-size:24px;">{{$jumlah_pembina}}</p>  
                    </div>
                </div>
                <div class="col col-md-3 col-sm-12">
                    <div class="admin-card">
                        <p>JUMLAH SISWA</p><br>
                        <p class="count" style="color:#008080;font-size:24px;">{{$jumlah_siswa}}</p>  
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col col-md-4 col-sm-12">
                    <div class="chart" id="chart_jenisekskul"></div>
                </div>
            </div>
        @endif

    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

@include('script.sidebarjs')

@include('script.number-effect')

@endsection