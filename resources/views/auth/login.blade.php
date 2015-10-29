@extends('layout.small')

@section('content')
<div id="login-wrap">
    <div id="login-inner">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div id="login-circle">
            <section id="login-form" class="login-inner-form active" data-angle="0">
                <h1>Login</h1>
                <form class="form-vertical" action="/auth/login" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="control-group">
                        <input type="text" placeholder="Логин" id="input-username" class="big" name="login" value="{{ old('login') }}">
                        <input type="password" placeholder="Пароль" id="input-password" class="big"  name="password">
                    </div>
                    <div class="control-group">
                        <label class="checkbox">
                            <input type="checkbox" class="uniform"  name="remember"> Запомнить меня
                        </label>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-info btn-block btn-large">Login</button>
                    </div>
                </form>

            </section>
        </div>

    </div>
</div>
@endsection
