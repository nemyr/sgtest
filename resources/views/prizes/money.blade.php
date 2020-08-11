@extends('layouts.main')

@section('title')
    Деньги
@endsection

@section('content')
    <h1>Деньги</h1>
    <form action="/prize/getMoney" method="post">
        @csrf
        <button type="submit">Забрать</button>
    </form>
    <form action="/prize/convertMoney" method="post">
        @csrf
        <button type="submit">Перевести в бонусные баллы</button>
    </form>
@endsection
