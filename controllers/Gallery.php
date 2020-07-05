<?php namespace controllers;

class Gallery implements IBase
{
	private \models\GallerySource $source;
	private \views\Gallery $view;

	public function __construct() {
		$dir = $this->getDirectory();
		$file = $this->getFile();
		if((file_exists(GALLERY_ROOT . $dir) AND 
		(($file === null) OR 
		file_exists(GALLERY_ROOT . $dir  . $file)))) {
			$this->source = new \models\GallerySource($dir, $file);
			$this->view = new \views\Gallery();
		} else {
			header('Location: /Error.php?code=404');
		}
	}

	public function index() : void {
		$data = $this->source->getData();
		$this->view->generate($data);
	}
	
	private function getDirectory() : string {
		if (isset($_GET['dir'])) {
			return $_GET['dir'];
		}
		return '/';
	}

	private function getFile() : ?string {
		if (isset($_GET['file'])) {
			return $_GET['file'];
		}
		return null;
	}
}
