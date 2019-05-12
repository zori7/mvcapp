<?php

namespace App\Core;

class Router {

	protected $routes = [];
	protected $param = null;
	
	function __construct() {
		$routes = require 'routes/web.php';
		foreach ($routes as $key => $val) {
			$this->add(trim($key, '/'), $val);
		}
	}

	public function add ($route, $param) {
		$route = '#^' . $route . '$#';
		$this->routes[$route] = $param;
	}

	public function matches () {
		$uri = $_SERVER['REQUEST_URI'];
		$uri = preg_replace('#\?.*#', '', $uri);
		$uri = trim($uri, '/');
		foreach ($this->routes as $route => $param) {
			if (preg_match($route, $uri, $matches)) {
				$this->param = $param;
				return true;
			}
		}
		return false;
	}

	public function run () {
		if ($this->matches()) {
			$params = explode('@', $this->param);
			$controllerPath = 'App\Controllers\\' . $params[0];
			$action = $params[1];
			if (class_exists($controllerPath)) {
				if (method_exists($controllerPath, $action)) {
					$controller = new $controllerPath($this->param);
					$controller->$action();
				} else {
					echo 'Method ' . $action . ' does not exist';
				}
			} else {
				echo 'Class ' . $controllerPath . ' not found';
			}
		} else {
			echo 'Not found';
		}
	}
}
