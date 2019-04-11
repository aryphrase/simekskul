@extends('layout.master')

@section('content')
<div class="wrapper">
    
    @include('layout.sidebar')

	<div id="content">
        <button type="button" id="sidebarCollapse" class="btn gradient-green" style="color:#fff;">
            <i class="glyphicon glyphicon-align-left"></i>
            
        </button>

        <h2>Daftar Guru</h2>
        <hr>
        <div style="overflow-x: auto;">
        	<table>
        		<tr>
        			<th style="width:5%">No</th>
        			<th style="width:20%">Nama</th>
        			<th style="width:40%">Alamat</th>
        			<th style="width:5%">Nomor HP</th>
        			<th style="width:10%" colspan="3">Action</th>
        		</tr>
                <?php $i = 0 ?>
                @foreach($pembina as $pembina)
                <?php $i++ ?>
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$pembina->nama_pembina}}</td>
        			<td>{{$pembina->alamat_pembina}}</td>
        			<td>{{$pembina->nomorhp_pembina}}</td>
                    <td>
                        <button class="btn btn-success"><a href="{{url('/pembina/'.$pembina->id_pembina.'/show')}}" style="color:#fff;">Lihat Profil</a></button>
                    </td>
                    @if($jenis == 1)
        			<td>{{ link_to_route('pembina.edit','Edit',[$pembina->id_pembina],['class'=>'btn btn-primary btn-md']) }}
                    </td>
                    <td>
                      {!! Form::open(array('route'=>['pembina.destroy',$pembina->id_pembina],'method'=>'DELETE')) !!}
                          
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-md','type'=>'submit']) !!}
                      {!! Form::close() !!} 
                    </td>
                    @endif
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