@extends('layouts.app')
@section('content')
<div class="col-sm-12">
   
        <h2 class="col-md-4 col-md-offset-4">Create New Facility</h2>
        {!! Form::open(array('route' => array('facility.store'),'files'=>true, 'method' => 'post')) !!}
        @if (isset($message))
        {!!  $message !!}
        @endif
         <div class="col-md-4 col-md-offset-4">

        <div class="form-group">
            {!! Form::label('description','Facility Description') !!}
            {!! Form::text('description', null,array('class' => 'form-control')) !!}
        </div>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {!! Form::submit('Register', array('class' => 'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
   
</div>
@stop
