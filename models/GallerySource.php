<?php namespace models;

class GallerySource
{
	private string $directory;
	private ?string $image;

	public function __construct(string $directory, ?string $image = null) {
		$this->directory = $directory;
		// error_log($this->directory, 0);
		$this->image = $image;
	}

	private function getInnerImages() : array {
		$files = scandir(GALLERY_ROOT . $this->directory, /*SCANDIR_SORT_NONE*/);
		array_diff($files, array('.', '..'));
		$images = array();
		foreach ($files as $file) {
			$file = ($this->directory . $file);
			if(stripos(mime_content_type(GALLERY_ROOT . $file), 'image') === 0) {
				array_push($images, $file);
			}
		}
		return $images;
	}

	public function getData() : array {
		$data = array(
			'is_dir' => $this->isDir(),
			'dir' => $this->directory,
			'images' => $this->getInnerImages(),
		);
		if ($this->isDir()) {
			$data['subdirs'] = $this->getSubdirectories();
		} else {
			$data['current_image'] = $this->image;
		}
		return $data;
	}

	// public function getDir() : string {
	// 	return substr($this->directory, strlen(GALLERY_ROOT));
	// }

	public function isDir() : bool {
		return ($this->image === null);
	}

	private function getSubdirectories() : array
	{
		$files = scandir(GALLERY_ROOT . $this->directory, /*SCANDIR_SORT_NONE*/);
		$files = array_diff($files, array('.', '..'));
		$directories = array();
		foreach ($files as $file) {
			$file = ($this->directory . $file);
			if(mime_content_type(GALLERY_ROOT . $file) == 'directory') {
				array_push($directories, $file);
			}
		}
		return $directories;
	}
}