<?php namespace Oblagio\Helpers;

use Illuminate\Support\ServiceProvider;

use Oblagio\Helpers\Helper;

class HelperServiceProvider extends ServiceProvider

{

	public function register()

	{

		$this->mergeConfigFrom(__DIR__.'/../../OblagioSetting.php','config');

		return $this->app->bind('register-helper' ,  function(){

			return new Helper;

		});

	}

}