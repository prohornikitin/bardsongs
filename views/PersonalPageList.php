<?php namespace views;

class PersonalPageList extends Base
{
	protected array $pages = array();

	public function generate(array $data = array()) : void {
		$this->css = 'personal_page_list';
		$this->nav_button_id = 'authors_and_performers';
		$this->content_view = 'personal_page_list';

		$this->pages = $this->formatPages($data['pages']);
		
		parent::generate();
	}

	private function formatPages(array $pages) : array {
		$formatted = array();
		foreach ($pages as $page) {
			array_push($formatted, 
				"<article>
					<img src='{$page->photo_url}'>
					<a href='{$page->url}'>
						<h2>{$page->label}<h2>
					</a>
				</article>"
			);
		}
		return $formatted;
	}
}