<?php

namespace App\Services\AmoCRM\Exceptions;

use Exception;

class MissingAccessTokenException extends Exception
{
	public function report()
	{
		return false;
	}

	public function render()
	{
		return 'Missing Access Token';
	}
}
