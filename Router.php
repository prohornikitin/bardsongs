<?php

class Router
{
	private $registry;
	private $path;
	private $args = array();

	public function __construct() {
		$this->registry = Registry::getInstance();
	}

	public function start() : void {
		$controller = $this->getController();
		$action = $this->getAction();

		if(is_callable(array($controller, $action))) {
			$controller->$action();
		} else {
			error_log("Action {$_GET['action']} not found in {$_GET['route']}", 0);
			$this->error404();
		}
	}

	private function getController() {
		$controller_class = $this->getControllerClass();

		if($controller_class != null) {
			return new $controller_class();
		} else {
			error_log("Page {$_GET['route']} not found.", 0);
			$this->error404();
		}
	}

	private function getControllerClass() : ?string {
		$route = $this->getRoute();
		$route = trim($route, '/\\');
		$route = '/controllers/' . $route;
		$path = SITE_ROOT . str_replace('/', DIRECTORY_SEPARATOR, $route);
		if(file_exists($path)) {
			$class = trim($route, '.php');
			$class = substr($route, 0, strrpos($route, '.php')); //delete '.php'
			$class = str_replace('/', '\\', $class);
			return $class;
		} else {
			return null;
		}
	}

	private function getRoute() : string {
		if(isset($_GET['route']) AND !empty($_GET['route'])) {
			return $_GET['route'];
		}
		return 'Main.php';
	}

	private function getAction() : string {
		if(isset($_GET['action']) AND !empty($_GET['action'])) {
			return $_GET['action'];
		}
		return 'index';
	}


	private function error404() : void {
		header('Location: /Error.php?code=404');
		exit();
	}
}