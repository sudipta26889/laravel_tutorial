@extends('layouts.admin-auth')
@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.login.submit') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" data-validation="email" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" data-validation="required" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
        <br />
        <a class="btn btn-primary btn-block btn-flat" href="{{ route('admin.password.request') }}">Forgot Password?</a>
    </div>
    <script>
        $(document).ready(function(){
            $('input').iCheck({
                checkboxClass:'icheckbox_square-blue',
                radioClass:'iradio_square-blue',
                increaseArea:'20%'
            });
            $.validate({
                lang:'en'
            });
        });
    </script>
@endsection