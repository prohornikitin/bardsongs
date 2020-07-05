<?php namespace models;

class PersonalPage
{
	public int $id;
	public string $label;
	public ?string $editor_email;

	public function __get(string $name) {
		if ($name == 'url') {
			return "PersonalPages.php?action=showPageById&id={$this->id}";
		}

		if ($name == 'photo_url') {
			return glob("views/content/personal_pages/{$this->id}/photo.*")[0];
		}
	}
}

