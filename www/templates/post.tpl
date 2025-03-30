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

    <div class="post__readmore">
        <a href="post.php?id=<?= $post['id'] ?>" class="link">Узнать больше</a>
    </div>
    <?php if (is_admin()): ?>
        <div class="post__buttons">
            <a href="edit-post.php?id=<?= $post['id'] ?>" class="button button--secondary">Редактировать</a>
            <a href="delete-post.php?id=<?= $post['id'] ?>" class="button button--secondary">Удалить</a>
        </div>
    <?php endif; ?>
    <div class="post__views">
        <img src="<?= HOST ?>assets/img/svgicons/eye.svg" alt="eye">
        <?= $post['views'] ?>
    </div>
    <?php if (isset($post['updated_at'])): ?>
        <div class="post__date">Updated at: <?php echo date('d.m.Y:h:i', strtotime($post["updated_at"])) ?></div>
    <?php endif; ?>

</article>