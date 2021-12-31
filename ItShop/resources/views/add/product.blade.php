@extends('layouts.app')

@section('title')
    Добавить
@endsection

@section('valid')
    @parent
    <a class="p-2 text-light" href="/dashboard">Back</a>
@endsection

@section('content')
<h1 class="h1">Добавить новый товар</h1>

    <form action="addproduct" method="POST" class="form">
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
                <input type="hidden" name="id">
                
                <input type="text" name="company"><br>
                
                <input type="text" name="name"><br>
                
                <input type="text" name="price"><br>

                <input type="number" name="quantity" min="0"><br>

                <input type="number" name="selected" min="0"><br>
                
                <input type="number" name="category_id" min="0"><br>
                
            </div>
        </div>   
            <button type="submit" class="resetchangebutton">Добавить</button>
    </form>

@endsection

