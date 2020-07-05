<?php namespace controllers;

class Auth
{
	private \models\UserAuthData $auth_data;
    private \views\Auth $view;

	public function __construct() {
		$this->auth_data = new \models\UserAuthData();
		$this->view = new \views\Auth();
	}

	public function index() : void {
		$this->view->generate(array(
			'callback' => $_GET['callback']
		));
	}

	public function signIn() : void {
		$this->fillAuthData();
		$_SESSION['logged_in'] = $this->auth_data->isValid();
		if($_SESSION['logged_in']) {
			$this->callback();
		} else {
			$this->view->generate(array(
				'error_msg' => 'Неверный логин или пароль',
				'callback' => $_GET['callback'],
			));
		}
	}

	public function signUp() : void {
		$this->fillAuthData();
		if($this->auth_data->isEmailFree()) {
			$this->auth_data->signUp();
			$this->view->generate(array(
				'success_msg' => 'Поздравляю, вы зарегистрированы!',
				'callback' => $_GET['callback']
			));
		} else {
			$this->view->generate(array(
				'error_msg' => 'Извините, этот email уже зарегестрирован.',
				'callback' => $_GET['callback'],
			));
		}
	}

	private function fillAuthData() : void {
		session_start();
		if(isset($_POST['email']) AND isset($_POST['password'])) {
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
		}
		if(isset($_SESSION['email']) AND isset($_SESSION['password'])) {
			$this->auth_data->fill($_SESSION['email'], $_SESSION['password']);
		}
	}

	private function callback() : void {
		if(isset($_GET['callback'])) {
			header("Location: /{$_GET['callback']}");
		} else {
			header("Location: /Main.php");
		}
	}
}