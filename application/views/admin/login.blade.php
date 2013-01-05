<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Le styles -->
    {{ HTML::style('backend/css/bootstrap.css?'. time()) }}
    {{ HTML::style('backend/css/bootstrap-responsive.css?'. time()) }}
    {{ HTML::style('backend/css/font-awesome.css?'. time()) }}
    {{ HTML::style('backend/css/custom.css?'. time()) }}

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    -->
  </head>

<body>

<div class="container">
  <div class="row">
    <div class="span4 offset4 well">
      <legend>Please Login</legend>
        @if (Session::get('message-content') != '')
        <div class="row-fluid">
          <div class="span12">
            <div class="alert@if (Session::get('message-type') != '')
              alert-{{ Session::get('message-type') }}
            @endif">
            {{ Session::get('message-content') }}
            </div>
          </div>
        </div>
        @endif

        {{ Form::open() }}
          {{ Form::text('email', '', array('autofocus' => 'autofocus', 'autocomplete' => 'off', 'class' => 'span4', 'placeholder' => 'Email')) }}
          {{ Form::password('password', array('class' => 'span4', 'placeholder' => 'Password')) }}
          {{ Form::button('Login', array('class' => 'btn btn-info btn-block')) }}
        {{ Form::close() }}
    </div>
  </div>
</div>


  <!-- Le javascript
  ================================================== -->
  {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
  {{ HTML::script('admin/javascript/bootstrap.js') }}
  </body>
</html>
