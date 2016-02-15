@extends('layouts.app')
@section('content')
<div class="col-md-12">
   	<div class="col-md-4 col-md-offset-4">

        <div class="row"><h2>Search Page</h2></div>
         {!! Form::open(array('url' => 'search', 'method' => 'post')) !!}
        <div class="row">
        	<div class="form-group col-md-8">
            {!! Form::text('searchtxt',null,array('class' => 'form-control', 'placeholder' => 'Search Doctor or Hospital')) !!}
        </div>
	 <div class="col-md-4">
	 	{!! Form::submit('Search', array('class' => 'all-btn btn-primary ')) !!}
	 </div>
        </div>
          {!! Form::close() !!}
        <div class="row">
        @if ( !$doctors->count() )
        You have no doctors
    @else
        <ul>
            @foreach( $doctors as $doctor )
                <li>
                        {!! $doctor->doctor_name !!}
              </li>
            @endforeach
        </ul>
    @endif
            </div>
        </div>
</div>
@stop
