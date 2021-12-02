@extends('layout')
@section('btn')
@if(Auth::user())
		<div style="margin-right: 10px">	
		<img src="{{$u->avatar}}" width="45" height="45" >
		</div>
			
		<form class="d-flex" action="/logout">
          <button class="btn_login btn btn-outline-success" type="submit">Выйти</button>
        </form>
		
		@else
			
		<form class="d-flex" action="/login">
          <button class="btn_login btn btn-outline-success" type="submit">Войти</button>
        </form>
		
		@endif
@endsection

@section('content')
<link href="/css/css.css?<?=time()?>" rel="stylesheet"> 
<div >
	@if($errors->any())
	<div class="alert alert-danger" style="margin-top:3%;">
	<ul>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
	</ul>
	</div>
	@endif
	
	
	
	<div class="login-box">
  <h2>Регистрация</h2>
  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
      @endif
    @endforeach
  </div> 
  <form action="{{ route('regForm')}}" method="post">
  @csrf
    <div class="user-box">
      <input id="email" name="email" type="text" value="" type="text" name="" required="" autocomplete="off" >
      <label>Ваш email</label>
    </div>
	<div class="user-box">
      <input id="username" name="username" type="username" value="" required="" autocomplete="off">
      <label>ФИО</label>
    </div>
	<div class="user-box">
      <input id="avatar" name="avatar" type="avatar" value="" required="" autocomplete="off">
      <label>URL аватара</label>
    </div>
    <div class="user-box">
      <input id="password" name="password" type="password" value="" required="">
      <label>Пароль</label>
    </div>
    <a type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button>Готово! </button>
    </a>

   </form>
   
</div>
	
	
@endsection


