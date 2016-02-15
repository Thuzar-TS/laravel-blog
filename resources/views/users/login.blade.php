@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-4 col-md-offset-4 login-div pad-free">
<div class="login-bar">LOGIN</div>
<div class="login-form col-md-12">
{!! Form::open(array('url' => 'login', 'method' => 'post')) !!}
<div class="col-md-12" style="padding-top:10px; padding-bottom:10px;">
	<img src="{!! asset('assets/img/user.jpg')!!}" class="col-md-4 col-md-offset-4 img-circle">
</div>

{!! @$message !!}
<div class="form-group col-md-10 col-md-offset-1"> 
{!! Form::label('email','Email') !!}
{!! Form::text('email', null,array('class' => 'form-control')) !!}
</div>
<div class="form-group col-md-10 col-md-offset-1"> 
{!! Form::label('password','Password') !!}
{!! Form::password('password',array('class' => 'form-control')) !!}
</div>

<input type="hidden" name="_token" value="{!! csrf_token() !!}">

{!! Form::submit('Login', array('class' => 'all-btn col-md-4 col-md-offset-4')) !!}

{!! Form::close() !!}	
</div>
</div>

<div class="col-md-4 col-md-offset-4 login-c-div">
	<a href="{!! route('register') !!}">Create An Account</a>
</div>
</div>
@stop