<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use Saumini\Count\RelationshipCount;
use Spatie\NovaTranslatable\Translatable;

class Category extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Category::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
			Translatable::make( [
				Text::make('Name')
			]),
			Text::make('importance')->default(1)->hideFromIndex(),
			Select::make('type')->options([
				'1' => 'Service',
				'0' => 'Product',
			])->required()->hideFromIndex(),

            Image::make('Cover Photo', 'cover_photo')->disk('public')->path('categories/cover'),
            Image::make('Icon Url', 'icon_url')->disk('public')->path('categories/icon'),

			HasMany::make('Child categories', 'childCategories', 'App\Nova\Category'),
			BelongsTo::make('Parent Category', 'parent', 'App\Nova\Category')->sortable()->nullable(),
			RelationshipCount::make('Child categories Count', 'childCategories'),


//			BelongsTo::make('Parent', 'parent', 'App\Nova\Category'),


		];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
        	new Filters\CategoryType()
		];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
