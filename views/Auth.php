<?php namespace views;

class Auth extends Base
{
	protected ?string $success_msg;
    protected ?string $error_msg;
    protected ?string $callback;

	public function generate(array $data = array()) : void {
		$this->content_view = 'auth';
		$this->css = 'auth';
		if(isset($data['error_msg'])) {
			$this->error_msg = $data['error_msg'];
		}
		if(isset($data['success_msg'])) {
			$this->success_msg = $data['success_msg'];
		}
		if(isset($data['callback'])) {
			$this->callback = $data['callback'];
		}
		parent::generate();
	}
}