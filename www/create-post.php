<?php
require("config.php");
require("db.php");
require('functions/all.php');

if (!empty($_POST)) {
	if (empty($_POST['content']) && empty($_FILES['cover']['name'])) {
		$errors[] = "Пост должен содержать текст или обложку!";
	}


	if (empty($errors)) {

		// Загрузка cover

		$coverName = null;
		if (!empty($_FILES['cover']['name'])) {

			$checkResult = checkPhotoBeforeUpload();
			if (is_array($checkResult)) {
				$errors = $checkResult;
			} else {
				$extention = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);

				if ($extention === "jpeg")
					$extention = "jpg";

				$sourcePath = $_FILES['cover']['tmp_name'];

				$file_name = uniqid() . '.' . $extention;
				$result_path = ROOT . 'data/covers/' . $file_name;

				if (resizeAndCropImage($sourcePath, $result_path, 600, 400)) {

					$coverName = $file_name;
				}
				;

			}
		}

		// Создание поста
		$post = R::dispense('posts');
		$post->title = trim($_POST['title']);
		$post->content = trim($_POST['content']);
		$post->created_at = date('Y-m-d H:i:s');
		$post->cover_name = $coverName;


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
				<input name="cover" type="file" id="coverInput" />
				<div class="cover-preview-wrapper">
					<img src="" alt="" id="coverPreview">
				</div>
			</fieldset>

			<button type="submit" class="button button--lg">Опубликовать</button>
			<?php if (isset($errors) && !empty($errors)) {
				foreach ($errors as $error) {
					echo "<div class='error'>$error</div>";
				}
			}

			if (isset($id)) {
				echo "<div class='success'>Post created {$id}</div>";
			}

			?>
		</form>
	</div>
</main>

<script>
	const coverInput = document.querySelector('#coverInput');
	const coverPreview = document.querySelector('#coverPreview');

	coverInput.addEventListener('change', (e) => {
		const image = e.target.files[0]

		if (image) coverPreview.src = URL.createObjectURL(image);

	})
</script>

<?php

include(ROOT . "/templates/footer.tpl");
?>