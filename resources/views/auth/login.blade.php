@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-4 loginbg">
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
                        @endif
                    </div>
                    <div class="button-height">
                        <button type="submit" class="btn btn-outline-success float-right">Login</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
