<?php

class User_Controller extends Base_Controller {

  //Set this controller as restful
  public $restful = true;

  //The number of users to display per page
  public $perPage = 15;

  //Setup our validation rules
  private $rules = array(
    'id' => 'numeric',
  );
/*
  //List blog posts for the public
  public function get_list() {
    //Grab all of the users which are set as 'viewable'
    $posts = Post::where_status('1')->paginate($this->perPage);

    //If we find some posts
    if(!is_null($posts)) {
      //Create a data array
      $data = array(
        'pageTitle' => 'title',
        'pageDescription' => 'description',
        'posts' => $posts,
      );

      //Build the view
      return View::make('public.post.list', $data);
    }
    //No posts found
    else {
      return 'todo :: Add message here to say no post posts in the system';
    }
  }

  //Display a post to the user
  public function get_view($slug) {
    //Search for a post matching the slug, where status = 1
    $post = Post::where_slug($slug)->where_status('1')->first();

    //If we find results
    if(!is_null($post)) {
      //Create a data array
      $data = array(
        'pageTitle' => $post->title,
        'pageDescription' => $post->description,
        'pageContent' => $post->content,
      );

      //Build the view
      return View::make('public.post.view', $data);
    }
    //No post found
    else {
      //404
      return Response::error('404');
    }
  }
*/
  //Display a list of users to the admin
  public function get_admin_list() {
    //Grab all users posts
    $users = User::paginate($this->perPage);

    //Create a data array
    $data = array(
      'section' => 'user',
      'pageTitle' => 'Blog User List',
      'users' => $users,
    );

    //Build the view
    return View::make('admin.user.list', $data);
  }

  //Display an edit page for the  user to the admin
  public function get_admin_edit($slug) {
    //Search for a user matching the slug
    $user = User::where_slug($slug)->first();

    /** TODO Grab Groups?
    //Grab the categories
    $categories = array();
    foreach (Category::get() as $category) {
      $categories[$category->id] = $category->title;
    }
    */

    //If we find results
    if(!is_null($user)) {
      //Set up data to be passed to the view
      $data = array(
        'section' => 'user',
        'pageTitle' => 'Edit User: '. $user->username,
        'user' => $user,
      );

      //Build the view
      return View::make('admin.user.form', $data);
    }
    //No blog post found
    else {
      //404
      return Response::error('404');
    }
  }
/*
  //Display a list of posts to the admin
  public function post_admin_edit($slug) {
    //Grab the input from the form
    $formInput = Input::get();

    //Search for a post matching the slug
    $post = Post::where_slug($slug)->first();

    //If we find results
    if(!is_null($post)) {
      //Call the Validator
      $validation = Validator::make($formInput, $this->rules);

      //If the input passes validation
      if ($validation->passes()) {
        //Set up the basic fields
        $post->category_id = $formInput['category'];
        $post->reference = $formInput['reference'];
        $post->title = $formInput['title'];
        $post->description = $formInput['description'];
        $post->content = $formInput['content'];
        $post->status = $formInput['status'];

        //If we have a slug use it
        if (isset($formInput['slug']) && $formInput['slug'] != '') {
          $post->slug = Str::slug($formInput['slug']);
        }
        //No slug provided, use the title
        else {
          $post->slug = Str::slug($formInput['title']);
        }

        //Save the post to the database
        $post->save();

        //Return them to the list page
        return Redirect::to_route('admin_post_list')
          ->with('message-type', 'success')
          ->with('message-content', 'Successfully updated '. $post->reference .'!')
        ;
      }
      //Input fails the validation
      else {
        //Return them to the validation
        return Redirect::to_route('admin_post_edit', array($post->slug))
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

  //Display the add post form
  public function get_admin_add() {
    //Grab the categories
    $categories = array();
    foreach (Category::get() as $category) {
      $categories[$category->id] = $category->title;
    }
    //Create a data array
    $data = array(
      'section' => 'post',
      'pageTitle' => 'Add Blog Post',
      'categories' => $categories,
    );

    //Build the view
    return View::make('admin.post.form', $data);
  }

  //Attempt to add the post
  public function post_admin_add() {
    //Grab the input from the form
    $formInput = Input::get();

    //Call the Validator
    $validation = Validator::make($formInput, $this->rules);

    //If the input passes validation
    if ($validation->passes()) {
      //Create a new Post
      $post = new Post;

      //Set up the basic fields
      $post->author_id = Auth::user()->id;
      $post->category_id = $formInput['category'];
      $post->reference = $formInput['reference'];
      $post->title = $formInput['title'];
      $post->description = $formInput['description'];
      $post->content = $formInput['content'];
      $post->status = $formInput['status'];

      //If we have a slug use it
      if (isset($formInput['slug']) && $formInput['slug'] != '') {
        $post->slug = Str::slug($formInput['slug']);
      }
      //No slug provided, use the title
      else {
        $post->slug = Str::slug($formInput['title']);
      }

      //Save the post to the database
      $post->save();

      //Return them to the list page
      return Redirect::to_route('admin_post_list')
        ->with('message-type', 'success')
        ->with('message-content', 'Successfully Added '. $post->reference .'!')
      ;
    }
    //Input fails the validation
    else {
      //Return them to the validation
      return Redirect::to_route('admin_post_add')
        ->with_errors($validation->errors)
        ->with_input()
      ;
    }
  }

  //Display the delete post form
  public function get_admin_delete($slug) {
    //Search for a post matching the slug
    $post = Post::where_slug($slug)->first();

    //Create a data array
    $data = array(
      'section' => 'post',
      'pageTitle' => 'Delete Blog Post: '. $post->reference,
      'post' => $post,
    );

    //Build the view
    return View::make('admin.post.delete', $data);
  }

  //Delete the post
  public function post_admin_delete($slug) {
    //Try and delete the post
    $post = Post::where_slug($slug)->delete();

    //Page deleted
    if ($post == '1') {
      //Return them to the list post
      return Redirect::to_route('admin_post_list')
        ->with('message-type', 'success')
        ->with('message-content', 'Successfully deleted Blog Post!')
      ;
    }
    //Error deleting post
    else {
      //Return them to the list post
      return Redirect::to_route('admin_post_list')
        ->with('message-type', 'error')
        ->with('message-content', 'Unable to delete Blog Post!')
      ;
    }
  }
*/
}