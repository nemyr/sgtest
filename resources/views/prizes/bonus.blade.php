@extends('layouts.main')

@section('title')
    Баллы лояльности
@endsection

@section('content')
    <h1>Баллы лояльности</h1>
    <form action="/prize/getBonus" method="post">
        @csrf
        <button type="submit">Забрать</button>
    </form>
@endsection
