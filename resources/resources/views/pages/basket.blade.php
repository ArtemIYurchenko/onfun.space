@extends('layout')

@section('btn')
<link href="/css/pop-up.css?<?=time()?>" rel="stylesheet">
<link href="/css/btn_basket.css?<?=time()?>" rel="stylesheet">
<link href="/css/home_cont.css?<?=time()?>" rel="stylesheet">
		@if(Auth::user())
		<div class="dropdown"> 	
		<img src="{{$u->avatar}}" width="45" height="45" >
		<div class="dropdown-content">
    <a href="user/me" style=" padding-right: 30px;" >Профиль</a>
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
 
@if(sizeof($table))
	<div class="data_order">
	<form action="{{ route('basketForm')}}" method="post">
  @csrf
  <label style="margin-left: 30px; margin-top: 20px;">Адрес доставки</label>
    <div class="location">
      <input size="50" id="location" name="location" type="text" value="" type="text" name="" required="" autocomplete="off" >
    </div>
	<label style="margin-left: 30px; margin-top: 20px;">Номер телефона</label>
	<div class="telephone">
      <input size="20" id="telephone" name="telephone" type="username" value="" required="" autocomplete="off">
    </div>
    <a type="submit" style="margin-left: 200px; margin-top: 50px;">
      <button class="btn btn-outline-success">Готово! </button>
    </a>
 
   </form>
	
</div>
<div class="basket_order" >
	
	@foreach ($array as $id)
	@foreach ($table as $data)
	@if($data->id==$id)
	<div id="item">
	<div class="img"><img src="{{$data->img}}"></div>
	<div class="text">
	<div class="name">{{$data->name}}</div>
	<div class="description " >{{$data->description}}</div>
	<div class="price">
	<a href="/basket_del/{{$data->id}}" class="button12">{{$data->price}}</a>
	</div>
	</div>
	</div>
	<hr>
	@else
	@endif
	@endforeach
	@endforeach
</div>
@else 
		<div class="empty_basket">Тут пусто!</div>
	@endif
@endsection