<?php

spl_autoload_register(function ($className) {
	$path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	$path = SITE_ROOT . DIRECTORY_SEPARATOR . $path . '.php';
	require ($path);
});