<?php
require("config.php");
require("db.php");
require("functions/all.php");



include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

$posts = getPosts();
?>




<main class="page-content">
	<div class="container container-narrow">
		<div class="posts-wrapper">

			<?php foreach ($posts as $post): ?>
				<?php include(ROOT . "/templates/post.tpl"); ?>
			<?php endforeach; ?>
		</div>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>