<article class="post">
    <div class="post__date"><?php echo date('d.m.Y', strtotime($post["created_at"])) ?></div>
    <!-- TITLE -->
    <?php if (!empty($post["title"])): ?>
        <h2 class="post__title"><?= $post["title"] ?></h2>
    <?php endif; ?>

    <!-- COVER -->

    <?php if (!empty($post["cover_name"])): ?>
        <div class="post__img-wrapper">
            <picture>
                <img src="<?= HOST . "data/covers/" . $post['cover_name'] ?>" alt="<?= $post['title'] ?>"
                    class="post__img" />
            </picture>
        </div>
    <?php endif; ?>

    <!-- CONTENT -->

    <?php if (!empty($post["content"])): ?>

        <div class="post__text">
            <p>
                <?php echo getExcerpt($post["content"]); ?>
            </p>
        </div>
    <?php endif; ?>

    <!-- READ MORE -->

    <?php if (mb_strlen($post['content'], 'UTF-8') > 300): ?>
        <div class="post__readmore">
            <a href="post.php?id=<?= $post['id'] ?>" class="link">Читать далее</a>
        </div>
    <?php endif ?>
    <div class="post__buttons">
        <a href="edit-post.php" class="button button--secondary">Редактировать</a>
        <a href="delete-post.php" class="button button--secondary">Удалить</a>
    </div>
</article>