<?php namespace controllers;

class Main implements IBase
{
	private \models\News $news;
	private $view;

	public function __construct() {
		$this->news = new \models\News();
		$this->view = new \views\Main();
	}

	public function index() : void {
		$data = array(
			'news' => $this->news->getLast(6)
		);
		$this->view->generate($data);
	}
	
}
