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
    <style>
        body{
            padding-top: 70px;
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
 });
</script>
</head>
<body>
@if (Auth::check())
 <div id="sidebar" class="col-md-2" style="padding:0px;"> 
       <ul class="col-md-12 pad-free">
           <li id="head" class="col-md-12 pad-free"><a href="#" class="col-md-8">{!! Auth::user()->name !!}</a><img src="{!! URL::asset('images/' . Auth::user()->photo) !!}" class="img-circle img-responsive col-md-3" style="padding:0px;"></li>
           <li class="col-md-12 pad-free"><a href="#">Edit Profile</a></li>
           <li class="col-md-12 pad-free"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Create New<span class="caret"></a>
                    <ul class="dropdown-menu col-md-12 pad-free">
                        <li class="col-md-12 pad-free">Hospital</li>
                        <li class="col-md-12 pad-free">Lab</li>
                        <li class="col-md-12 pad-free">User</li>
                    </ul>
           </li>

           <li class="col-md-12 pad-free"><a href="#">Link4</a></li>
           <li class="col-md-12 pad-free"><a href="#">Logout</a></li>
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
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">MM Health Care Hub</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
                    <ul class="nav navbar-nav navbar-right col-sm-9">
                        @if (Auth::check())
                            @if (Auth::user()->role_id == 1)
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('logout') !!}">Log Out</a></li>
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('profile') !!}">{!! Auth::user()->name !!}</a></li>
                                <li class="col-sm-2" style="padding: 0; "><img src="{!! URL::asset('images/' . Auth::user()->photo) !!}" class="img-circle img-responsive col-sm-10" style="margin-top:6px;"><!--{!! Auth::user()->photo !!}--></li>
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('register') !!}">Create New User</a></li>
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('reghospital') !!}">Create New Hospital</a></li>
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('edit', Auth::user()->id) !!}">Edit Profile</a></li>
                            @else
                                <li class="col-sm-offset-2 col-sm-2" style="padding: 0; "><a href="{!! route('logout') !!}">Log Out</a></li>
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('profile') !!}">{!! Auth::user()->name !!}</a></li>
                                <li class="col-sm-2" style="padding: 0; "><img src="{!! URL::asset('images/' . Auth::user()->photo) !!}" class="img-circle img-responsive col-sm-10" style="margin-top:6px;"><!--{!! Auth::user()->photo !!}--></li>
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('regdoctor') !!}">Create New Doctor</a></li>
                                <li class="col-sm-2" style="padding: 0; "><a href="{!! route('edit', Auth::user()->id) !!}">Edit Profile</a></li>
                            @endif
                        @else
                        <li class="col-sm-offset-8 col-sm-2" style="padding: 0; "><a href="{!! route('login') !!}">Login</a></li>
                        <li class="col-sm-2" style="padding: 0; "><a href="{!! route('/') !!}">Home</a></li>
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