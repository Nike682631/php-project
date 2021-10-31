<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Notification;
use App\Notifications\MessageNotification;
use App\Observers\MessageObserver;
use App\View\Components\Feed\Components\ActivityCard;
use App\View\Components\Feed\Cards\ProductCard;
use App\View\Components\Feed\Cards\PostCard;

use Log;
use Nahid\Talk\Facades\Talk;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		\Spatie\NovaTranslatable\Translatable::defaultLocales(['en', 'ru', 'lt', 'ua']);
        \Nahid\Talk\Messages\Message::creating(function($model) {
            $receiver = Talk::getConversationsById($model->conversation_id)->withUser;
            $receiver->notify(new MessageNotification($receiver));
        });

		Blade::directive('subscribed', function () {

			$condition = 'false';

			// check if the user is authenticated
			if (Auth::check()) {
				// check if the user has a subscription
				$condition = Auth::user()->id;
			}

			return "<?php if ($condition) { ?>";
		});

		Blade::directive('unsubscribed', function () {
			return "<?php } else { ?>";
		});

		Blade::directive('endsubscribed', function () {
			return "<?php } ?>";
		});

        Blade::component('activity-card', ActivityCard::class);
        Blade::component('product-card', ProductCard::class);
        Blade::component('post-card', PostCard::class);


	}
}
