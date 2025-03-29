<?php

function getExcerpt($content, $limit = 300, $cutLength = 240)
{
    $content = trim($content);

    if (mb_strlen($content, 'UTF-8') <= $limit) {
        return $content;
    }

    $excerpt = mb_substr($content, 0, $limit, 'UTF-8');

    $lastDotPos = mb_strpos($excerpt, '.', 0, 'UTF-8');
    if ($lastDotPos !== false) {
        $excerpt = mb_substr($excerpt, 0, $lastDotPos + 1, 'UTF-8');
    } else {
        $excerpt = mb_substr($excerpt, 0, $limit, 'UTF-8');
    }

    return $excerpt;
}