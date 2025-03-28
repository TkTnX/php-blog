<?php
require("config.php");
require("db.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

?>




<main class="page-content">
	<div class="container container-narrow">
		<div class="posts-wrapper">
			<article class="post">
				<div class="post__date">16.03.2025</div>
				<h2 class="post__title">Сила, заключённая в&#160;металле</h2>
				<div class="post__img-wrapper">
					<picture>
						<source srcset="<?= HOST ?>assets/img/01.webp 1x, ./img/01@2x.webp 2x" type="image/webp" />
						<source srcset="<?= HOST ?>assets/img/01.jpg 1x, ./img/01@2x.jpg 2x" type="image/jpeg" />
						<img src="<?= HOST ?>assets/img/01.jpg" alt="" class="post__img" />
					</picture>
				</div>
				<div class="post__text">
					<p>
						Некоторые автомобили созданы не&#160;просто для передвижения&#160;&#8212; они олицетворяют
						мощь, свободу и&#160;стиль. Этот мускулистый Dodge
						Challenger в&#160;бирюзовом цвете&#160;&#8212; настоящий символ американской автомобильной
						культуры. Его агрессивный силуэт, заниженная посадка
						и&#160;черные диски говорят сами за&#160;себя: это машина, которая требует дороги.
					</p>
				</div>
				<div class="post__readmore">
					<a href="post.php" class="link">Читать далее</a>
				</div>
				<div class="post__buttons">
					<a href="edit-post.php" class="button button--secondary">Редактировать</a>
					<a href="delete-post.php" class="button button--secondary">Удалить</a>
				</div>
			</article>
			<article class="post">
				<div class="post__date">16.03.2025</div>
				<div class="post__text post__text--md">
					<p>Горы в&#160;тишине, отражение в&#160;воде&#160;&#8212; мир застыл, дыша. Шепчет бриз траве,
						солнце тает за холмами, чайка вдаль летит. 🌿✨</p>
				</div>
				<div class="post__buttons">
					<a href="edit-post.php" class="button button--secondary">Редактировать</a>
					<a href="delete-post.php" class="button button--secondary">Удалить</a>
				</div>
			</article>
		</div>
	</div>
</main>

<?php

include(ROOT . "/templates/footer.tpl");
?>