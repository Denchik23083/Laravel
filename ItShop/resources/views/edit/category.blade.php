@extends('layouts.app')

@section('title')
    Редактировать
@endsection

@section('valid')
    @parent
        <a class="p-2 text-light" href="/dashboard">Back</a>
@endsection

@section('content')

<h1 class="h1">Изменить Категорию</h1>

<form action="/editcategory" method="GET" class="form">
    <div class="up"> 
        <div>
            <div>@csrf</div>
            <div class="updateadd"><strong>Введите Имя</strong></div>
        </div>
        <div class="input">
            <input type="hidden" name="id" value="{{$editcategory->id}}">
            <input type="text" name="name" value="{{$editcategory->name}}">
        </div>
    </div>
    <button type="submit" class="resetchangebutton">Изменить</button>
</form>
@endsection