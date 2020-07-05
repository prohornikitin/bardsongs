<?php namespace tools;

function setJsVariable($name, $data) : void {
	echo  'var ', $name, '=' , json_encode($data), ";\n";
}
	