@extends('layouts.app')

<div class="container-fluid">
     <div class="col-md-9">
	<div class="slider">
	 	<div class="col-md-10 col-md-offset-1 slider-wrapper theme-default pad-free">
	            <div id="slider" class="nivoSlider">
	                	<img src="{!! asset('assets/img/slider/slider1.png')!!}" class="img-responsive">
			<img src="{!! asset('assets/img/slider/slider2.png')!!}" class="img-responsive">
			<img src="{!! asset('assets/img/slider/slider3.png')!!}" class="img-responsive">
	            </div>
	            </div>
	</div>
	<div class="col-md-8 col-md-offset-2 home-box pad-free" id="home-box">
		<div class="col-md-4 box1 pad-free">

		<!--	<a href="#"><img src="{!! asset('assets/img/doctor.png')!!}" id="doctor" class="img-responsive col-md-12 pad-free" onmouseover="changedoctor('{!! asset('assets/img/doctor-over.png')!!}')" onmouseout="changedoctor('{!! asset('assets/img/doctor.png')!!}')"></a> -->
			<a href='#'><img src="{!! asset('assets/img/doctor.png')!!}" id="doctor" class="img-responsive col-md-12 pad-free"></a>
			<a href='#'><img src="{!! asset('assets/img/doctor-over.png')!!}" id="doctor-over" class="img-responsive col-md-12 pad-free" style="display:none;"></a>
		</div>
		<div class="col-md-4 box2 pad-free">
		<!--	<a href="#"><img src="{!! asset('assets/img/hospital.png')!!}" id="hospital" class="img-responsive col-md-12 pad-free" onmouseover="changehospital('{!! asset('assets/img/hospital-over.png')!!}')" onmouseout="changehospital('{!! asset('assets/img/hospital.png')!!}')"></a> -->
			<a href="#"><img src="{!! asset('assets/img/hospital.png')!!}" id="hospital" class="img-responsive col-md-12 pad-free"> </a>
			<a href="#"><img src="{!! asset('assets/img/hospital-over.png')!!}" id="hospital-over" class="img-responsive col-md-12 pad-free" style="display:none;"> </a>
		</div>
		<div class="col-md-4 box3 pad-free">
		<!--	<a href="#"><img src="{!! asset('assets/img/lab.png')!!}" id="lab" class="img-responsive col-md-12 pad-free" onmouseover="changelab('{!! asset('assets/img/lab-over.png')!!}')" onmouseout="changelab('{!! asset('assets/img/lab.png')!!}')"></a> -->
			<a href="#"><img src="{!! asset('assets/img/lab.png')!!}" id="lab" class="img-responsive col-md-12 pad-free"> </a>
			<a href="#"><img src="{!! asset('assets/img/lab-over.png')!!}" id="lab-over" class="img-responsive col-md-12 pad-free" style="display:none;"> </a>
		</div>
	</div>
    </div>
    <div  class="col-md-3" style="height:600px;">
            
    </div>

 
       {!! Form::open(array('url' => 'search', 'method' => 'post')) !!}
 
         <div class="">

        <div class="form-group col-md-6 col-md-offset-1">
            {!! Form::text('searchtxt',null,array('class' => 'form-control', 'placeholder' => 'Search Doctor or Hospital')) !!}
        </div>
	 <div class="col-md-5">
	 	{!! Form::submit('Search', array('class' => 'all-btn btn-primary ')) !!}
	 </div>
        
        </div>
 
        {!! Form::close() !!}
   

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