<?php
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : null;
if (isset($_POST['logout'])) {
    logout();
}

?>

<header class="header">
    <div class="container">
        <div class="header__row">
            <div class="header__logo">
                <div class="logo">
                    <a href="index.php" class="logo__link">MY&#160;BLOG</a>
                </div>
            </div>
            <div class="header__btns">
                <?php if (is_admin()): ?>
                    <a href="create-post.php" class="button">Добавить пост</a>
                <?php endif; ?>

                <?php if (!is_auth()): ?>
                    <a href="login.php" class="button">Вход</a>
                <?php else: ?>
                    <form class="logout-form" method="post">
                        <button type="submit" name="logout" class="button">Выход</button>
                    </form>
                <?php endif; ?>

                <?php if (isset($theme) && $theme === "dark"): ?>
                    <a href="<?= HOST ?>index.php?theme=light" class="button toggleDarkModeBtn">🌞</a>
                <?php else: ?>
                    <a href="<?= HOST ?>index.php?theme=dark" class="button toggleDarkModeBtn">🌘</a>

                <?php endif ?>
            </div>
            <div class="header__mobile-nav-btn">
                <button class="mobile-nav-btn">
                    <div class="nav-icon"></div>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="mobile-nav">
    <?php if (is_admin()): ?>
        <a href="create-post.php" class="button">Добавить пост</a>
    <?php endif; ?>

    <?php if (!is_auth()): ?>
        <a href="login.php" class="button">Вход</a>
    <?php else: ?>
        <form method="post">
            <button type="submit" name="logout" class="button">Выход</button>
        </form>
    <?php endif; ?>
    <?php if (isset($theme) && $theme === "dark"): ?>
        <a href="<?= HOST ?>index.php?theme=light" class="button toggleDarkModeBtn">🌞</a>
    <?php else: ?>
        <a href="<?= HOST ?>index.php?theme=dark" class="button toggleDarkModeBtn">🌘</a>

    <?php endif ?>
</div>