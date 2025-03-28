<?php
require("config.php");

include(ROOT . "/templates/head.tpl");
include(ROOT . "/templates/header.tpl");

?>

		<main class="page-content">
			<div class="container container-narrow">
				<form class="form">
					<h2 class="form__title">Удалить пост?</h2>

					<article class="post post--preview">
						<div class="post__date">16.03.2025</div>
						<h2 class="post__title">Сила, заключённая в&#160;металле</h2>
						<div class="post__img-wrapper">
							<picture>
								<source srcset="./img/01.webp 1x, ./img/01@2x.webp 2x" type="image/webp" />
								<source srcset="./img/01.jpg 1x, ./img/01@2x.jpg 2x" type="image/jpeg" />
								<img src="./img/01.jpg" alt="" class="post__img" />
							</picture>
						</div>
						<div class="post__text">
							<p>
								Некоторые автомобили созданы не&#160;просто для передвижения&#160;&#8212; они олицетворяют мощь, свободу и&#160;стиль. Этот мускулистый Dodge
								Challenger в&#160;бирюзовом цвете&#160;&#8212; настоящий символ американской автомобильной культуры. Его агрессивный силуэт, заниженная посадка
								и&#160;черные диски говорят сами за&#160;себя: это машина, которая требует дороги.
							</p>
						</div>
						<div class="post__readmore">
							<a href="post.html" class="link">Читать далее</a>
						</div>
					</article>

					<div class="form__btns-wrapper">
						<button class="button button--lg">Удалить</button>
						<button class="button button--secondary button--lg">Отмена</button>
					</div>
				</form>
			</div>
		</main>
		
<?php

include(ROOT . "/templates/footer.tpl");
?>