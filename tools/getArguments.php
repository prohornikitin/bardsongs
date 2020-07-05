<?php namespace tools;

function getArguments() : ?array {
	if(isset($_GET['args']) AND !empty($_GET['args'])) {
		$args = json_decode($_GET['args'], true);
		if(is_array($args)) {
			return $args;
		}
	}
	return null;
}