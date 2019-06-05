<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Vlog-Shopper</title>
    <link href="{{URL::to('css/frontend_css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/frontend_css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/frontend_css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/frontend_css/price-range.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/frontend_css/animate.css')}}" rel="stylesheet">
	<link href="{{URL::to('css/frontend_css/main.css')}}" rel="stylesheet">
	<link href="{{URL::to('css/frontend_css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{URL::to('js/frontend_js/html5shiv.js')}}"></script>
    <script src="{{URL::to('js/frontend_js/respond.min.js')}}"></script>
    <![endif]-->       
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('img/frontend_img/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('img/frontend_img/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('img/frontend_img/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('img/frontend_img/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	@include('layouts.frontlayout.front_header')
	
	@yield('content')
	
    @include('layouts.frontlayout.front_footer')

	

  
    <script src="{{URL::to('js/frontend_js/jquery.js')}}"></script>
	<script src="{{URL::to('js/frontend_js/bootstrap.min.js')}}"></script>
	<script src="{{URL::to('js/frontend_js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{URL::to('js/frontend_js/price-range.js')}}"></script>
    <script src="{{URL::to('js/frontend_js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{URL::to('js/frontend_js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>