<?php namespace views;

class Error extends Base
{
	protected string $img_src;
	protected string $text;

	public function generate(array $data = array()) : void {
		$code = $data['code'];
		if ($code == '404') {
			$this->pageNotFound();
		} else if ($code[0] == '5') { //code 5xx
			$this->serverError();
		} else if ($code == '1000') {
			$this->pageInDevelopment();
		} else {
			$this->pageNotFound();
		}

		$this->css = 'error';
		$this->content_view = 'error';
		
		parent::generate();
	}

	protected function pageNotFound() : void {
		
		$this->img_src = "/images/404.png";
		$this->text = 'Я не смог найти эту страницу.<br>
						<br>
						Возможно она была перемещена.<br>
						Обычно об этом пишут на
						<a href="Main.php">Главной</a>.<br>
						<br>
						Там можно найти свежие новости и анонсы мероприятий.';
		
	}

	protected function serverError() : void {
		$this->img_src = '/images/50x.png';
		$this->text = 'На нашей стороне произошел сбой.<br>
				Не беспокойтесь, мы скоро все починим.<br>
				<br>
				Если хотите помочь, свяжитесь с нами и расскажите как вы попали на эту страницу.<br>';
	}

	protected function pageInDevelopment() : void {
		$this->img_src = '/images/50x.png';
		$this->text = 'Страница находиться в разработке. Приходите позже!';
	}
}