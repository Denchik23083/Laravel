@extends('layouts.app')

@section('title')
    Главная
@endsection

@section('valid')
    @parent
        <a class="p-2 text-light" href="/exit">Main</a>
        <a class="p-2 text-light" href="/category">Category</a>
        <a class="p-2 text-light" href="/login">Login</a>
        <a class="p-2 text-light" href="/register">Register</a>
@endsection

@section('content')
    <h1 class="pro">Все товары</h1>
    @include('filter.main')
    <div class="con">
        @foreach ($products as $product)
            <div class="cout">
                @include('coloumproduct.index')
                <a href={{"product/".$product->id}}><button class="filterbutton">Купить</button></a>
            </div>
        @endforeach
    </div>
@endsection