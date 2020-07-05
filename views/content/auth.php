<main>
	<?php
		if(isset($this->success_msg)) {
			echo "<h2 class='success'>";
				echo $this->success_msg;
			echo '</h2>';
		} else if(isset($this->error_msg)) {
			echo "<h2 class='error'>";
				echo $this->error_msg;
			echo '</h2>';
		} else {
			echo '<h2>Войдите</h2>';
		}
		echo '<form action="', $_SERVER['REQUEST_URI'],'" method="POST">'
	?>
	<form method='POST'>
		<div class='form_item'>
			<input type='email' required name='email' placeholder='Email'>
		</div>
		<div class='form_item'>
			<input type='password' required name='password' placeholder='Пароль'>
		</div>
		<span>
			<?php
				echo "<input type='submit' formaction='?action=signIn&callback={$this->callback}' value='Вход'>";
				echo "<input type='submit' formaction='?action=signUp&callback={$this->callback}' value='Регистрация'>";
			?>
		</span>
		<a href='/Auth.php?action=passwordRecover'>Забыли пароль? </a>
	</form>
</main>