<?php

function getPosts()
{
    $posts = R::findAll('posts');

    return $posts;
}

function getPost($id)
{
    $posts = R::findOne('posts', "id = ?", [$id]);

    return $posts;
}

function deletePost($id)
{
    $post = R::findOne('posts', "id = ?", [$id]);
    if (empty($post)) {
        return false;
    } else {
        R::trash($post);
        return true;
    }
}