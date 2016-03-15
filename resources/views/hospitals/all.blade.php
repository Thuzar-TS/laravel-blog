@extends('layouts.app')
@if ( !count($allhos))
        No search data
@else
        <div class="hospitaldiv col-md-10 col-md-offset-1" id="doc" style="margin-top:30px;">
        {!! Form::open(array('url' => 'hosall', 'method' => 'post')) !!}
 
         <div class="col-md-12" style="margin-bottom:20px;">

        <div class="form-group col-md-6 col-md-offset-1">
            {!! Form::text('searchtxt',null,array('class' => 'form-control', 'placeholder' => 'Search Hospital')) !!}
        </div>
     <div class="col-md-2">
        {!! Form::submit('Search', array('class' => 'all-btn btn-primary col-md-10')) !!}
     </div>
        
        </div>
 
        {!! Form::close() !!}

            @foreach( $allhos as $r )
                <div class='col-md-4'>
                      <div class="searchdoc col-md-12 pad-free">
                      @if($r->photo)
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/'.$r->photo)!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @else
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/hospital-icon.png')!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @endif
                        <div class="col-md-12">
                             <a href="{!! route('user::hospital', $r->id) !!}" class="col-md-12 pad-free"><label style="cursor:pointer;">{!! $r->hospital_name !!}</label></a><br/>
                             <label class="col-md-9 pad-free">{!! $r->city_name !!}</label>
                             <a href="{!! route('user::hospital', $r->id) !!}" class="col-md-2 col-md-offset-1" style="color:orange; font-weight:bold;font-size:0.85em;">DETAIL</a>
                        </div>
                      </div>
              </div>
            @endforeach 
      </div>
@endif