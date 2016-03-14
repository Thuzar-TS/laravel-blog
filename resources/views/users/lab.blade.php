@extends('layouts.app')
@if ( !count($la))
       No Data
@else
 <div class="col-md-12 pad-free" id="doc">        

      @foreach( $la as $l)
                <div class='col-md-6 col-md-offset-1'>
                              @if($l->photo)
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/'.$l->photo)!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @else
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/hospital-icon.png')!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @endif
                              <div class="hos-name col-sm-12">{!! $l->lab_name !!}</div>
                              <div class="col-sm-12">{!! $l->lab_address !!}</div>
		       <div class="col-sm-12">{!! $l->lab_ph !!}</div>
		       <div class="col-sm-12">{!! $l->lab_website !!}</div>
                </div>
       <div class="col-md-10 col-md-offset-1 profile">
      <div class="col-md-12">
        <h2>About Hospital</h2>
        <p class="profile-div">
         {!! $l->about !!}
        </p>
      </div>
      <div class="col-md-12">
        <h2>Location</h2>
        <p class=" profile-div">
             {!! $l->location !!}
        </p>
      </div>
      <div class="col-md-12">
        <h2>Facilities</h2>
        <p class="profile-div">
Scottish poet Robert Burns didn't compare his love to a red, red rose for nothing.
 Long associated with beauty and perfection, red roses are a time-honored way to say " I love you ".
  Whether it's for a birthday, Valentine's Day or just to express appreciation on any old day, there's no better way than a bouquet of red roses to express your feelings.

 Scottish poet Robert Burns didn't compare his love to a red, red rose for nothing.
 Long associated with beauty and perfection, red roses are a time-honored way to say " I love you ".
  Whether it's for a birthday, Valentine's Day or just to express appreciation on any old day, there's no better way than a bouquet of red roses to express your feelings.
   </p>
      </div>
      <div class="col-md-12">
        <h2>Direction</h2>
        <p class="profile-div">
              {!! $l->direction !!}
        </p>
      </div>
  </div>
   @endforeach
</div>
@endif