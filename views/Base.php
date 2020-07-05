<?php namespace views;

class Base
{
	protected string $view = 'content/error';
	protected ?string $css = null;
	protected ?string $nav_button_id = null;
	protected string $label = 'Клуб самодеятельной песни МИФИ';
	protected string $title = 'КСП МИФИ';
	

	public function generate(array $data = array()) : void {
		require 'views/content/base_template.php';
	}
}