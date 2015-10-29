@extends('layout.app')

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
            Добавить оператора
        </li>
    </ul>

    <h1 id="main-heading">
        Администратор <span>Добавление нового оператора</span>
    </h1>
</div>

<div id="main-content">
    @if (isset($create) && $create)
    <div class="alert alert-success">
        Оператор добавлен.
    </div>
    <a href="/admin/addop">Добавить еще</a>
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
                    <span class="title">Новый оператор</span>
                </div>
                <div class="widget-content form-container">
                    <form class="form-horizontal" action='/admin/addopcreate' method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="control-group">
                            <label class="control-label" for="input00">Имя</label>
                            <div class="controls">
                                <input type="text" id="input00" class="span12" name='name' value="{{ old('name') }}" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="input00">Логин (латинскими)</label>
                            <div class="controls">
                                <input type="text" id="input00" class="span12" name='email' value="{{ old('email') }}" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="input00">Пароль (минимум 6 символов)</label>
                            <div class="controls">
                                <input type="text" id="input00" class="span12" name='password' />
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

