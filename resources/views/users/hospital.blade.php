@extends('layouts.app')
@if ( !count($hos))
       No Data
@else
 <div class="col-md-10 col-md-offset-1 pad-free" id="doc">     

      @foreach( $hos as $h)
                <div class='col-md-6' style="height:400px;">
                              <div><img src="{!! asset('images/'.$h->photo)!!}" class="img-responsive" style="border-radius:5px; width: 100%; height:  330px;"></div>
                              <div class="hos-name">{!! $h->hospital_name !!}</div>
                </div>
     
      <div class='col-md-6' style="height:400px;">
      <table class="table table-striped">
      <thead>
      	<tr>
                		<th>Doctor Name</th>
                		<th>Specialist</th>
                		<th>Address</th>
      	</tr>
      </thead>
      
      @foreach( $doc as $d)
                
                	<tr>
	                	<td><a href="{!! route('user::doctor', $d->id) !!}">{!! $d->doctor_name !!}</a></td>
	                	<td>{!! $d->specialist !!}</td>
	                	<td>{!! $d->doctor_address !!}</td>
                	</tr>                
                
      @endforeach
	</table>
	</div>
  <div class="col-md-12 profile">
      <div class="col-md-12">
        <h2>About Hospital</h2>
        <p class="profile-div">
         {!! $h->about !!}
        </p>
      </div>
      <div class="col-md-12">
        <h2>Location</h2>
        <p class=" profile-div">
             {!! $h->location !!}
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
              {!! $h->direction !!}
        </p>
      </div>
  </div>
   @endforeach
</div>

@endif