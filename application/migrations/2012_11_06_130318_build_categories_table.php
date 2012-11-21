<?php

class Build_Categories_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table){
			$table->increments('id');
			$table->string('title', 175)->unique();
			$table->string('slug', 255)->unique();
			$table->text('description');
			$table->timestamps();
		});

		DB::table('categories')->insert(array(
			'title' => 'A Sample Category',
			'slug' => 'a-sample-blog-category',
			'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum odio felis, scelerisque sit amet ullamcorper quis, ultricies id felis. In blandit ornare tempus. Phasellus id velit est, rutrum consectetur mauris. Nullam in nibh lectus. In dapibus lectus sit amet augue fringilla at dapibus velit feugiat. Ut non sagittis est. Duis ac mauris quis ipsum tincidunt tempus non eget ante. Aenean malesuada eros sit amet metus condimentum in euismod metus vehicula. Vestibulum ultrices, magna sit amet egestas aliquam, erat tortor vulputate elit, ac convallis risus ligula a nisi. Curabitur orci dui, molestie in fermentum at, tempus sit amet est. Nulla facilisi. In eget nisl augue, quis ullamcorper enim. Mauris mollis nisi a sapien vulputate eu fringilla velit consequat.</p>',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}