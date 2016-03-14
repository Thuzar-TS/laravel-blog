@extends('layouts.app')
@section('content')
<div class="col-sm-12" style="margin-top: 10px;">
   
        <h2 class="col-md-4 col-md-offset-4">Create New Doctor</h2>
        {!! Form::open(array('route' => array('doctor.store'),'files'=>true, 'method' => 'post')) !!}
        @if (isset($message))
        {!!  $message !!}
        @endif
         <div class="col-md-4 col-md-offset-4">

        <div class="form-group">
            {!! Form::label('name','Doctor Name') !!}
            {!! Form::text('name', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address','Doctor Address') !!}
            {!! Form::text('address', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone','Doctor Phone') !!}
            {!! Form::text('phone', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Doctor Email') !!}
            {!! Form::text('email', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city','City') !!}
            {!! Form::select('city', $role_list , Input::old('id'), array('class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('degree','Degree') !!}
            {!! Form::text('degree', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('special','Specialists') !!}
            {!! Form::text('special', null,array('class' => 'form-control')) !!}
        </div>
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