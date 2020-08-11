@extends('layouts.main')

@section('title')
    Приз
@endsection

@section('content')
    <h1>Получение приза</h1>
    <form action="/user/getprize" method="post">
        @csrf
        <button type="submit">Получить приз</button>
    </form>
@endsection
