<?php
require("config.php");
require("db.php");
require("functions/all.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

if (isset($_POST['delete-post'])) {
	deletePost($_GET['id']);
	echo "<script> location.href='" . HOST . "'; </script>";
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

?>

<main class="page-content">
	<div class="container container-narrow">
		<form method="post" class="form">
			<h2 class="form__title">Удалить пост?</h2>

			<article class="post post--preview">
				<div class="post__date"><?php echo date('d.m.Y', strtotime($post["created_at"])) ?></div>
				<h2 class="post__title"><?= $post['title'] ?></h2>
				<div class="post__img-wrapper">
					<img src="<?= HOST . "data/covers/" . $post['cover_name'] ?>" alt="" class="post__img" />
				</div>
				<div class="post__text">
					<p>
						<?php echo getExcerpt($post["content"]); ?>
					</p>
				</div>
				<?php if (mb_strlen($post['content']) > 200): ?>
					<div class="post__readmore">
						<a href="post.php?id=<?= $post['id'] ?>" class="link">Читать далее</a>
					</div>
				<?php endif; ?>


			</article>

			<div class="form__btns-wrapper">
				<button name="delete-post" class="button button--lg">Удалить</button>
				<a href="<?= HOST ?>" class="button button--secondary button--lg">Отмена</a>
			</div>
		</form>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>