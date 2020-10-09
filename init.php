<?php
session_start();
spl_autoload_register(function ($className) {
	$path = "class/{$className}.php";
	if (file_exists($path)) {
		require_once $path;
	} else {
		die ("File $path tidak tersedia");
	}
});