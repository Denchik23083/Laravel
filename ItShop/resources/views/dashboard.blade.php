@extends('layouts.app')

@section('title')
    Кабинет
@endsection

@section('valid')
    @parent     
        @if($user->name != 'admin' && $user->email != 'admin@gmail.com')
            <span>Баланс: {{$user->balance}}&#8372;</span>
            <a href={{"/replenish"}}><button class="filterbutton">Пополнить</button></a>
        @endif
        <a class="p-2 text-light" href="/dashboard">Dashboard</a>
        <a class="p-2 text-light" href="/category">Category</a>
        <a class="p-2 text-light" href="/exit">Logout</a>
@endsection

@section('content')
    <h1 class="pro">Все товары</h1>
    @include('filter.dashboard')
    @if ($user->name == 'admin')
        <h4 class="h4"><a href={{"addproduct"}}><button class="add">Добавить товар</button></a></h4>
    @endif
    <div class="con">
        @foreach ($products as $product)
            <div class="cout">
                @include('coloumproduct.index')
                @if(Auth::user() && $user->name == 'admin' && $user->email == 'admin@gmail.com')
                    <a href={{"deleteProduct/".$product->id}}><button class="delproduct">Удалить</button></a>
                @else
                    <a href={{"product/".$product->id}}><button class="filterbutton">Купить</button></a>
                @endif
               
                @if ($user->name == 'admin' && $user->email == 'admin@gmail.com')
                    <a href={{"edit/".$product->id}}><button class="resetchangebutton">Изменить</button></a>
                @endif
            </div>
        @endforeach
    </div>
@endsection