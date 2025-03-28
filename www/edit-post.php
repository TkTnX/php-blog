<?php
require("config.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

?>

<main class="page-content">
	<div class="container container-narrow">
		<form class="form">
			<h2 class="form__title">Редактировать</h2>

			<label class="fieldset">
				<div class="label">Название</div>
				<input type="text" class="input" value="Утреннее спокойствие на берегу озера" />
			</label>

			<label class="fieldset">
				<div class="label">Содержание</div>
				<textarea name="" id="" class="textarea">
Есть места, где время словно замедляет свой&#160;бег. Терраса с&#160;панорамным видом на&#160;озеро, высокие горы, окутанные легкой дымкой, и&#160;утренний воздух, наполненный ароматами природы. Здесь нет суеты, только тишина, покой и&#160;ощущение гармонии. Представьте, как вы&#160;выходите босиком на&#160;прохладную плитку, завариваете чашку свежего кофе и&#160;садитесь в&#160;шезлонг, наслаждаясь неспешным началом&#160;дня. Такой отдых пробуждает внутреннее вдохновение и&#160;напоминает о&#160;простых радостях жизни. Где вы&#160;хотели&#160;бы остановиться, чтобы почувствовать настоящий дзен? 🌿✨</textarea>
			</label>

			<fieldset class="fieldset">
				<div class="label">Обложка</div>
				<div class="fieldset__cover-wrapper">
					<picture>
						<source srcset="./img/cover-edit.webp 1x, ./img/cover-edit@2x.webp 2x" type="image/webp" />
						<source srcset="./img/cover-edit.jpg 1x, ./img/cover-edit@2x.jpg 2x" type="image/jpeg" />
						<img src="./img/cover-edit.jpg" alt="" class="fieldset__cover" />
					</picture>
				</div>
				<label class="fieldset fieldset--checkbox">
					<input type="checkbox" />
					Удалить обложку
				</label>
				<input type="file" />
			</fieldset>

			<div class="form__btns-wrapper">
				<button class="button button--lg">Обновить</button>
				<button class="button button--secondary button--lg">Отмена</button>
			</div>
		</form>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>