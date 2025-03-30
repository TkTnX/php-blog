<?php
function getExcerpt($text)
{
    if (mb_strlen($text) > 200) {
        return mb_substr($text, 0, 200) . '...';
    }
    return $text;
}