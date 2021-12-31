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
    <a class="p-2 text-light" href="/category">Back</a>
@endsection

@section('content')
    @include('filter.category')
    <div class="con">
        @foreach ($products as $product)
            <div class="cout">
                @include('coloumproduct.index')
                <a href={{"product/".$product->id}}><button class="filterbutton">Купить</button></a>
            </div>
        @endforeach
    </div>

@endsection