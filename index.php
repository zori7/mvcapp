<?php

require 'App/Helpers/dev.php';

use App\Core\Router;

spl_autoload_register (function ($class) {
	$path = str_replace('\\', '/', $class.'.php');
	if (file_exists($path)) {
		require_once $path;
	}
});

session_start();

$router = new Router;

$router->run();
