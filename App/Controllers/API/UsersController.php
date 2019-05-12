<?php

namespace App\Controllers\API;

use App\Core\Controller;

class UsersController extends Controller {
	public function index () {
		return ['s' => true];
	}
}