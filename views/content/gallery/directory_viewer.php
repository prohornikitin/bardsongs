<main>
	<?php
		echo '<h2>', $this->directory, '</h2>';
	?>

	<?php
		echo ($this->backButton);
	?>

	<?php
		foreach ($this->subdirectories as $directory) {
			echo $directory;
		}

		foreach ($this->images as $image) {
			echo $image;
		}
	?>
</main>