<?php namespace Oblagio\Html;

use Illuminate\Support\Facades\Facade;

class HtmlFacade extends Facade

{

	public static function getFacadeAccessor()

	{

		return 'register-html';

	}

}