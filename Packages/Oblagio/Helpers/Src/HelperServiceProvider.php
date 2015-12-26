<?php namespace Oblagio\Helpers;

use Illuminate\Support\ServiceProvider;

use Oblagio\Helpers\Helper;

class HelperServiceProvider extends ServiceProvider

{

	public function register()

	{

		return $this->app->bind('register-helper' ,  function(){

			return new Helper;

		});

	}

}