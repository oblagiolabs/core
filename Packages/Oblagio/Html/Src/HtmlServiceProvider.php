<?php namespace Oblagio\Html;

use Illuminate\Support\ServiceProvider;

use Oblagio\Html\Html;

class HtmlServiceProvider extends ServiceProvider

{

	public function register()

	{

		return $this->app->bind('register-html' ,  function(){

			return new Helper;

		});

	}

}