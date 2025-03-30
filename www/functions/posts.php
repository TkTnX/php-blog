<?php

function getPosts()
{
    $posts = R::findAll('posts');

    return $posts;
}

function getPost($id)
{
    $post = R::findOne('posts', "id = ?", [$id]);
    $post->views = $post->views + 1;
    R::store($post);
    return $post;
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