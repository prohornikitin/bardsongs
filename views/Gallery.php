<?php namespace views;

class Gallery extends Base
{
	protected string $directory;
	protected array $images = array();
	protected array $subdirectories = array();

	public function generate(array $data = array()) : void {
		
		if($data['is_dir']) {
			$this->generateDirectoryViewer($data);
		} else {
			$this->generateImageViewer($data);
		}
	}

	private function generateImageViewer(array $data) : void
	{
		$this->content_view = 'gallery/image_viewer';
		$this->css = 'gallery/image_viewer';
		$this->nav_button_id = 'gallery';

		$this->directory = GALLERY_ROOT . $data['dir'];
		$this->images = array_map(
			function(string $image) {
				return (GALLERY_ROOT . $image);
			},
			$data['images']
		);
		$this->current_image = $data['current_image'];
		
		parent::generate();
	}


	private function generateDirectoryViewer(array $data) : void
	{
		$this->content_view = 'gallery/directory_viewer';
		$this->css = 'gallery/directory_viewer';
		$this->nav_button_id = 'gallery';

		$this->directory = $data['dir'];
		$this->subdirectories = $this->formatSubdirectories($data['subdirs']);
		$this->images = $this->formatImages($data['images']);
		$this->backButton = $this->chooseBackButton($data['dir']);

		parent::generate();
	}

	private function formatSubdirectories(array $dirs) : array {
		$formatted = array();
		foreach ($dirs as $dir) {
			$name = basename($dir);
			array_push($formatted, 
				"<figure>
					<a href='?dir={$dir}/'>
						<img src='/images/Folder.png'>
					</a>
					<figcaption> {$name} </figcaption>
				</figure>"
			);
		}
		return $formatted;
	}

	private function formatImages(array $images) : array {
		$formatted = array();
		foreach ($images as $path) {
			$dir = dirname($path);
			$file = basename($path);
			$name = substr($file, 0, strrpos($file, '.')); //delete extension
			$path = (GALLERY_ROOT . $path);
			array_push($formatted,
				"<figure>
					<a href='?dir={$dir}/&file={$file}'>
						<img src='{$path}'>
					</a>
					<figcaption> {$name} </figcaption>
				</figure>"
			);
		}
		return $formatted;
	}


	private function chooseBackButton(string $dir) : string {
		if($dir != GALLERY_ROOT) {
			return self::ENABLED_BUTTON;
		} else {
			return self::DISABLED_BUTTON;
		}
	}

	protected string $backButton = self::ENABLED_BUTTON;
	private const ENABLED_BUTTON =
	"<button id='back' onclick='javascript:history.back()'>
		<img src='images/BackButton.png'>
		Назад
	</button>";
	private const DISABLED_BUTTON =
	"<button disabled id='back' onclick='javascript:history.back()'>
		<img src='images/DisabledBackButton.png'>
		Назад
	</button>";
}