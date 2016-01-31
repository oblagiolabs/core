<?php namespace Oblagio\Html;

use Illuminate\Support\ServiceProvider;

use Oblagio\Html\Html;

class HtmlServiceProvider extends ServiceProvider

{

	public function boot()

	{

	}

	public function register()

	{

		$this->mergeConfigFrom(__DIR__.'/../../OblagioSetting.php' , 'config');

		return $this->app->bind('register-html' ,  function(){

			return new Helper;

		});

	}

}