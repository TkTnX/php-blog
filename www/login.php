<?php
require("config.php");
require("db.php");
require("functions/all.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

if (!empty($_POST)) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$errors[] = "Заполните все поля!";
	}

	if (empty($errors)) {
		$user = R::findOne('users', "username = ?", [$_POST['username']]);
		if (empty($user)) {
			$errors[] = "Введены неверные данные!";
		} else {
			if ($user->password == $_POST['password']) {

				$_SESSION['role'] = $user['role'];
				$_SESSION['username'] = $user['username'];

				echo "<script> location.href='" . HOST . "'; </script>";
				exit;
			} else {
				$errors[] = "Введены неверные данные!";
			}
		}
	}


}

?>


<main class="page-content">
	<div class="container container-narrow">
		<form method="post" class="form">
			<h2 class="form__title">Вход</h2>

			<label class="fieldset">
				<div class="label">Username</div>
				<input name="username" type="text" class="input" />
			</label>

			<label class="fieldset">
				<div class="label">Пароль</div>
				<input name="password" type="password" class="input" />
			</label>

			<button class="button button--lg">Войти</button>
			<?php if (isset($errors) && !empty($errors)) {
				foreach ($errors as $error) {
					echo "<div class='error'>$error</div>";
				}
			}
			?>
			<a href="register.php" class="link">Ещё нет аккаунта?</a>
		</form>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>