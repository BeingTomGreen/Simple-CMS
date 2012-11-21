<?php

class Post extends Eloquent {

	public function author() {
		return $this->belongs_to('User', 'author_id');
	}

	public function category() {
		return $this->belongs_to('Category', 'category_id');
	}
}