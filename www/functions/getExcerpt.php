<?php
// <!-- TODO: Сделать обрезку текста -->

function getExcerpt($text)
{
    if (mb_strlen($text) > 200) {
        return mb_substr($text, 0, 200) . '...';
    }
}