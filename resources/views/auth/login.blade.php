@extends('layouts.app')
<style>
        .navbar>.container-fluid .navbar-brand, .navbar>.container .navbar-brand {
         margin-left: -34px;
         }
        body{
         background-image:url(images/S__8175620.jpg);
        }
        .tran{
         color: #000000;
         background-color: #ffffff;
         opacity: 0.8;
         filter: alpha(opacity=60); /* For IE8 and earlier */
        }
        .fo{
         font-size: 16.5px;
        }
        .head{
          font-size: 20px;
        }
</style>
 <title>เข้าสู่ระบบ</title>

@section('content')
<div class="container">
    <div class="row " >
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default tran">
                <div class="panel-heading head">Login</div>
                  <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label fo">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label fo">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
