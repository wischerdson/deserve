<?php

namespace App\Console\Commands;

use App\Services\AmoCRM\AmoCrmAuth;
use Illuminate\Console\Command;

class SetAmocrmAccessToken extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'amocrm:token {authorization_code}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Exchanges authorization code to access token and saves last';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$code = $this->argument('authorization_code');

		$amocrmAuth = new AmoCrmAuth();
		$token = $amocrmAuth->exchangeCodeForToken($code);
		$amocrmAuth->saveToken($token);

		$this->info('Token was received');

		return 0;
	}
}
