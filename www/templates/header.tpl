<?php
$theme = $_COOKIE['theme'];


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
                <a href="create-post.php" class="button">Добавить пост</a>
                <a href="login.php" class="button">Вход</a>
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
    <a href="create-post.php" class="button">Добавить пост</a>
    <a href="login.php" class="button">Вход</a>
    <?php if (isset($theme) && $theme === "dark"): ?>
        <a href="<?= HOST ?>index.php?theme=light" class="button toggleDarkModeBtn">🌞</a>
    <?php else: ?>
        <a href="<?= HOST ?>index.php?theme=dark" class="button toggleDarkModeBtn">🌘</a>

    <?php endif ?>
</div>