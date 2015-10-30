@extends('layout.app')

@section('addtitle')
| Администратор | Добавить пользователя
@endsection

@section('content')
<div id="main-header" class="page-header">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="/admin">Общие</a>
            <span class="divider">&raquo;</span>
        </li>
        <li>
            <i class="icon-key"></i>
            <a href="/admin">Администратор</a>
            <span class="divider">&raquo;</span>
        </li>
        <li>
            Добавить пользователя
        </li>
    </ul>

    <h1 id="main-heading">
        Администратор <span>Добавление нового пользователя</span>
    </h1>
</div>

<div id="main-content">
    @if (isset($create) && $create)
    <div class="alert alert-success">
        Пользователь добавлен.
    </div>
    <a href="/admin/users/add">Добавить еще</a><br />
    <a href="/admin/users">Все пользователи</a>
    @else
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Ошибки!</strong> Проверьте введенные значения.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <span class="title">Новый пользователь</span>
                </div>
                <div class="widget-content form-container">
                    <form class="form-horizontal" action='/admin/users/addcreate' method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="control-group">
                            <label class="control-label" for="u-name">Имя</label>
                            <div class="controls">
                                <input type="text" id="u-name" class="span12" name='name' value="{{ old('name') }}" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="u-login">Логин (латинскими и цифрами)</label>
                            <div class="controls">
                                <input type="text" id="u-login" class="span12" name='login' value="{{ old('login') }}" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="u-password">Пароль (минимум 6 символов)</label>
                            <div class="controls">
                                <input type="text" id="u-password" class="span12" name='password' value="{{ old('password') }}" />
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="u-role">Роль</label>
                            <div class="controls">
                                <select id="u-role" name="role">
                                    <option value="2">Оператор</option>
                                    <option value="1">Администратор</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

