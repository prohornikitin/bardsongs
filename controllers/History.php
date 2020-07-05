<?php namespace controllers;

class History implements IBase
{
	public function index() : void {
		$view = new \views\History();	
		$view->generate();
	}
}