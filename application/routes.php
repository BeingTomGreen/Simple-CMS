<?php

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
//Set the CMS / root, this could be anything you like
Route::get('/', array(
  'as' => 'cms_home',
  'uses' => 'post@list'
));
Route::get('blog/(:any)', array(
  'as' => 'post_view',
  'uses' => 'post@view'
));
//Ensure that if you visit example.com/blog you are redirected to example.com
Route::get('blog', function() {
  return Redirect::home();
});

Route::get('category/(:any)', array(
  'as' => 'category_view',
  'uses' => 'category@view'
));

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('login', array(
	'as' => 'login',
	function() {
		return View::make('admin.login');
	}
));

Route::post('login', array(
	function() {
		//If one of the input fields is empty...
		if (Input::get('email') == '' || Input::get('password') == '') {
			//Return to the login page with a message
			return Redirect::to_route('login')
				->with('message-type', 'info')
				->with('message-content', 'Please fill in both fields!')
			;
		}
		//Else both fields contain values so try and log the user in using the supplied fields
		else {
			//The user is found, and the correct details where supplied, so log the user in
			if (Auth::attempt(array('username' => Input::get('email'), 'password' => Input::get('password')))) {
				return Redirect::to_route('admin_dashboard');
			}
			else {
				//Return to the login page with a message
				return Redirect::to_route('login')
					->with('message-type', 'error')
					->with('message-content', 'Incorrect Details!')
				;
			}
		}
	}
));

Route::get('logout', array(
	'as' => 'logout',
	function() {
		Auth::logout();
		return Redirect::to('login')->with('message', 'Successfully logged out!');
	}
));

Route::get('control', array(
	'before' => 'auth',
  'as' => 'admin_dashboard',
	'uses' => 'admin@dashboard'
));

/** Blog Post(s) Routes **/
Route::get('control/post/list', array(
	'before' => 'auth',
  'as' => 'admin_post_list',
	'uses' => 'post@admin_list'
));
Route::any('control/post/edit/(:any)', array(
	'before' => 'auth',
  'as' => 'admin_post_edit',
	'uses' => 'post@admin_edit'
));
Route::any('control/post/add', array(
	'before' => 'auth',
  'as' => 'admin_post_add',
	'uses' => 'post@admin_add'
));
Route::any('control/post/delete/(:any)', array(
	'before' => 'auth',
  'as' => 'admin_post_delete',
	'uses' => 'post@admin_delete'
));

/** Page(s) Routes **/
Route::get('control/page/list', array(
	'before' => 'auth',
  'as' => 'admin_page_list',
	'uses' => 'page@admin_list'
));
Route::any('control/page/edit/(:any)', array(
	'before' => 'auth',
  'as' => 'admin_page_edit',
	'uses' => 'page@admin_edit'
));
Route::any('control/page/add', array(
	'before' => 'auth',
  'as' => 'admin_page_add',
	'uses' => 'page@admin_add'
));
Route::any('control/page/delete/(:any)', array(
	'before' => 'auth',
	'as' => 'admin_page_delete',
	'uses' => 'page@admin_delete'
));

/** Category(Categories) Routes **/
Route::get('control/category/list', array(
	'before' => 'auth',
	'as' => 'admin_category_list',
	'uses' => 'category@admin_list'
));

Route::any('control/category/edit/(:any)', array(
	'before' => 'auth',
  	'as' => 'admin_category_edit',
	'uses' => 'category@admin_edit'
));
Route::any('control/category/add', array(
	'before' => 'auth',
  'as' => 'admin_category_add',
	'uses' => 'category@admin_add'
));
Route::any('control/category/delete/(:any)', array(
	'before' => 'auth',
  'as' => 'admin_category_delete',
	'uses' => 'category@admin_delete'
));

/*
|--------------------------------------------------------------------------
| Misc Routes
|--------------------------------------------------------------------------
*/
//If not a route we are expecting, funnel to the page controller
Route::get('(:any)', array(
  'as' => 'page_view',
  'uses' => 'page@view'
));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});