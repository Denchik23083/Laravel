@extends('layouts.app')

@section('title')
    Покупка
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
<form action="/product" method="GET">
    <div class="con">
        <div class="product">
            <span class="ww"><strong>{{$product->company}} <br>  {{$product->name}}</strong></span><br> 
        </div>
        <div>
            <div class="foo"><strong>&#10003;  Есть в наличии</strong></div>
            <div class="quantity"><strong>Количество: {{$product->quantity}}</strong></div>        
            <div class="price"><strong class="st">Цена: {{$product->price}}&#8372;</strong></div>         
        </div>
    </div>
</form>
    @if(Auth::user() && $user->name == 'admin' && $user->email == 'admin@gmail.com')
        <a href={{"/product/deleteProduct/".$product->id}}><button class="delproductpick">Удалить</button></a>
    @else
        <a href={{"/product/deleteProduct/".$product->id}}><button class="filterbuttonpick">Купить</button></a>
    @endif
@endsection
