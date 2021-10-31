<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Fourstacks\NovaRepeatableFields\Repeater;
use Whitecube\NovaFlexibleContent\Flexible;

class NovaServiceProvider extends NovaApplicationServiceProvider
{

    protected $casts = [
        'logs' => 'array'
    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */ 
    public function boot()
    {
        parent::boot();

        \OptimistDigital\NovaSettings\NovaSettings::addSettingsFields([
            Text::make('URL', 'match_link'),
            Image::make('Cover Photo', 'match_cover_photo')->disk('public')->path('matches/cover'),
        ], [], 'MatchPage');
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
				'eim.kasp@gmail.com',
				'svirskis@gmail.com',
				'dariusba1985@gmail.com',
				'translations@b2bwood.com'
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
          new \PhpJunior\NovaLogViewer\Tool(),
          new \OptimistDigital\NovaSettings\NovaSettings,
          \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \OptimistDigital\NovaSettings\NovaSettings::addSettingsFields([
            Image::make('Top advertisement')
          ]);

        \OptimistDigital\NovaSettings\NovaSettings::addSettingsFields(function() {
        return [ // It has to be in callable because Flexible won't work otherwise...
            Flexible::make('Logos')->addLayout('Logo', 'logo', [
                Image::make('Image')->disk('public'),
                Text::make('URL')
            ])
            ->fullWidth() 
            ->confirmRemove()
        ];
        }, [], 'Logos');
    }
}
