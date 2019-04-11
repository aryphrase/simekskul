@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
        </button>

        <h2>Isi Data Anda, di sini ....</h2>
        <hr>
        <form class="edit-form" action="{{url('/inputdatapembina')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">

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

        	<div class="form-group{{ $errors->has('nama_pembina') ? 'has-error' : '' }}">
        		<label for="nama_pembina">Nama</label><br>
        		<input type="text" id="nama_pembina" name="nama_pembina" value="{{$name}}"/>
                <span class="text-danger">{{ $errors->first('nama_pembina') }}</span>
        	</div>
            <div class="form-group{{ $errors->has('foto_pembina') ? 'has-error' : '' }}">
                <label for="foto_pembina">Foto</label><br>
                <input type="file" id="foto_pembina" name="foto_pembina"  />
                <span class="text-danger">{{ $errors->first('nama_pembina') }}</span>
            </div>
        	<div class="form-group">
    			<div class="row">
    				<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tempatlahir_pembina">Tempat Lahir</label><br>
		        		<input type="text" id="tempatlahir_pembina" name="tempatlahir_pembina"  />
		        	</div>
		        	<div style="margin:0;padding:0;" class="col col-md-4 col-sm-12">
		        		<label for="tanggallahir_pembina">Tanggal Lahir</label><br>
		        		<input type="date" id="tanggallahir_pembina" name="tanggallahir_pembina"  />
		        	</div>
	        	</div>
        	</div>
            <div class="form-group">
                <label for="jeniskelamin_pembina">Jenis Kelamin</label><br>
                <select id="jeniskelamin_pembina" name="jeniskelamin_pembina" >
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat_pembina">Alamat</label><br>
                <input type="text" id="alamat_pembina" name="alamat_pembina"  />
            </div>
            <div class="form-group">
                <label for="nomorhp_pembina">Nomor HP</label><br>
                <input type="text" id="nomorhp_pembina" name="nomorhp_pembina"  />
            </div>
        	<div class="form-group">
        		<label for="ig_pembina">Akun Instagram</label><br>
        		<input type="text" id="ig_pembina" name="ig_pembina" />
        	</div>
        	<hr>

            <input type="hidden" name="user_id" value="{{ $auth }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="form-group">
        		<button class="btn gradient-green" style="color: #fff;" type="submit">Update</button>
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
<script type="text/javascript">
	$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

});
</script>
<script type="text/javascript">
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	    acc[i].addEventListener("click", function() {
	        /* Toggle between adding and removing the "active" class,
	        to highlight the button that controls the panel */
	        this.classList.toggle("active");

	        /* Toggle between hiding and showing the active panel */
	        var panel = this.nextElementSibling;
	        if (panel.style.display === "block") {
	            panel.style.display = "none";
	        } else {
	            panel.style.display = "block";
	        }
	    });
	}
</script>
@endsection