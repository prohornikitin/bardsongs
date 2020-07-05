<?php namespace views;

class AnnualEvents extends Base
{
	private array $news = array();

	public function generate(array $data = array()) : void
	{
		$this->content_view = "annual_events/{$data['page']}";
		//$this->css = 'annual_events';
		
		parent::generate();
	}

	
}