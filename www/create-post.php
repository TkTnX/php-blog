<?php
require("config.php");
require("db.php");

if (!empty($_POST)) {
	if (empty($_POST['content']) && empty($_FILES['cover']['name'])) {
		$errors[] = "Пост должен содержать текст или обложку!";
	}

	if (empty($errors)) {
		$post = R::dispense('posts');
		$post->title = trim($_POST['title']);
		$post->content = trim($_POST['content']);
		$post->created_at = date('Y-m-d H:i:s');

		$id = R::store($post);
	}

}

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

?>

<main class="page-content">
	<div class="container container-narrow">
		<form enctype="multipart/form-data" method="post" class="form">
			<h2 class="form__title">Добавить запись</h2>



			<label class="fieldset">
				<div class="label">Название</div>
				<input name="title" type="text" class="input" />
			</label>

			<label class="fieldset">
				<div class="label">Содержание</div>
				<textarea name="content" id="" class="textarea"></textarea>
			</label>

			<fieldset class="fieldset">
				<div class="label">Обложка</div>
				<label class="fieldset fieldset--checkbox">
					<input name="deleteCover" type="checkbox" />
					Удалить обложку
				</label>
				<input name="cover" type="file" />
			</fieldset>

			<button type="submit" class="button button--lg">Опубликовать</button>
			<?php if (isset($errors) && !empty($errors)) {
				foreach ($errors as $error) {
					echo "<div class='error'>$error</div>"
					;
				}
			}

			if (isset($id)) {
				echo "<div class='success'>Post created {$id}</div>";
			}

			?>
		</form>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>