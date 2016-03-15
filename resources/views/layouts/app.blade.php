<!DOCTYPE html>
<html>
<head>
    <title>Laravel Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('assets/css/bootstrap.min.css') !!} 
    {!! Html::style('assets/css/slider.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    {!! Html::style('assets/css/side-bar-menu.css') !!}
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <script src="{!! asset('assets/js/jquery.min.js')!!}"></script>
    <script src="{!! asset('assets/js/bootstrap.min.js')!!}"></script>
    <script src="{!! asset('assets/js/jquery.nivo.slider.js')!!}"></script>
    <script src="{!! asset('assets/js/jquery.nivo.slider.js')!!}"></script>
    <script src="{!! asset('assets/js/jq-search.js')!!}"></script>
    <style>
        body{
            padding-top: 50px;
        }
    </style>
    <script>
    $(window).load(function() {
        $('#sidebar-btn').click(function() {
            $('#sidebar').toggleClass('visible');
            if (!$('#black-overlay').is(':visible')) {
                $('#black-overlay').css('display','block');
            }else{
                $('#black-overlay').css('display','none');
            }
            
        });
                $('#slider').nivoSlider();

                $('#doctor').mouseenter(function(){
                $(this).fadeOut('fast', function(){
                    $('#doctor-over').fadeIn(350);
        });            
    });

                $('#doctor-over').mouseleave(function(){
                $(this).fadeOut('fast', function(){
                    $('#doctor').fadeIn(350);
        });            
    });

                $('#hospital').mouseenter(function(){
                $(this).fadeOut('fast', function(){
                    $('#hospital-over').fadeIn(350);
        });            
    });

                $('#hospital-over').mouseleave(function(){
                $(this).fadeOut('fast', function(){
                    $('#hospital').fadeIn(350);
        });            
    });

                $('#lab').mouseenter(function(){
                $(this).fadeOut('fast', function(){
                    $('#lab-over').fadeIn(350);
        });            
    });

                $('#lab-over').mouseleave(function(){
                $(this).fadeOut('fast', function(){
                    $('#lab').fadeIn(350);
        });            
    });

  // settings
  var  $slider1 = $('#slider1'); // class or id of carousel slider
  var  $slide1 ='li';  // could also use 'img' if you're not using a ul
  var  $transition_time = 2000; // 1 second
  var  $time_between_slides1 = 3000; // 4 seconds
  function slides1(){
    return $slider1.find($slide1);
  }
  slides1().fadeOut();

  // set active classes
  slides1().first().addClass('active');
  slides1().first().fadeIn($transition_time);

  // auto scroll 
  $interval = setInterval(
    function(){
      var $i = $slider1.find($slide1 + '.active').index();

      slides1().eq($i).removeClass('active');
      slides1().eq($i).fadeOut($transition_time);

      if (slides1().length == $i + 1) $i = -1; // loop to start

      slides1().eq($i + 1).fadeIn($transition_time);
      slides1().eq($i + 1).addClass('active');
    }
    , $transition_time +  $time_between_slides1
  );
    var  $slider2 = $('#slider2'); // class or id of carousel slider
  var  $slide2 ='li';  // could also use 'img' if you're not using a ul
  var  $transition_time = 2000; // 1 second
  var  $time_between_slides2 = 6000; // 4 seconds
  function slides2(){
    return $slider2.find($slide2);
  }
  slides2().fadeOut();

  // set active classes
  slides2().first().addClass('active');
  slides2().first().fadeIn($transition_time);

  // auto scroll 
  $interval = setInterval(
    function(){
      var $i = $slider2.find($slide2 + '.active').index();

      slides2().eq($i).removeClass('active');
      slides2().eq($i).fadeOut($transition_time);

      if (slides2().length == $i + 1) $i = -1; // loop to start

      slides2().eq($i + 1).fadeIn($transition_time);
      slides2().eq($i + 1).addClass('active');
    }
    , $transition_time +  $time_between_slides2 
  ); 
    var  $slider3 = $('#slider3'); // class or id of carousel slider
  var  $slide3 ='li';  // could also use 'img' if you're not using a ul
  var  $transition_time = 2000; // 1 second
  var  $time_between_slides3 = 4000; // 4 seconds
  function slides3(){
    return $slider3.find($slide3);
  }
  slides3().fadeOut();

  // set active classes
  slides3().first().addClass('active');
  slides3().first().fadeIn($transition_time);

  // auto scroll 
  $interval = setInterval(
    function(){
      var $i = $slider3.find($slide3 + '.active').index();

      slides3().eq($i).removeClass('active');
      slides3().eq($i).fadeOut($transition_time);

      if (slides3().length == $i + 1) $i = -1; // loop to start

      slides3().eq($i + 1).fadeIn($transition_time);
      slides3().eq($i + 1).addClass('active');
    }
    , $transition_time +  $time_between_slides3 
  );   

 });
</script>
</head>
<body>
@if (Auth::check())
 <div id="sidebar" class="col-md-2" style="padding:0px; position:fixed;"> 
       <ul class="col-md-12 pad-free">
           <li id="head" class="col-md-12 pad-free"><a href="{!! route('user::profile') !!}" class="col-md-8">{!! Auth::user()->name !!}</a><img src="{!! URL::asset('images/' . Auth::user()->photo) !!}" class="img-circle img-responsive col-md-3" style="padding:0px;"></li>
           <li class="col-md-12 pad-free"><a href="{!! route('user::/') !!}" class="col-md-8">Home</a></li>
           <li class="col-md-12 pad-free"><a href="{!! route('user::edit', Auth::user()->id) !!}" class="col-md-8">Edit Profile</a></li>
           @if (Auth::user()->role_id == 1)
           <li class="col-md-12 pad-free dropdown"><a href="{!! route('hospital::reghospital') !!}" class="col-md-8">Create New Hospital</a></li>
           <li class="col-md-12 pad-free dropdown"><a href="{!! route('lab::reglab') !!}" class="col-md-8">Create New Lab</a></li>
           <li class="col-md-12 pad-free dropdown"><a href="{!! route('doctor::regdoctor') !!}" class="col-md-8">Create New Doctor</a></li>
           <li class="col-md-12 pad-free dropdown"><a href="{!! route('doctor::doclistall', Auth::user()->id) !!}" class="col-md-8">My Doctor List</a></li>
           @elseif (Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
            <li class="col-md-12 pad-free dropdown"><a href="{!! route('doctor::regdoctor') !!}" class="col-md-8">Create New Doctor</a></li>
            <li class="col-md-12 pad-free dropdown"><a href="{!! route('doctor::doclistall', Auth::user()->id) !!}" class="col-md-8">My Doctor List</a></li>
           @endif
           <li class="col-md-12 pad-free dropdown"><a href="{!! route('user::register') !!}" class="col-md-8">Create New User</a></li>
           <li class="col-md-12 pad-free"><a href="{!! route('user::logout') !!}" class="col-md-8">Logout</a></li>
       </ul>
       <div id="sidebar-btn">
           <span></span>
           <span></span>
           <span></span>
        </div>
   </div>
@endif
<div id="black-overlay"></div>
<div class="page" id="wrapper">
    <div class="container-fluid" id="main">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom:0px;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{!! route('user::/') !!}">MM Health Care Hub</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
                    <ul class="nav navbar-nav navbar-right col-sm-9">
                        @if (!Auth::check())
                        <li class="col-sm-offset-8 col-sm-2" style="padding: 0; "><a href="{!! route('user::login') !!}">Login</a></li>
                        <li class="col-sm-2" style="padding: 0; "><a href="{!! route('user::/') !!}">Home</a></li>
                        @endif
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if($errors->has())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    @yield('content')
    <div id="footer" class="col-md-12">
        <div class="footer-div">
            <div class="row pad-free">
            <label class="col-xs-12 col-sm-7 col-md-5 col-md-offset-1 flabel" id="flabel">Alright reserved by <a href="www.trionmyanmar.com" target="_blank" style="color:orange;">TRION Company Ltd</a> @ 2016</label>
            <div class="logo col-sm-5 col-md-5 pad-free">
            <div class="col-md-4 col-md-offset-2 pad-free">
            <img src="{!! asset('assets/img/find.png')!!}" class="img-responsive">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-6 pad-free" >
            <img src="{!! asset('assets/img/facebook.png')!!}" class="img-responsive col-md-2 social">
            <img src="{!! asset('assets/img/google.png')!!}" class="img-responsive col-md-2 social">
            <img src="{!! asset('assets/img/twitter.png')!!}" class="img-responsive col-md-2 social">
            <img src="{!! asset('assets/img/instagram.png')!!}" class="img-responsive col-md-2 social">
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@show

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
</body>
</html>