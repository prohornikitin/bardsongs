<?php namespace views;

class History extends Base
{
	public function generate(array $data = array()) : void {
		$this->content_view = 'history';
		$this->css = 'history';
		$this->nav_button_id = 'history';
		
		parent::generate();
	}
}