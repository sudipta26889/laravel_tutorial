@extends('layouts.admin-auth')
@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Enter your email and new password here</p>
        @if(session('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('admin.password.request') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ $email or old('email') }}" data-validation="email" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" data-validation="required length" data-validation-length="min6" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password Confirmation" id="password_confirmation" name="password_confirmation" data-validation="required length confirmation" data-validation-length="min6" data-validation-confirm="password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                </div>
            </div>
        </form>
        <br />
        <a class="btn btn-primary btn-block btn-flat" href="{{ route('admin.login') }}">Back to login</a>
    </div>
    <script>
        $(document).ready(function(){
            $.validate({
                lang:'en'
            });
        });
    </script>
@endsection
