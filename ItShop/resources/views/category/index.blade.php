@extends('layouts.app')

@section('title')
    Категории
@endsection

@section('valid')
    @parent
        @if(Auth::user() && $user->name != 'admin' && $user->email != 'admin@gmail.com')
            <span>Баланс: {{$user->balance}}&#8372;</span>
            <a href={{"/replenish"}}><button class="filterbutton">Пополнить</button></a>
        @endif
        <a class="p-2 text-light" href="/exit">Main</a>
        <a class="p-2 text-light" href="/login">Login</a>
        <a class="p-2 text-light" href="/register">Register</a>
@endsection

@section('content')
    <h1 class="pro">Категории</h1>
    @if(Auth::user() && $user->name == 'admin' && $user->email == 'admin@gmail.com')
    <h4 class="h4"><a href={{"/addcategory"}}><button class="add">Добавить категорию</button></a></h4>
    @endif
    <div class="concategory">
        @foreach ($category as $category)
            <div class="category">
                <a href="{{route('category.show', $category)}}" class="catname"> {{$category->name}}</a><br><br>
                @if(Auth::user() && $user->name == 'admin' && $user->email == 'admin@gmail.com')
                <a href={{"deletecategory/".$category->id}}><button class="delcat">Удалить</button></a>
                <a href={{"editcategory/".$category->id}}><button class="resetchangebutton">Изменить</button></a>
                @endif
            </div>
        @endforeach
    </div>

@endsection