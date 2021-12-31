@extends('layouts.app')

@section('title')
    Добавить
@endsection

@section('valid')
    @parent
    <a class="p-2 text-light" href="/category">Back</a>
@endsection

@section('content')
<h1 class="h1">Добавить новую категорию</h1>

    <form action="addcategory" method="POST" class="form">
        <div class="up"> 
            <div>
                <div>@csrf</div>
                <div class="updateadd"><strong>Введите Имя</strong></div>
            </div>
            <div class="input">
                <input type="hidden" name="id">
                <input type="text" name="name">
            </div>
        </div>
        <button type="submit" class="resetchangebutton">Добавить</button>
    </form>

@endsection