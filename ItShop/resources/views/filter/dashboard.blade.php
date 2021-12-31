<div class="con">
    <div class="filter">
        <form method="GET">
            <h4 class="h4"> 
                Цена от <input type="number" class="text" name="from" min="0" value="{{request('from', 0)}}"/>
                До <input type="number" class="text" name="to" min="0" value="{{request('to', 0)}}"/> 
                <input type="checkbox" name="check" {{ request('check') ? 'checked' : ''}}/> Рекомендованные
                <button type="submit" class="filterbutton">Фильтр</button>
            </h4>
        </form>
    </div>    
    <div class="filter">
        <h4 class="reset">
            <a href={{"/dashboard"}}><button class="resetchangebutton">Сбросить</button></a>
        </h4>
    </div>
</div>