<?php

class Page_Controller extends Base_Controller {

  public $restful = true;

  //The number of pages to display per page
  public $perPage = 5;

  //Setup our validation rules
  private $rules = array(
    'id' => 'numeric',
    'reference'  => 'required|match:/^[a-zA-Z0-9 \/&-\(\)]+$/|between:5,70',
    'title'  => 'required|match:/^[a-zA-Z0-9 \/&-\(\)]+$/|between:5,70',
    'description' => 'required|between:5,170',
    'content' => 'required|min:20',
    'status' => 'in:1,0',
  );

  //Display a page to the user
	public function get_view($slug) {
    //Search for a page matching the slug, where status = 1
    $page = Page::where_slug($slug)->where_status('1')->first();

    //If we find results
    if(!is_null($page)) {
      //Create a data array
      $data = array(
        'pageTitle' => $page->title,
        'pageDescription' => $page->description,
        'pageContent' => $page->content,
      );

      //Build the view
  		return View::make('public.page.view', $data);
    }

    //No page found
    else {
      //404
      return Response::error('404');
    }
	}

  //Display a list of pages to the admin
  public function get_admin_list() {
    //Grab all blog posts
    $pages = Page::paginate($this->perPage);

    //Create a data array
    $data = array(
      'section' => 'page',
      'pageTitle' => 'Page List',
      'pages' => $pages,
    );

    //Build the view
    return View::make('admin.page.list', $data);
  }

  //Display an edit page for the page to the admin
  public function get_admin_edit($slug) {
    //Search for a page matching the slug
    $page = Page::where_slug($slug)->first();

    //If we find results
    if(!is_null($page)) {
      //Set up data to be passed to the view
      $data = array(
        'section' => 'page',
        'pageTitle' => 'Edit Page: '. $page->reference,
        'page' => $page,
      );

      //Build the view
      return View::make('admin.page.form', $data);
    }
    //No blog post found
    else {
      //404
      return Response::error('404');
    }
  }

  //Display a list of pages to the admin
  public function post_admin_edit($slug) {
    //Grab the input from the form
    $formInput = Input::get();

    //Search for a page matching the slug
    $page = Page::where_slug($slug)->first();

    //If we find results
    if(!is_null($page)) {
      //Call the Validator
      $validation = Validator::make($formInput, $this->rules);

      //If the input passes validation
      if ($validation->passes()) {
        //Set up the basic fields
        $page->reference = $formInput['reference'];
        $page->title = $formInput['title'];
        $page->description = $formInput['description'];
        $page->content = $formInput['content'];
        $page->status = $formInput['status'];

        //If we have a slug use it
        if (isset($formInput['slug']) && $formInput['slug'] != '') {
          $page->slug = Str::slug($formInput['slug']);
        }
        //No slug provided, use the title
        else {
          $page->slug = Str::slug($formInput['title']);
        }

        //Save the page to the database
        $page->save();

        //Return them to the list page
        return Redirect::to_route('admin_page_list')
          ->with('message-type', 'success')
          ->with('message-content', 'Successfully updated '. $page->reference .'!')
        ;
      }
      //Input fails the validation
      else {
        //Return them to the validation
        return Redirect::to_route('admin_page_edit', array($page->slug))
          ->with_errors($validation->errors)
          ->with_input()
        ;
      }
    }
    //No blog post found
    else {
      //404
      return Response::error('404');
    }
  }

  //Display the add page form
  public function get_admin_add() {
    //Create a data array
    $data = array(
      'section' => 'page',
      'pageTitle' => 'Add Page',
    );

    //Build the view
    return View::make('admin.page.form', $data);
  }

  //Attempt to add the page
  public function post_admin_add() {
    //Grab the input from the form
    $formInput = Input::get();

    //Call the Validator
    $validation = Validator::make($formInput, $this->rules);

    //If the input passes validation
    if ($validation->passes()) {
      //Create a new page
      $page = new Page;

      //Set up the basic fields
      $page->reference = $formInput['reference'];
      $page->title = $formInput['title'];
      $page->description = $formInput['description'];
      $page->content = $formInput['content'];
      $page->status = $formInput['status'];

      //If we have a slug use it
      if (isset($formInput['slug']) && $formInput['slug'] != '') {
        $page->slug = Str::slug($formInput['slug']);
      }
      //No slug provided, use the title
      else {
        $page->slug = Str::slug($formInput['title']);
      }

      //Save the page to the database
      $page->save();

      //Return them to the list page
      return Redirect::to_route('admin_page_list')
        ->with('message-type', 'success')
        ->with('message-content', 'Successfully Added '. $page->reference .'!')
      ;
    }
    //Input fails the validation
    else {
      //Return them to the validation
      return Redirect::to_route('admin_page_add')
        ->with_errors($validation->errors)
        ->with_input()
      ;
    }
  }

  //Display the delete page form
  public function get_admin_delete($slug) {
    //Search for a page matching the slug
    $page = Page::where_slug($slug)->first();

    //Create a data array
    $data = array(
      'section' => 'page',
      'pageTitle' => 'Delete Page: '. $page->reference,
      'page' => $page,
    );

    //Build the view
    return View::make('admin.page.delete', $data);
  }

  //Delete the page
  public function post_admin_delete($slug) {
    //Try and delete the page
    $page = Page::where_slug($slug)->delete();

    //Page deleted
    if ($page == '1') {
      //Return them to the list page
      return Redirect::to_route('admin_page_list')
        ->with('message-type', 'success')
        ->with('message-content', 'Successfully deleted Page!')
      ;
    }
    //Error deleting page
    else {
      //Return them to the list page
      return Redirect::to_route('admin_page_list')
        ->with('message-type', 'error')
        ->with('message-content', 'Unable to delete Page!')
      ;
    }
  }
}