@extends('layouts.app')

@section('title')
    Удаление Категории
@endsection

@section('valid')
    @parent
        <a class="p-2 text-light" href="/category">Back</a>
@endsection

@section('content')
<h1 class="pro">Вы действительно хотите удалить категорию?</h1>
<form action="/category" method="GET">
    <div class="category">
        <span class="catname">{{$category->name}}</span><br>
    </div>
</form>
<a href={{"delete/".$category->id}}><button class="delcatn">Удалить</button></a>
@endsection