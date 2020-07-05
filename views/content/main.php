<main class='news'>
	<h2>Новости</h2>
	<?php
		foreach($this->news as $item) {
			echo $item;
		}
	?>
</main>
<aside class='annualEvents'>
	<h2>Традиционные ежегодные мероприятия:</h2>
	<a href='AnnualEvents.php?page=Festival'>
		<h3>Фестиваль</h3>
		<img src='images/KspEmblem.jpg'>
	</a>
	<a href='AnnualEvents.php?page=Rally'>
		<h3>Слёт</h3>
		<video autoplay loop muted>
			<source src='video/Fire.webm'>
		</video>
	</a>
	<a href='AnnualEvents.php?page=NewYear'>
		<h3>Новый год</h3>
		<video disable autoplay loop muted>
			<source src='video/ChristmasTree.webm'>
		</video>
	</a>
	<a href='AnnualEvents.php?page=Volodarka'>
		<h3>Володарка</h3>
		<img src='images/WeAreBugs.jpg'>
	</a>
</aside>
<script src='js/newsShowAndHide.js'></script>