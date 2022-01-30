<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AmoCrmPublishFields extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'amocrm:publish-fields';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Export all forms fields of application to AmoCrm';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{


		return 0;
	}
}
