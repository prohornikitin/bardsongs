<section>
	<?php
		$photo = glob("{$this->folder}/photo.*")[0];
		echo "<img class='main_photo left' src='{$photo}' alt='photo'>";
	?>
	<div class='story'>
		<?php require "{$this->folder}/story.html"; ?>
	</div>
</section>
<section class="media">
	<?php require "{$this->folder}/media.html"; ?>
</section>