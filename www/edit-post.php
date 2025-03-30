<?php
require("config.php");
require("db.php");
require("functions/all.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

if (!is_admin()) {
	echo "<script> location.href='" . HOST . "login.php'; </script>";
	exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$post = getPost($_GET['id']);

	if (empty($post)) {
		echo "<script> location.href='" . HOST . "'; </script>";
		exit;
	}

} else {
	echo "<script> location.href='" . HOST . "'; </script>";
	exit;
}

if (isset($_POST['edit-post'])) {
	if (empty($_POST['content']) && empty($_FILES['cover']['name'])) {
		$errors[] = "Пост должен содержать текст или обложку!";
	}

	if (empty($errors)) {
		$coverName = $post['cover_name'];

		if (isset($_POST['delete-cover']) && $_POST['delete-cover'] == "on") {
			if (is_file(ROOT . 'data/covers/' . $post['cover_name'])) {
				unlink(ROOT . 'data/covers/' . $coverName);
			}
			$coverName = null;
		}

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
					if (is_file(ROOT . 'data/covers/' . $post['cover_name'])) {
						unlink(ROOT . 'data/covers/' . $coverName);
					}
					$coverName = $file_name;
				}
			}
		}

		// Создание поста
		$post->title = trim($_POST['title']);
		$post->content = trim($_POST['content']);
		$post->cover_name = $coverName;


		$id = R::store($post);
	}
}

?>

<main class="page-content">
	<div class="container container-narrow">
		<form class="form" enctype="multipart/form-data" method="post">
			<h2 class="form__title">Редактировать</h2>

			<pre>
		</pre>

			<label class="fieldset">
				<div class="label">Название</div>
				<input type="text" name="title" class="input" value="<?= $post['title'] ?>" />
			</label>

			<label class="fieldset">
				<div class="label">Содержание</div>
				<textarea name="content" id="" class="textarea"><?= $post['content'] ?></textarea>
			</label>

			<fieldset class="fieldset">
				<div class="label">Обложка</div>
				<?php if (!empty($post['cover_name'])): ?>
					<div class="fieldset__cover-wrapper">
						<img src="<?= HOST . "data/covers/" . $post['cover_name'] ?>" alt="" class="fieldset__cover" />
					</div>
				<?php endif; ?>
				<?php if (!empty($post['cover_name'])): ?>
					<label class="fieldset fieldset--checkbox">
						<input name="delete-cover" type="checkbox" />
						Удалить обложку
					</label>
				<?php endif; ?>
				<input id="cover" name="cover" type="file" />
				<img src="" class="" id="coverPreview" alt="">
			</fieldset>

			<div class="form__btns-wrapper">
				<button name="edit-post" class="button button--lg">Обновить</button>
				<a href="<?= HOST ?>" class="button button--secondary button--lg">Отмена</a>
			</div>

			<?php if (isset($errors) && !empty($errors)) {
				foreach ($errors as $error) {
					echo "<div class='error'>$error</div>";
				}
			}

			if (isset($id)) {
				echo "<div class='success'>Post updated {$id}</div>";
			}

			?>
		</form>
	</div>
</main>

<script>
	const preview = document.querySelector('#coverPreview');
	const coverInput = document.querySelector('#cover');

	coverInput.addEventListener('change', (e) => {
		preview.src = URL.createObjectURL(e.target.files[0]);
	})

</script>

<?php

include(ROOT . "/templates/footer.tpl");
?>