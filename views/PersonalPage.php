<?php namespace views;

class PersonalPage extends Base
{
	protected array $pages = array();

	public function generate(array $data = array()) : void {
		$this->css = 'personal_page';
		$this->content_view = 'personal_page';
		$this->folder = "views/content/personal_pages/{$data['id']}";
		
		parent::generate();
	}
}