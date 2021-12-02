@extends('layout')

@section('btn')
<link href="/css/pop-up.css?<?=time()?>" rel="stylesheet">
<link href="/css/btn_basket.css?<?=time()?>" rel="stylesheet">
<link href="/css/home_cont.css?<?=time()?>" rel="stylesheet">
<link href="/css/userme.css?<?=time()?>" rel="stylesheet">
		@if(Auth::user())
		<div class="dropdown"> 	
		<img src="{{$u->avatar}}" width="45" height="45" >
		<div class="dropdown-content">
    <a href="#" style=" padding-right: 30px;" >Профиль</a>
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

@if(Auth::user())
  
<div class="usercontent">
<div id="profile">
	
	<div class="img"><img src="{{$u->avatar}}"></div>
	<div class="text"><div class="name">ФИО: {{$u->username}}</div>
	<div class="name">ip: {{$u->ip}}</div>
	<div class="name">Дата создания: {{$u->created_at}}</div>
	@if($u->email==NULL)
	<div class="name">VK id: {{$u->vid}}</div>
	@else
		<div class="name">email: {{$u->email}}</div>
	@endif
	</div>
	</div>

<div>

 @else
 <div class="usercontent">
<div id="profile">
	
	<div class="img"><img src="/logo/incognito.jpg"></div>
	<div class="text"><div class="name">Вы не авторизованы !</div>
	
	</div>
	</div>
 @endif


@endsection