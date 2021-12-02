@extends('layout')

@section('btn')
<link href="/css/pop-up.css?<?=time()?>" rel="stylesheet">
<link href="/css/btn_basket.css?<?=time()?>" rel="stylesheet">
<link href="/css/home_cont.css?<?=time()?>" rel="stylesheet">
		@if(Auth::user())
		<div class="dropdown"> 	
		<img src="{{$u->avatar}}" width="45" height="45" >
		<div class="dropdown-content">
    <a href="/user/me" style=" padding-right: 30px;" >Профиль</a>
    <a href="/basket"style=" padding-right: 35px;">Корзина</a>
	 <a href="/logout" style="padding-right: 51px;">Выход</a>
    
  </div>
		</div>
			
		@else 
			
		<form class="d-flex" action="/login">
          <button class="btn btn-outline-success" type="submit">Войти</button>
        </form>
		 
		@endif
		
@endsection
@section('content') 

<div class="categories">
	<span style="padding-left: 30%;">Категории:</span><br>
	<a  class="categories_link" href="/tags/услуги">Услуги</a><br>
	<a  class="categories_link" href="/tags/продукты_питания">Продукты питания</a><br>
	<a  class="categories_link" href="/tags/инструмент">Инструмент</a><br>
	<a  class="categories_link" href="/tags/мебель">Мебель</a><br>
	<a  class="categories_link" href="/tags/компьютерная_техника">Компьютерная техника</a><br>
	<a  class="categories_link" href="/tags/бытовая_техника">Бытовая техника</a><br>
	<a  class="categories_link" href="/tags/строительные_материалы">Строительные материалы</a><br>
	<a  class="categories_link" href="/tags/сантехника">Сантехника</a><br>
	<a  class="categories_link" href="/tags/зоотовары">Зоотовары</a><br>
	<a  class="categories_link" href="/tags/спортивные_товары">Спортивные товары</a><br> 
</div>
 

<div class="content" >
	
	
	@foreach ($table as $data)
	<div id="item">
	
	<div class="img"><img src="{{$data->img}}"></div>
	<div class="text">
	<div class="name">{{$data->name}}</div>
	<div class="description " >{{$data->description}}</div>
	<div class="price">
	@if(Auth::user())
	<a href="/bye/{{$data->id}}" class="button11">{{$data->price}}</a>
@else
	<a href="/login" class="button11">{{$data->price}}</a>
@endif
	</div>
	</div>
	</div>
	<hr>
	
	@endforeach
	<div style="text-align: center; margin: 0 auto; display: table;">
	{{ $table->links( "pagination::bootstrap-4") }}
	</div>
	<div style="margin-bottom: 15%;"></div>
 

</div>

@endsection