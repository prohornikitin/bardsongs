<main>
	<form>
		<select name='page_select' id='page_select'>
			<?php
				foreach ($this->pages as $page) {
					echo '<option>', $page, '</option>';
				}
			?>
		</select>

		<label for='photo'>Фото</label>
		<input name='photo' type='file' name=''>

		<label for='story'>Рассказ</label>
		<textarea name='story' id='story'>
			
		</textarea>

		<label for='media'>Медиа</label>
		<textarea name='media' id='media'>
			
		</textarea>
	</form>
	<script type='text/javascript'>
		let select = document.getElementById('page_select');
		let story = document.getElementById('story');
		let media = document.getElementById('media');

		select.onchange = function() {
			let id = select.value;
			getStory();
			// alert("Вы выбрали: " + select.value)
		}

		function getStory() {
			let request = new XMLHttpRequest();
			request.open('GET', '/views/content/personal_pages/'+id+'/media.html');
			request.responseType = 'document';
			request.onload = function() {
				story.textContent = request.response;
			};
			request.send();
		}
	</script>
</main>