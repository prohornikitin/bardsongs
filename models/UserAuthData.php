<?php namespace models;

class UserAuthData
{
	private \PDO $db;
	private array $requests;

	private string $email = '';
	private string $password = '';

	public function __construct() {
		$this->db = \Db::getInstance();
	}

	public function fill($email, $password) : void {
		$this->email = $email;
		$this->password = $password;
	}

	public function isValid() : bool {
		$request = $this->db->prepare('SELECT password FROM `users` WHERE email=?');
		$result = $request->execute(array($this->email));
		if($result) {
			return ($request->fetchColumn() === $this->password);
		}
		return false;
	}

	public function isEmailFree() : bool {
		$request = $this->db->prepare('SELECT COUNT(*) FROM `users` WHERE email=?');
		$result = $request->execute(array($this->email));
		if($result) {
			return ($request->fetchColumn() === '0');
		}
		return false;
	}

	public function signUp() : void{
		$request = $this->db->prepare('INSERT INTO `users` 
								(email, password, display_name)
			 					VALUES (:email, :password, :email)');
		$result = $request->execute(array(
			'email' => $this->email,
			'password' => $this->password,
		));
	}
}