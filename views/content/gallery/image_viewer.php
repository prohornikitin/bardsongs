<main>
	<button id="back" onclick="javascript:history.back()">
		<img src="images/BackButton.png">
		Назад
	</button>
	<img id="image">
	<div>
		<button id="previous_btn">Предыдущая</button>
		<button id="next_btn">Следующая</button>
	</div>
</main>
<script type="text/javascript">
	<?php
		require_once SITE_ROOT . '/tools/setJsVariable.php';

		$this->current_image = dirname($this->images[0]) . '/' . $this->current_image;
		$currentFileIndex = array_search($this->current_image, $this->images);
		\tools\setJsVariable('currentFileIndex', $currentFileIndex);
		\tools\setJsVariable('fileNames', $this->images);
	?>
</script>
<script src="/js/imageViewer.js"></script>