<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\NovaTranslatable\Translatable;
use Whitecube\NovaFlexibleContent\Flexible;
use Inspheric\Fields\Url;

class Page extends Resource {
	/**
	 * The model the resource corresponds to.
	 *
	 * @var string
	 */
	public static $model = \App\Page::class;

	/**
	 * The single value that should be used to represent the resource when being displayed.
	 *
	 * @var string
	 */
	public static $title = 'id';

	/**
	 * The columns that should be searched.
	 *
	 * @var array
	 */
	public static $search = [
		'id',
	];

	/**
	 * Get the fields displayed by the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function fields( Request $request ) {
		return [
			ID::make()->sortable(),
			Translatable::make( [
				Text::make( 'Title' ),
				Trix::make( 'Description' ),
			] ),
			Text::make('Slug')->readonly(),
			Url::make('URL', function () {
				return env('APP_URL') . ':8000/page/' . $this->slug;
			})->alwaysClickable($this->slug ? true : false),
			Boolean::make('Sidebar'),
			Boolean::make('Top Advertisement'),
			Flexible::make('Content')
            ->addLayout('Content with Icons', 'content1', [
				Image::make('Icon')->disk('public'),
                Text::make('Title'),
                Markdown::make('Content')
            ])
            ->addLayout('Simple Content', 'content2', [
                Text::make('Title'),
                Markdown::make('Content')
            ])
		];
	}

	/**
	 * Get the cards available for the request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function cards( Request $request ) {
		return [];
	}

	/**
	 * Get the filters available for the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function filters( Request $request ) {
		return [];
	}

	/**
	 * Get the lenses available for the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function lenses( Request $request ) {
		return [];
	}

	/**
	 * Get the actions available for the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function actions( Request $request ) {
		return [];
	}
}
