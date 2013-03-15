<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $pageTitle }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    {{ HTML::style('backend/css/bootstrap.css?'. time()) }}
    {{ HTML::style('backend/css/bootstrap-responsive.css?'. time()) }}
    {{ HTML::style('backend/css/font-awesome.css?'. time()) }}
    {{ HTML::style('backend/css/custom.css?'. time()) }}

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
          <a class="brand" href="{{ URL::to_route('admin_dashboard') }}">Admin Dashboard</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="dropdown @if ($section == 'page') active @endif">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Page System <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::to_route('admin_page_list') }}">Manage Pages</a></li>
                  <li><a href="{{ URL::to_route('admin_page_add') }}">Add Page</a></li>
                </ul>
              </li>
              <li class="dropdown @if ($section == 'post') active @endif">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Blog System <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::to_route('admin_post_list') }}">Manage Blog Posts</a></li>
                  <li><a href="{{ URL::to_route('admin_post_add') }}">Add Blog Post</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Blog Categories</li>
                  <li><a href="{{ URL::to_route('admin_category_list') }}">Manage Blog Categories</a></li>
                  <li><a href="{{ URL::to_route('admin_category_add') }}">Add Blog Category</a></li>
                </ul>
              </li>
              <li class="dropdown @if ($section == 'user') active @endif">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">User System <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::to_route('admin_user_list') }}">Manage Users</a></li>
                  <li><a href="{{ URL::to_route('admin_user_add') }}">Add User</a></li>
                </ul>
              </li>
            </ul>

            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="http://static.googleusercontent.com/external_content/untrusted_dlcp/www.google.com/en//webmasters/docs/search-engine-optimization-starter-guide.pdf">Google's SEO Starter Guide</a></li>
                </ul>
              </li>
              <li class="divider-vertical"></li>
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">{{ ucwords(Auth::user()->username) }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Modify Account</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ URL::to_route('logout') }}">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <h2>{{ $pageTitle }}</h2>
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

          <div class="row-fluid">
            <div class="span12">
            @section('content')
            @yield_section
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>

    <!-- Le javascript
    ================================================== -->
    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
    {{ HTML::script('backend/js/bootstrap.js') }}
  </body>
</html>