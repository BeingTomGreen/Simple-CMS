<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Meta Data -->
	<meta charset="utf-8" />
	<title>{{ $pageTitle }}</title>
	<meta name="description" content="{{ $pageDescription }}" />

  <!-- Open Graph Protocol -->
  <meta property='og:title' content='{{ $pageTitle }}' />
  <meta property='og:description' content='{{ $pageDescription }}' />
  <meta property='og:site_name' content='' />
  <meta property='og:type' content='website' />
  <meta property='og:url' content='{{ URL::current() }}' />
  <meta property='og:image' content='' />

	<!-- Styles & Icons -->
  {{ HTML::style('css/base.css') }}
  {{ HTML::style('css/site.css') }}
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- SEO -->
  <link rel="canonical" href="{{ URL::current() }}" />

</head>

<body>
  <div class="container">

    <div class='sixteen columns'>
      <h1><a href='http://beingtomgreen.co.uk/'>BeingTomGreen</a></h1>
      <h2>Web Development and Search Engine Optimization blog</h2>
      <hr />
    </div>

    <div class='sixteen columns'>
      <ul id='nav'>
        <li><a href="{{ URL::to_route('cms_home') }}">Home</a></li>
        <li><a href="{{ URL::to_route('page_view', array('about')) }}">About me</a></li>
        </ul>
        <hr />
    </div>

    <div class="sixteen columns content">
      @section('content')
      @yield_section
    </div>

    <div class='sixteen columns'>
      <hr />
      <p>&copy;</p>
    </div>

  </div>
</body>
</html>