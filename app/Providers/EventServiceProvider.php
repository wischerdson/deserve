<?php

namespace App\Providers;

use App\Events\FieldCreated;
use App\Events\FormFilled;
use App\Listeners\CreateAmoCrmLead;
use App\Listeners\SyncFieldsWithAmoCrm;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array<class-string, array<int, class-string>>
	 */
	protected $listen = [
		FormFilled::class => [
			CreateAmoCrmLead::class
		],
		FieldCreated::class => [
			SyncFieldsWithAmoCrm::class
		]
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
