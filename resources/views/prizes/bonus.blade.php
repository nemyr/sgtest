@extends('layouts.main')

@section('title')
    Баллы лояльности
@endsection

@section('content')
    <h1>Баллы лояльности</h1>
    <h4>Получено: {{$amount}}</h4>
    <form action="{{ route('bonus') }}" method="post">
        @csrf
        <input name="amount" type="hidden" value="{{$amount}}">
        <button type="submit">Забрать</button>
    </form>
@endsection
