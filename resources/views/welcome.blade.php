<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Photogenics</title>
        <!--Digital Marketing Meta Tag -->
        <meta name="description" content="">
        <meta name="keywords" content=""/>
        <meta name="author" content="http://ephotogenics.com/">
        <meta property="og:title" content="ePhotogenics" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://ephotogenics.com/" />
        <meta property="og:site_name" content="http://ephotogenics.com/" />      
        <link rel="canonical" href="http://ephotogenics.com/"/>

        <!-- Favicon Icons -->
        <link rel="shortcut icon" href="{{asset('assets/img/ephotogenics_logo_dark.png')}}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{asset('assets/img/ephotogenics_logo_dark.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/ephotogenics_logo_dark.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/ephotogenics_logo_dark.png')}}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />


    </head>
    <body>
            <nav class="custom-nav">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo" style="padding:5px;">
                            <a class="simple-text logo-normal" href="{{ url('home') }}">
                                <img src=" {{asset('assets/img/ephotogenics_logo_dark.png')}} " alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>  reachus@photogenic.com</a><br>
                        <a href="#"><i class="fa fa-phone" aria-hidden="true"></i>  +91 9883777655</a>
                    </div>
                    <div class="col-md-3">
                            @if (Route::has('login'))
                            
                                @auth
                                    <a class="btn btn-grad" href="{{ url('/home') }}">Home</a>
                                @else
                                    <a class="btn btn-grad" href="{{ route('login') }}">Login</a>
            
                                    @if (Route::has('register'))
                                        <a class="btn btn-grad" href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            
                        @endif
                    </div>
                </div>
            </nav>
            <header class="py-5 bg-image-full" style="background-image: url('{{ asset("assets/img/bg.jpg") }}');min-height: 700px;width:100%;background-repeat: no-repeat;background-size: 100% 700px;">
			</header>
			<footer>
				<h1 style="font-size:20px;">EVERYONE WILL SEARCH YOU</h1>
            </footer>
            <div class="container">
                <div class="row">
                    <!-- Card deck -->
                    <div class="card-deck">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!--Card image-->
                            <div class="view overlay">
                                <img class="card-img-top" src="{{asset('assets/img/card1.jpg')}}">
                                <a href="#">
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title text-center">Model</h4>
                                <!--Text-->
                                <ul class="list-group">
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Make Personal Gallery</li>
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Upload your Awards</li>
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Contact Various Photographers</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <!--Card image-->
                            <div class="view overlay">
                                <img class="card-img-top" src="{{asset('assets/img/card2.jpg')}}">
                                <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title text-center">Photographer</h4>
                                <!--Text-->
                                <ul class="list-group">
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Make Personal Gallery</li>
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Upload your Awards</li>
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Contact Various Models</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <!--Card image-->
                            <div class="view overlay">
                                <img class="card-img-top" src="{{asset('assets/img/card3.jpg')}}">
                                <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title text-center">Makeup Artist</h4>
                                <!--Text-->
                                <ul class="list-group">
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Make Personal Gallery</li>
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Upload your Awards</li>
                                    <li class="list-group-item"> <i class="fa fa-arrow-right"></i> Contact Various Models</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                    <!-- Card deck -->
                </div>
            </div>
    </body>
</html>
