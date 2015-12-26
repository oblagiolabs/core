<?php namespace Oblagio\Helpers;

use Illuminate\Support\Facades\Facade;

class HelperFacade extends Facade

{

	public static function getFacadeAccessor()

	{

		return 'register-helper';

	}

}