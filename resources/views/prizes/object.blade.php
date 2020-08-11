@extends('layouts.main')

@section('title')
    Предмет
@endsection

@section('content')
    <h1>Предмет</h1>
    <form action="/prize/getObject" method="post">
        @csrf
        <button type="submit">Забрать</button>
    </form>
    <form action="/" method="post">
        @csrf
        <button type="submit">Отказаться</button>
    </form>
@endsection
