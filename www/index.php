<?php
require("config.php");
require("db.php");
require("functions/all.php");

if (isset($_GET['theme'])) {
	if ($_GET['theme'] === "light") {
		setcookie("theme", "light", time() + 3600);
		header('Location: ' . HOST);
	} else {
		setcookie("theme", "dark", time() + 3600);
		header('Location: ' . HOST);

	}
}


include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

$posts = getPosts();
?>




<main class="page-content">
	<div class="container container-narrow">
		<div class="posts-wrapper">

			<?php if (count($posts) === 0): ?>
				<div class="no-posts">Постов нет! <a href="create-post.php">Создайте первый пост!</a></div>
			<?php else: ?>
				<?php foreach ($posts as $post): ?>
					<?php include(ROOT . "/templates/post.tpl"); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>