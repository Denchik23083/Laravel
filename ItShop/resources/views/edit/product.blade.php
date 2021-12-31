@extends('layouts.app')

@section('title')
    Редактировать
@endsection

@section('valid')
    @parent
        <a class="p-2 text-light" href="/dashboard">Back</a>
@endsection

@section('content')
<h1 class="h1">Изменить Товар</h1>

<form action="/edit" method="GET" class="form">
 <div class="up"> 
    <div>
        <div>@csrf</div>
        <div class="updateadd"><strong>Компания</strong></div>
        <div class="updateadd"><strong>Имя</strong></div>
        <div class="updateadd"><strong>Цена</strong></div>
        <div class="updateadd"><strong>Количество</strong></div>
        <div class="updateadd"><strong>Рекомендованые</strong></div>
        <div class="updateadd"><strong>Категория</strong></div>
    </div>
    <div class="input">
        <input type="hidden" name="id" value="{{$edit->id}}">
        
        <input type="text" name="company" value="{{$edit->company}}"><br>
        
        <input type="text" name="name" value="{{$edit->name}}"><br>
        
        <input type="text" name="price" value="{{$edit->price}}"><br>

        <input type="number" name="quantity" value="{{$edit->quantity}}" min="0"><br>

        <input type="number" name="selected" value="{{$edit->selected}}" max="1"><br>
        
        <input type="number" name="category_id" value="{{$edit->category_id}}" min="0"><br>
    </div>
</div>   
    <button type="submit" class="resetchangebutton">Изменить</button>
</form>
@endsection