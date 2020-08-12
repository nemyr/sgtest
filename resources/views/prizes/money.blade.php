@extends('layouts.main')

@section('title')
    Деньги
@endsection

@section('content')
    <h1>Деньги</h1>
    <h4>Получено: {{$amount}}</h4>

    <form action="{{route('money')}}" method="post">
        @csrf
        <input type="hidden" name="amount" value="{{$amount}}">
        <button type="submit">Забрать</button>
    </form>

    <form action="{{route('convert')}}" method="post">
        @csrf
        <input type="hidden" name="amount" value="{{$amount}}">
        <button type="submit">Перевести в бонусные баллы</button>
    </form>
@endsection
