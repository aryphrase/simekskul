@extends('layout.master')

@section('content')
<body class="gradient-green" style="overflow: hidden;">
        <div class="login-page centered">
            <div class="form">
                <div class="brand">Simekskul</div>
                @if (count($errors) > 0)
                    <div style="background-color:#b21534;color:#fff;padding:5px;">
                        <p><i class="glyphicon glyphicon-warning-sign" style="font-size:16px;"></i>&nbsp;Email / Password Salah</p>
                    </div>
                    <span style="padding: 5px;"></span>
                @endif
                <form class="login-form" action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="password"/>
                    </div>
                    <div class="form-group">
                        <button type="submit">masuk</button>
                        <p class="message">Belum memiliki akun? <a href="{{ route('register') }}">Buat disini</a></p>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
        
@endsection