<?php

class Build_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username', 80)->unique();
			$table->string('slug', 255)->unique();
			$table->string('email', 125)->unique();
			$table->text('bio');
			$table->string('password', 60);
			$table->boolean('activated')->default(0);
			$table->date('last_login');
			$table->timestamps();
		});

		DB::table('users')->insert(array(
			'username' => 'admin',
			'slug' => 'admin',
			'email' => 'email@example.com',
			'bio' => 'The Boss!',
			'password' => Hash::make('password'),
			'activated' => '1',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}