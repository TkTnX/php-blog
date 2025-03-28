<?php
require("config.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

?>


<main class="page-content">
	<div class="container container-narrow">
		<form class="form">
			<h2 class="form__title">Вход</h2>

			<label class="fieldset">
				<div class="label">Email</div>
				<input type="text" class="input" />
			</label>

			<label class="fieldset">
				<div class="label">Пароль</div>
				<input type="password" class="input" />
			</label>

			<button class="button button--lg">Войти</button>
		</form>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>