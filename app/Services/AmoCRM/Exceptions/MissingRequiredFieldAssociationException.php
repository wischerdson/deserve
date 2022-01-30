<?php

namespace App\Services\AmoCRM\Exceptions;

use Exception;

class MissingRequiredFieldAssociationException extends Exception
{
	private string $fieldType;

	public function __construct(string $fieldType)
	{
		$this->fieldType = $fieldType;
	}

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
		return "Missing required field association ($this->fieldType)";
	}
}
