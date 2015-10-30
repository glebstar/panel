@extends('layout.app')

@section('addcss')
<link rel="stylesheet" href="/plugins/pnotify/jquery.pnotify.css" media="screen">
@endsection

@section('addtitle')
| Администратор | Пользователи
@endsection

@section('content')
<div id="main-header" class="page-header">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="/">Общие</a>
            <span class="divider">&raquo;</span>
        </li>
        <li>
            <i class="icon-key"></i>
            <a href="/admin">Администратор</a>
            <span class="divider">&raquo;</span>
        </li>
        <li>
            <i class="icon-users"></i>
            Пользователи
        </li>
    </ul>

    <h1 id="main-heading">
        Администратор <span>Все пользователи</span>
    </h1>
</div>

<div id="main-content">
    <div class="row-fluid">
        <div class="span12 widget">
            <div class="widget-header">
                <span class="title">Все пользователи</span>
            </div>
            <div class="widget-content table-container">
                <table id="demo-dtable-01" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Логин</th>
                            <th>Имя</th>
                            <th>Роль</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="tr-u-id-{{ $user->id }}">
                            <td>{{ $user->id }}</td>
                            <td class="td-login">{{ $user->login }}</td>
                            <td class="td-name">{{ $user->name }}</td>
                            <td class="td-role">{{ $user->role == '1' ? 'Администратор' : 'Оператор' }}</td>
                            <td style="width: 70px;">
                                <a id="edit_user_{{$user->id}}" class='icol-pencil' title='Редактировать' href='#'></a>
                                <a class='icol-cross' title='Удалить' href='#'></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade" id="editModal">
    <span id="u-m-id" class="hide"></span>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Редактирование пользователя</h3>
    </div>
    <div class="modal-body">
        <h4>Общие данные</h4>
        <form class="form-horizontal">
            <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
            <div class="control-group">
                <label class="control-label" for="u-m-login">Логин</label>
                <div class="controls">
                    <input type="text" id="u-m-login" placeholder="Логин">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="u-m-name">Имя</label>
                <div class="controls">
                    <input type="text" id="u-m-name" placeholder="Имя">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="u-m-role">Роль</label>
                <div class="controls">
                    <select id="u-m-role">
                        <option value="1">Администратор</option>
                        <option value="2">Оператор</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button id="u-m-save" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>  
        
        <h4>Изменить пароль</h4>
        <form class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="u-m-password">Новый пароль</label>
                <div class="controls">
                    <input type="text" id="u-m-password" placeholder="Новый пароль">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary">Изменить</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a id="editModal-close" href="#" class="btn">Отмена</a>
    </div>
</div>
@endsection

@section('addjs')
<script src="/plugins/pnotify/jquery.pnotify.min.js"></script>
<script src="/js/admin/users.js?v={{ Config::get('app.script_version') }}"></script>
@endsection