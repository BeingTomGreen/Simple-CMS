<!DOCTYPE html>
<html class="no-js">
	<head>
		<!-- Meta Data -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{ $pageTitle }}</title>
		<meta name="description" content="{{ $pageDescription }}" />
		<meta name="viewport" content="width=device-width">

		<!-- Open Graph Protocol -->
		<meta property='og:title' content='{{ $pageTitle }}' />
		<meta property='og:description' content='{{ $pageDescription }}' />
		<meta property='og:site_name' content='' />
		<meta property='og:type' content='website' />
		<meta property='og:url' content='{{ URL::current() }}' />
		<meta property='og:image' content='' />

		<!-- Styles, Scripts & Icons -->
		{{ HTML::style('frontend/css/bootstrap.min.css') }}
		{{ HTML::style('frontend/css/bootstrap-responsive.min.css') }}
		{{ HTML::style('frontend/css/main.css') }}
		{{ HTML::script('frontend/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}
	</head>
 <body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{ URL::base() }}">{SiteName}</a>
					<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="/about">About</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="span10">
			@section('content')
			@yield_section
			</div>
			<div class="span2">
			@section('sidebar')
			@yield_section
			</div>
		</div>
		<div class="row">
			<hr>
			<p>&copy; Company 2012</p>
		</div>
	</div>

	<!-- Scripts & Analytics -->
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js') }}
	{{ HTML::script('frontend/js/vendor/bootstrap.min.js') }}
	{{ HTML::script('frontend/js/main.js') }}

	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
</body>
</html>
