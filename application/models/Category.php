<?php

class Category extends Eloquent {

		public function posts() {
			return $this->has_many('Post');
		}

}