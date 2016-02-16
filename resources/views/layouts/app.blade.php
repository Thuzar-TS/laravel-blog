<!DOCTYPE html>
<html>
<head>
    <title>Laravel Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('assets/css/bootstrap.min.css') !!} 
    {!! Html::style('assets/css/slider.css') !!}
    {!! Html::style('assets/css/style.css') !!} 
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
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            @if (Auth::user()->role_id == 1)
                                <li><a href="{!! route('logout') !!}">Log Out</a></li>
                                <li><a href="{!! route('profile') !!}">{!! Auth::user()->user_name !!}</a></li>
                                <li><a href="{!! route('profile') !!}"><img src="{!! route('getentry', Auth::user()->photo) !!}" class="img-circle col-md-5"><!--{!! Auth::user()->photo !!}--></a></li>
                                <li><a href="{!! route('register') !!}">Create New</a></li>
                            @else
                                <li><a href="{!! route('logout') !!}">Log Out</a></li>
                                <li><a href="{!! route('profile') !!}">{!! Auth::user()->user_name !!}</a></li>
                            @endif
                        @else
                        <li><a href="{!! route('login') !!}">Login</a></li>
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