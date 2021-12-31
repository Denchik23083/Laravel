@extends('layouts.app')

@section('title')
    Пополнение
@endsection

@section('valid')
    @parent    
        <span>Баланс: {{$user->balance}}&#8372;</span>
        <a class="p-2 text-light" href="/dashboard">Back</a>
@endsection

@section('content')
    <h1 class="pro">Пополнение</h1>
    <form action="/endreplenish" method="GET" class="form">
        <div class="up"> 
           <div>
               <div>@csrf</div>
               <div class="updateadd"><strong>Цена</strong></div>
           </div>
           <div class="input">
               <input type="hidden" name="id" value="{{$user->id}}">

               <input type="number" name="balance"><br>

           </div>
       </div>   
           <button type="submit" class="resetchangebutton">Пополнить</button>
       </form>
@endsection 