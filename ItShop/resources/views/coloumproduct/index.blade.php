<span class="sp"><strong>Компания:</strong> {{$product->company}}</span><br> 
<span class="sp"><strong>Модель:</strong> {{$product->name}}</span><br> 
<span class="sp"><strong>Цена:</strong> {{$product->price}}&#8372;</span><br>
<span class="sp"><strong>Рекомендованные:</strong> 
    @if ($product->selected == 1)
        {{"Да"}}
    @elseif ($product->selected == 0)
        {{"Нет"}}
    @endif
</span><br><br>