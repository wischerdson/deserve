<?php

namespace App\Services\AmoCRM\Exceptions;

use Exception;

class FormDoesntHavePipelineIdException extends Exception
{
	/**
	 * Report the exception.
	 *
	 * @return bool|null
	 */
	public function report()
	{
		return false;
	}

	/**
	 * Render the exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function render($request)
	{
		return 'Form doesn\'t have amocrm pipeline ID';
	}
}
