<?php
require("config.php");
require("db.php");
require("functions/all.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$post = getPost($_GET['id']);

	if (empty($post)) {
		header('Location: ' . HOST);
		exit;
	}

} else {
	header('Location: ' . HOST);
	exit;
}


?>

<main class="page-content">
	<div class="container container-narrow">
		<div class="posts-wrapper">
			<article class="post">
				<div class="post__date"><?php echo date('d.m.Y', strtotime($post["created_at"])) ?></div>
				<?php if (!empty($post["title"])): ?>
					<h1 class="post__title"><?= $post["title"] ?></h1>
				<?php endif; ?>

				<?php if (!empty($post["cover_name"])): ?>
					<div class="post__img-wrapper">
						<picture>
							<img src="<?= HOST . "data/covers/" . $post['cover_name'] ?>" alt="<?= $post['title'] ?>"
								class="post__img" />
						</picture>
					</div>
				<?php endif; ?>
				<?php if (!empty($post["content"])): ?>

					<div class="post__text post__text--full">
						<p>
							<?php echo $post["content"]; ?>
						</p>
					</div>
				<?php endif; ?>

				<div class="post__readmore">
					<a href="index.php" class="link">На&#160;главную</a>
				</div>
				<div class="post__buttons">
					<a href="edit-post.php?id=<?= $post['id'] ?>" class="button button--secondary">Редактировать</a>
					<a href="delete-post.php?id=<?= $post['id'] ?>" class="button button--secondary">Удалить</a>
				</div>
			</article>
		</div>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>