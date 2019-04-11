<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Sistem Informasi Ekstrakurikuler SMA Negeri 4 Surakarta - @yield('title')</title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,800,900">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

		<!-- Bootstrap -->
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/login.css') }}">

		<!-- Alert -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		
		
	</head>
	<body>
		
		@yield('nav')

		@yield('content')
	
	</body>
</html>