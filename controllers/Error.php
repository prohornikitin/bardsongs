<?php namespace controllers;

class Error implements IBase
{
	public function index() : void {
		$view = new \views\Error();
		$view->generate(array( 'code' => $this->getCode() ));
	}

	private function getCode() : string {
		if(isset($_GET['code'])) {
			return $_GET['code'];
		}
		return '404';
	}
}