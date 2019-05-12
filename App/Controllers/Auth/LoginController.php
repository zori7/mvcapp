<?php

namespace App\Controllers\Auth;

use App\Core\Controller;

class LoginController extends Controller {
	public function index () {
		echo 'Login';
		dd($this->route);
	}
}