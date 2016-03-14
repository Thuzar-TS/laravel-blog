@extends('layouts.app')

<div class="container-fluid">
     <div class="">
	<div class="slider col-md-12" style="padding:0px;">
		<img src="{!! asset('assets/img/slider/slider11.png')!!}" class="img-responsive col-md-12" style="padding:0px;">
	</div>
	<div class="col-md-10 col-md-offset-1 pad-free">
	<div class="col-md-3 hos-advertise">
	
		<div class="col-md-12 pad-free hos-img-adv">
		@if(isset($h))
			<ul id="slider1">
				@foreach( $h as $advh )
					<li>
					<img src="{!! asset('images/'.$advh->photo)!!}" id="imglist" class="img-responsive col-xs-12 pad-free" style="border-radius: 3px;">
					<span class="col-md-12 pad-free">{!! $advh->hospital_name !!}</span>
					</li>
				@endforeach
			</ul>
		@endif
		</div>

		<div class="col-md-12 pad-free hos-img-adv">
		@if(isset($h))
			<ul id="slider2">
				@foreach( $h as $advh )
					<li>
					<img src="{!! asset('images/'.$advh->photo)!!}" id="imglist" class="img-responsive col-xs-12 pad-free" style="border-radius: 3px;">
					<span class="col-md-12 pad-free">{!! $advh->hospital_name !!}</span>
					</li>
				@endforeach
			</ul>
		@endif
		</div>

		<div class="col-md-12 pad-free hos-img-adv">
		@if(isset($h))
			<ul id="slider3">
				@foreach( $h as $advh )
					<li>
					<img src="{!! asset('images/'.$advh->photo)!!}" id="imglist" class="img-responsive col-xs-12 pad-free" style="border-radius: 3px;">
					<span class="col-md-12 pad-free">{!! $advh->hospital_name !!}</span>
					</li>
				@endforeach
			</ul>
		@endif
		</div>
	</div>
	<div class="col-md-7 col-md-offset-1 home-box pad-free" id="home-box">
		<div class="col-md-4 box1 pad-free">

		<!--	<a href="#"><img src="{!! asset('assets/img/doctor.png')!!}" id="doctor" class="img-responsive col-md-12 pad-free" onmouseover="changedoctor('{!! asset('assets/img/doctor-over.png')!!}')" onmouseout="changedoctor('{!! asset('assets/img/doctor.png')!!}')"></a> -->
			<a href="{!! route('docall') !!}"><img src="{!! asset('assets/img/doctor.png')!!}" id="doctor" class="img-responsive col-md-12 pad-free"></a>
			<a href="{!! route('docall') !!}"><img src="{!! asset('assets/img/doctor-over.png')!!}" id="doctor-over" class="img-responsive col-md-12 pad-free" style="display:none;"></a>
		</div>
		<div class="col-md-4 box2 pad-free">
		<!--	<a href="#"><img src="{!! asset('assets/img/hospital.png')!!}" id="hospital" class="img-responsive col-md-12 pad-free" onmouseover="changehospital('{!! asset('assets/img/hospital-over.png')!!}')" onmouseout="changehospital('{!! asset('assets/img/hospital.png')!!}')"></a> -->
			<a href="{!! route('hosall') !!}"><img src="{!! asset('assets/img/hospital.png')!!}" id="hospital" class="img-responsive col-md-12 pad-free"> </a>
			<a href="{!! route('hosall') !!}"><img src="{!! asset('assets/img/hospital-over.png')!!}" id="hospital-over" class="img-responsive col-md-12 pad-free" style="display:none;"> </a>
		</div>
		<div class="col-md-4 box3 pad-free">
		<!--	<a href="#"><img src="{!! asset('assets/img/lab.png')!!}" id="lab" class="img-responsive col-md-12 pad-free" onmouseover="changelab('{!! asset('assets/img/lab-over.png')!!}')" onmouseout="changelab('{!! asset('assets/img/lab.png')!!}')"></a> -->
			<a href="{!! route('laball') !!}"><img src="{!! asset('assets/img/lab.png')!!}" id="lab" class="img-responsive col-md-12 pad-free"> </a>
			<a href="{!! route('laball') !!}"><img src="{!! asset('assets/img/lab-over.png')!!}" id="lab-over" class="img-responsive col-md-12 pad-free" style="display:none;"> </a>
		</div>

		 {!! Form::open(array('url' => 'search', 'method' => 'post')) !!}
 
         <div class="col-md-12 pad-free" style="margin-top:30px;">

        <div class="form-group col-md-8 pad-free">
            {!! Form::text('searchtxt',null,array('class' => 'form-control', 'placeholder' => 'Search Doctor or Hospital')) !!}
        </div>
        <div class="col-md-4">
	 	{!! Form::submit('Search', array('class' => 'all-btn btn-primary col-md-12')) !!}
        </div>
        
        </div>
 
        {!! Form::close() !!}
	</div>
    </div>
 </div> 
</div>
<script>
    function changedoctor(img){
                   document.getElementById('doctor').src=img;
                }
    function changehospital(img){
                   document.getElementById('hospital').src=img;
                }
    function changelab(img){
                   document.getElementById('lab').src=img;
                }  
</script>