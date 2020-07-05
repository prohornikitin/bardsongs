<!DOCTYPE html>
<html lang='ru'>
	<head>
		<?php
			echo '<title>', $this->title, '</title>';
		?>
		
		<link rel='icon' href='/favicon.ico'>
		<link rel='stylesheet' type='text/css' href='/css/base.css'>
		<?php
			if(isset($this->css)) {
				echo "<link rel='stylesheet' type='text/css' href='/css/{$this->css}.css'>";
			}
		?>
	</head>
	<body>
		<div id='backgroundImageHolder'></div>
		<?php
			echo '<h1>', $this->label, '</h1>';
		?>
		
		<div class='contentHolder'>
			<nav>
				<button id='main' onclick="window.location.href='/Main.php'">Главная</button>
				<button id='forum' onclick="window.location.href='/Forum.php'">Форум</button>
				<button id='gallery' onclick="window.location.href='/Gallery.php'">Галерея</button>
				<button id='authors_and_performers' onclick="window.location.href='/PersonalPages.php'">Авторы и исполнители</button>
				<button id='history' onclick="window.location.href='/History.php'">История</button>
			</nav>
			<?php
				require ("views/content/{$this->content_view}.php");
			?>
		</div>
	</body>
	<style>
	<?php
		if(isset($this->nav_button_id)) {
			echo 
			"#{$this->nav_button_id} {
				background: rgb(105, 203, 125)
			}";
		}
	?>
	</style>
</html>