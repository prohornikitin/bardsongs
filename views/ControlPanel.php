<?php namespace views;

class ControlPanel extends Base
{
	

	public function generate(array $data = array()) : void
	{
		if($data['is_admin']) {
			generateAdminSettings();
		}
		$this->content_view = 'control_panel';
		$this->css = 'control_panel';
		
		parent::generate();
	}

	
}