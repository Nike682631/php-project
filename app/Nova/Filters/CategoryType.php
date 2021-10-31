<?php

namespace App\Nova\Filters;

use App\Category;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class CategoryType extends Filter {
	/**
	 * The filter's component.
	 *
	 * @var string
	 */
	public $component = 'select-filter';

	/**
	 * Apply the filter to the given query.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Illuminate\Database\Eloquent\Builder $query
	 * @param  mixed $value
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function apply( Request $request, $query, $value ) {
		if(isset($value)) {
			if ( $value == 'parent' ) {
				return $query->whereNull( 'parent_category_id' );

			} else {
				return $query->whereNotNull( 'id');

			}
		} else {
			return $query->whereNotNull( 'id');
		}
	}

	public function default() {
		return Category::where( 'id', '>', 5000 )->get();
	}

	/**
	 * Get the filter's available options.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function options( Request $request ) {
		return [
			'Parent categories' => 'parent',
			'All categories' => 'all',
		];
	}
}
