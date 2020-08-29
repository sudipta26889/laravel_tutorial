@extends('layouts.admin-auth')
@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Enter your email to get reset link</p>
        @if(session('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('admin.password.email') }}" method="post">
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
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
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