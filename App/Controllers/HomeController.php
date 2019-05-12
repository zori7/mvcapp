<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller {

	public function index () {
		echo 'Home page';
		dd($this->route);
	}
}
