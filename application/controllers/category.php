<?php

class Category_Controller extends Base_Controller {

  public $restful = true;

  //The number of pages to display per page
  public $perPage = 5;

  //Setup our validation rules
  private $rules = array(
    'id' => 'numeric',
    'title'  => 'required|match:/^[a-zA-Z0-9 \/&-\(\)]+$/|between:2,70',
    'description' => 'required|min:20',
  );

  //Display a page to the user
  public function get_view($slug) {
    //Search for a category matching the slug
    $category = Category::where_slug($slug)->first();

		//Grab all Blog Posts in this category
		$posts = Post::where_status('1')->where_category_id($category->id)->paginate($this->perPage);

    //If we find results
    if(!is_null($category)) {
      //Create a data array
      $data = array(
        'pageTitle' => $category->title,
        'pageDescription' => $category->description,
        'categoryPosts' => $posts,
      );

      //Build the view
      return View::make('public.category.view', $data);
    }

    //No page found
    else {
      //404
      return Response::error('404');
    }
  }

  //Display a list of categories to the admin
  public function get_admin_list() {
    //Grab all blog posts
    $categories = Category::paginate($this->perPage);

    //Create a data array
    $data = array(
      'section' => 'post',
      'pageTitle' => 'Category List',
      'categories' => $categories,
    );

    //Build the view
    return View::make('admin.category.list', $data);
  }

  //Display an edit page for the  category to the admin
  public function get_admin_edit($slug) {
    //Search for a category matching the slug
    $category = Category::where_slug($slug)->first();

    //If we find results
    if(!is_null($category)) {
      //Set up data to be passed to the view
      $data = array(
        'section' => 'post',
        'pageTitle' => 'Edit Category: '. $category->title,
        'category' => $category,
      );

      //Build the view
      return View::make('admin.category.form', $data);
    }
    //No blog category found
    else {
      //404
      return Response::error('404');
    }
  }

  //Updates the category
  public function post_admin_edit($slug) {
    //Grab the input from the form
    $formInput = Input::get();

    //Search for a category matching the slug
    $category = Category::where_slug($slug)->first();

    //If we find results
    if(!is_null($category)) {
      //Call the Validator
      $validation = Validator::make($formInput, $this->rules);

      //If the input passes validation
      if ($validation->passes()) {
        //Set up the basic fields
        $category->id = $formInput['id'];
        $category->title = $formInput['title'];
        $category->description = $formInput['description'];

        //If we have a slug use it
        if (isset($formInput['slug']) && $formInput['slug'] != '') {
          $category->slug = Str::slug($formInput['slug']);
        }
        //No slug provided, use the title
        else {
          $category->slug = Str::slug($formInput['title']);
        }

        //Save the category to the database
        $category->save();

        //Return them to the list page
        return Redirect::to_route('admin_category_list')
          ->with('message-type', 'success')
          ->with('message-content', 'Successfully updated '. $category->title .'!')
        ;
      }
      //Input fails the validation
      else {
        //Return them to the validation
        return Redirect::to_route('admin_category_edit', array($category->slug))
          ->with_errors($validation->errors)
          ->with_input()
        ;
      }
    }
    //No category found
    else {
      //404
      return Response::error('404');
    }
  }

  //Display the add category form
  public function get_admin_add() {
    //Create a data array
    $data = array(
      'section' => 'post',
      'pageTitle' => 'Add Category',
    );

    //Build the view
    return View::make('admin.category.form', $data);
  }

  //Attempt to add the category
  public function post_admin_add() {
    //Grab the input from the form
    $formInput = Input::get();

    //Call the Validator
    $validation = Validator::make($formInput, $this->rules);

    //If the input passes validation
    if ($validation->passes()) {
      //Create a new category
      $category = new Category;

      //Set up the basic fields
      $category->title = $formInput['title'];
      $category->description = $formInput['description'];

      //If we have a slug use it
      if (isset($formInput['slug']) && $formInput['slug'] != '') {
        $category->slug = Str::slug($formInput['slug']);
      }
      //No slug provided, use the title
      else {
        $category->slug = Str::slug($formInput['title']);
      }

      //Save the category to the database
      $category->save();

      //Return them to the list page
      return Redirect::to_route('admin_category_list')
        ->with('message-type', 'success')
        ->with('message-content', 'Successfully Added '. $category->title .'!')
      ;
    }
    //Input fails the validation
    else {
      //Return them to the validation
      return Redirect::to_route('admin_category_add')
        ->with_errors($validation->errors)
        ->with_input()
      ;
    }
  }

  //Display the delete category form
  public function get_admin_delete($slug) {
    //Search for a category matching the slug
    $category = Category::where_slug($slug)->first();

    //Create a data array
    $data = array(
      'section' => 'post',
      'pageTitle' => 'Delete Category: '. $category->title,
      'category' => $category,
    );

    //Build the view
    return View::make('admin.category.delete', $data);
  }

  //Delete the category
  public function post_admin_delete($slug) {
    //Try and delete the category
    $category = Category::where_slug($slug)->delete();

    //Page deleted
    if ($category == '1') {
      //Return them to the list category
      return Redirect::to_route('admin_category_list')
        ->with('message-type', 'success')
        ->with('message-content', 'Successfully deleted Category!')
      ;
    }
    //Error deleting category
    else {
      //Return them to the list category
      return Redirect::to_route('admin_category_list')
        ->with('message-type', 'error')
        ->with('message-content', 'Unable to delete Category!')
      ;
    }
  }

}