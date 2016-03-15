@extends('layouts.app')
@if ( !count($alldoc))
        No search data
@elseif($hospitalid == 0 && $c == 0)
        <div class="hospitaldiv col-md-10 col-md-offset-1" id="doc" style="margin-top:30px;">
        {!! Form::open(array('url' => 'docall', 'method' => 'post')) !!}
 
         <div class="col-md-12" style="margin-bottom:20px;">

        <div class="form-group col-md-6 col-md-offset-1">
            {!! Form::text('searchtxt',null,array('class' => 'form-control', 'placeholder' => 'Search Doctor')) !!}
        </div>
     <div class="col-md-2">
        {!! Form::submit('Search', array('class' => 'all-btn btn-primary col-md-10')) !!}
     </div>
        
        </div>
 
        {!! Form::close() !!}
            @foreach( $alldoc as $r )
                <div class='col-md-4'>
                      <div class="searchdoc col-md-12 pad-free">
                      <div class="col-md-4 pad-free">
                      @if($r->photo)
                       <div><a href="{!! route('user::doctor', $r->id) !!}"><img src="{!! asset('images/'.$r->photo)!!}" class="img-responsive" style="height:115px; width:100%;"></a></div>
                       @else
                       <div><a href="{!! route('user::doctor', $r->id) !!}"><img src="{!! asset('images/user.jpg')!!}" class="img-responsive" style="height:115px; width:100%;"></a></div>
                       @endif
                       </div>
                       <div class="col-md-8">
                              <a href="{!! route('user::doctor', $r->id) !!}"><label style="cursor:pointer;">{!! $r->doctor_name !!}</label></a><br/>
                              <label>{!! $r->degree !!}</label>&nbsp;&nbsp;&nbsp;<label>({!! $r->specialist !!})</label><br/>
                              <label>{!! $r->city_name !!}</label>
                       </div>
                      </div>
                </div>
            @endforeach 
      </div>
@else
        <div class="hospitaldiv col-md-10 col-md-offset-1" id="doc">
        
 
         <div class="col-md-12" style="margin-bottom:20px;">
         <div class="col-md-2">
                <label>Search</label>
          </div>
         <div class="col-md-6">
        <select class="form-control" name="cityselect" id="cityselect">
            @foreach($c as $city)
                <option value="{!! $city->id !!}">{!! $city->city_name !!}</option>
            @endforeach
        </select>
        </div>
        </div>
 
      {!! Form::open(array('url' => 'docall', 'method' => 'post', 'id' => 'set-up-form')) !!}
            @foreach( $alldoc as $r )
                <div class='col-md-4'>
                <label for="{!! $r->id !!}">
                      <div class="searchdoc col-md-12 pad-free">

                      <div class="col-md-4 pad-free">
                      @if($r->photo)
                       <div><img src="{!! asset('images/'.$r->photo)!!}" class="img-responsive" style="height:115px; width:100%;"></div>
                       @else
                       <div><img src="{!! asset('images/user.jpg')!!}" class="img-responsive" style="height:115px; width:100%;"></div>
                       @endif
                       </div>

                       <div class="col-md-8 pad-free">
                              <div class="col-md-10" style="color:#3169f8;"><label style="cursor:pointer;">{!! $r->doctor_name !!}</label></div>
                              <input type="checkbox" name="{!! $r->id !!}" value="{!! $r->id !!}" class="col-md-2" id="{!! $r->id !!}">
                              <div class="col-md-12">
                              <label>{!! $r->degree !!}</label>&nbsp;&nbsp;&nbsp;<label>({!! $r->specialist !!})</label>
                              </div>
                              <div class="col-md-12">
                              <label>{!! $r->city_name !!}</label>
                              </div>
                       </div>
                      
                      </div>
                      </label>
                </div>
            @endforeach 
       {!! Form::close() !!}
      <textarea name="listdata" id="listdata" cols="30" rows="10" style="display:none;"></textarea>
      </div>
@endif