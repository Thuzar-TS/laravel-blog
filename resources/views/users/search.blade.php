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
        @if ( !count($result))
        No search data
        @else
        <ul>

            @foreach( $result as $r )
                @if($r->type == 'd')
                <div class='col-sm-6 col-sm-offset-1 searchdiv'>
                              <a href="{!! route('profile') !!}"><h1>{!! $r->name !!}</h1></a>
                </div>

                @else
                <div class='col-sm-6 col-sm-offset-1 searchdiv'>
                              <a href="{!! route('register') !!}"><h1>{!! $r->name !!}</h1></a>
                </div>

              @endif
            @endforeach

        </ul>
    @endif
            </div>
        </div>
</div>
@stop
