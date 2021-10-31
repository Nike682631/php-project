<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		//
		\Form::component( 'ewInput', 'components.forms.ew-input',
			[
				'label',
				'name',
				'value' => null,
				'attributes' => [''],
				'type' => 'text'
			]
		);
	}
}
