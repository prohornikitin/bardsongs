<?php namespace controllers;

class AnnualEvents implements IBase
{
	public function index() : void {
		$page = $this->getPage();
		if($this->pageExists($page)) {
			$data = array('page' => $page);
			$view = new \views\AnnualEvents();
			$view->generate($data);
		} else {
			header('Location: /Error.php?code=404');
		}
	}

	private function getPage() : string {
		if(isset($_GET['page'])) {
			return $_GET['page'];
		}
		header('Location: /Error.php?code=404');
	}

	private function pageExists($page) : bool {
		return file_exists("views/content/annual_events/{$page}");
	}
}