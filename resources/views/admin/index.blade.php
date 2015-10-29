@extends('layout.app')

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
            Администратор
        </li>
    </ul>

    <h1 id="main-heading">
        Администратор <span>Эту страницу видит только админ</span>
    </h1>
</div>

<div id="main-content">
    <p>Lorem ipsum ...</p>
</div>
@endsection

