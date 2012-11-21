<?php

class Build_Post_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->increments('id');
			$table->integer('author_id')->references('id')->on('users');
			$table->integer('category_id')->references('id')->on('category');
			$table->string('reference', 125);
			$table->string('title', 255)->unique();
			$table->text('description');
			$table->string('slug', 255)->unique();
			$table->text('content');
			$table->boolean('status')->default(0);
			$table->timestamps();
		});

		DB::table('posts')->insert(array(
			'author_id'  => '1',
			'category_id' => '1',
			'reference' => 'A Sample Blog Post Reference',
			'title' => 'A Sample Blog Post Title',
			'description' => 'Sample Blog Post Description',
			'slug' => 'a-sample-blog-post',
			'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum odio felis, scelerisque sit amet ullamcorper quis, ultricies id felis. In blandit ornare tempus. Phasellus id velit est, rutrum consectetur mauris. Nullam in nibh lectus. In dapibus lectus sit amet augue fringilla at dapibus velit feugiat. Ut non sagittis est. Duis ac mauris quis ipsum tincidunt tempus non eget ante. Aenean malesuada eros sit amet metus condimentum in euismod metus vehicula. Vestibulum ultrices, magna sit amet egestas aliquam, erat tortor vulputate elit, ac convallis risus ligula a nisi. Curabitur orci dui, molestie in fermentum at, tempus sit amet est. Nulla facilisi. In eget nisl augue, quis ullamcorper enim. Mauris mollis nisi a sapien vulputate eu fringilla velit consequat.</p>',
			'status' => '1',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}