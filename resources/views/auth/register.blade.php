@extends('layout.master')

@section('content')
<body class="gradient-green" style="overflow: hidden;">
    <div class="register-page">
        <div class="form">
            <div class="brand">Simekskul</div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="register-form" action="{{ route('register') }}" method="post">
                {{ csrf_field() }}
                <!-- username -->
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nama Lengkap" value="{{ old('username') }}" required />
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- email -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required/>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- password -->
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"  placeholder="Ulangi" required />
                </div>

                <div class="form-group{{ $errors->has('jenis_user_id') ? ' has-error' : '' }}">
                    <label for="jenis_user_id">Jenis User</p></label>
                    <select style="width:100%" id="jenis_user_id" name="jenis_user_id">
                        <option value="1">Admin Sekolah</option>
                        <option value="2">Admin Ekstrakurikuler</option>
                        <option value="3">Pembina Ekstrakurikuler</option>
                        <option value="4">Siswa</option>
                    </select>

                     @if ($errors->has('jenis_user_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jenis_user_id') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <button type="submit">buat akun</button>
                    <button type="reset">batal</button>
                    <p class="message">Sudah mendaftar? silahkan <a href="{{ route('login') }}">masuk</a></p>
                </div>
            </form>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
@endsection