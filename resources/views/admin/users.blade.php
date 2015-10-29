@extends('layout.app')

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
                <span class="title">Basic DataTable</span>
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
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role == '1' ? 'Администратор' : 'Оператор' }}</td>
                            <td style="width: 70px;">
                                <a class='icol-pencil' title='Редактировать' href='#'></a>
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
@endsection
