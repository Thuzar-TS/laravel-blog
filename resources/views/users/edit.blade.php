@extends('layouts.app')
@section('content')
<div class="col-sm-12">
   
        <h2 class="col-md-4 col-md-offset-4">Create New</h2>
        {!! Form::open(array('route' => array('user.update', $users->id),'files'=>true, 'method' => 'PATCH')) !!}
        @if (isset($message))
        {!!  $message !!}
        @endif
         <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',$users->name, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',$users->email, array('class' => 'form-control')) !!}
        </div>
        @if(Auth::check() && Auth::user()->role_id==1)
        <div class="form-group">
            {!! Form::label('role','Role') !!}
            {!! Form::select('role', $role_list , Input::old('id'), array('class'=>'form-control')) !!}
            <!--{!! Form::select('role', array('' => 'Select Role', '$user->role_id' => 'Main Category') + $role_list) !!}-->
        </div>
        @elseif(Auth::user()->role_id==2)
         <div class="form-group">
            <input type="text" name="role" value="2" style="display:none;">
        </div>
         @elseif(Auth::user()->role_id==3)
         <div class="form-group">
            <input type="text" name="role" value="3" style="display:none;">
        </div>
        @else
        <div class="form-group">
            <input type="text" name="role" value="4" style="display:none;">
        </div>
         @endif

        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>
           <div class="form-group">
               {!! Form::label('password_confirmation','Password Confirm') !!}
               {!! Form::password('password_confirmation',array('class' => 'form-control')) !!}
          </div>
         @if(Auth::check() && Auth::user()->role_id==1)
        <div class="form-group">
            {!! Form::label('about','About') !!}
            {!! Form::textarea('about', null,array('class' => 'form-control')) !!}
        </div>
         @endif
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        {!! Form::submit('Register', array('class' => 'btn btn-primary')) !!}
        </div>
        <div class="col-md-2">
            <div class="form-group">
        <input type="file" name="filefield" class="" onchange='readURL(this);'>
        </div>
            <div class='form-group'>
                <img src='' id='blah' class='img-responsive col-sm-12' style='width: 100%; height: 200px; '>
            </div>  
        </div>
        {!! Form::close() !!}
   
</div>
@stop

<script type="text/javascript">
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>