<?php

ini_set('display_errors', 1);
error_log(E_ALL);

function dd ($var) {
	echo '<pre style="background: #344; color: #ffc; padding: 1rem; font-family: consolas">';
	var_dump($var);
	echo '</pre>';
	die();
}
