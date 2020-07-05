<?php namespace controllers;

class ControlPanel implements IBase
{
	private \models\PersonalPages $pages;
	private \views\ControlPanel $view;

	public function __construct() {
		$this->pages = new \models\PersonalPages();
		$this->view = \views\ControlPanel();
	}

	public function index() : void {
		if($this->isLoggedIn()) {
			$data = array(
				'pages_to_edit' => ($this->pages)->getPagesByEditorEmail($_SESSION['email']),
				'is_admin' => ($_SESSION['email'] == ADMIN_EMAIL),
			);
			$this->view->generate($data);
		} else {
			$this->tryToSignIn();
		}
	}

	public function editPage() {
		if($this->isLoggedIn()) {
			echo 'SUCCESS';
		} else {
			$this->tryToSignIn();
		}
	}

	private function isLoggedIn() : bool {
		session_start();
		if(isset($_SESSION['logged_in'])) {
			return $_SESSION['logged_in'];
		}
		return false;
	}

	private function tryToSignIn() {
		header('Location:' . 
				'/Auth.php?' .
				'action=signIn&' .
				'callback=ControlPanel.php');
	}
}