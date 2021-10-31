<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasSlug;

	use HasTranslations;

	public $translatable = [ 'title', 'description' ];

	protected $table = 'pages';
	protected $casts = [
        'flexible-content' => FlexibleCast::class
    ];

	public function getFlexibleContentAttribute()
    {
        return $this->flexible('flexible-content');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(30);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
