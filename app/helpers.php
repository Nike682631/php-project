<?php

use App\Category;
use Illuminate\Support\Facades\Request;

function is_current_category($routeCategory, $loopCategory) {
	$class = '';
	if ( $routeCategory ) {
		if( $routeCategory == $loopCategory) {
			$class = 'expanded';
		}
		$categoryObject = Category::find($loopCategory);

		foreach($categoryObject->childCategories as $cat) {
			if($cat->id == $routeCategory) {
				$class = 'expanded';
			}

			foreach ($cat->childCategories as $cat2) {
				if($cat2->id == $routeCategory) {
					$class = 'expanded';
				}

				foreach ($cat2->childCategories as $cat3) {
					if($cat3->id == $routeCategory) {
						$class = 'expanded';
					}

					foreach ($cat3->childCategories as $cat4) {
						if($cat4->id == $routeCategory) {
							$class = 'expanded';
						}
					}
				}
			}


		}

	}

	return $class;
}

function is_current_category_selected($user, $category, $type) {
	$value = '';
	if($type === 'buy') {
		if($user->buys->contains($category->id)) {
			$value = 'checked';
		}
	} elseif($type == 'sell'){
		if($user->sells->contains($category->id)) {
			$value = 'checked';
		}
	}


	return $value;
}

function is_current_category_active($routeCategory, $loopCategory) {
	$class = '';
	if ( $routeCategory ) {
		if( $routeCategory == $loopCategory) {
			$class = 'active';
		}

	}

	return $class;
}