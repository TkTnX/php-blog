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