<?php

class Admin_Controller extends Base_Controller {

	public function action_dashboard() {

    //Create a data array
    $data = array(
      'section' => 'dashboard',
      'pageTitle' => 'Dashboard',
    );

    //Build the view
    return View::make('admin.dashboard', $data);
	}

}