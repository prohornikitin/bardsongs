<?php namespace controllers;

class PersonalPages implements IBase
{
	private \models\PersonalPages $pages;

	public function __construct() {
		$this->pages = new \models\PersonalPages();
	}

	public function index() : void {
		$data = array();
		$data['pages'] = $this->pages->getAll();
		$view = new \views\PersonalPageList();
		$view->generate($data);
	}

	public function showPageById() : void {
		$id = $this->getPageId();
		if($this->pages->isValidPageId($id)) {
			$view = new \views\PersonalPage();
			$view->generate(array('id' => $id));
		} else {
			header('Location: /Error.php?code=404');
		}
	}

	private function getPageId() : ?int {
		if(isset($_GET['id'])) {
			return $_GET['id'];
		}
		return null;
	}
}
