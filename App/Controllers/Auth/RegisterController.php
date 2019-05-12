<?php

namespace App\Controllers\Auth;

use App\Core\Controller;

class RegisterController extends Controller {
	public function index () {
		echo 'Register';
		dd($this->route);
	}
}