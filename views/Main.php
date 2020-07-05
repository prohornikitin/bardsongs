<?php namespace views;

class Main extends Base
{
	protected array $news = array();

	public function generate(array $data = array()) : void {
		$this->css = 'main';
		$this->nav_button_id = 'main';
		$this->content_view = 'main';

		$this->news = $this->formatNews($data['news']);

		parent::generate();
	}

	protected function formatNews(array $news) : array {
		$formatted = array();
		foreach ($news as $item) {
			array_push($formatted, 
				"<article>
					<h3 class='news_headers'>{$item->title}</h3>
					<div hidden class=news_body>{$item->body}</div>
					<button class='show_buttons'>Показать</button>
				</article>"
			);
		}
		return $formatted;
	}
}