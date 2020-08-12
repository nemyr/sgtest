@extends('layouts.main')

@section('title')
    Предмет
@endsection

@section('content')
    <h1>Предмет</h1>
    <h4>Предмет №{{$objectID}}</h4>
    <form action="{{route('object')}}" method="post">
        @csrf
        <input type="hidden", name="objectID" value="{{$objectID}}">
        <button type="submit">Забрать</button>
    </form>
    <form action="{{route('index')}}" method="get">
        @csrf
        <button type="submit">Отказаться</button>
    </form>
@endsection
