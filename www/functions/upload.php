<?php

function createDirectoryIfNotExists($path)
{
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

function checkPhotoBeforeUpload()
{
    global $allowed_extention, $allowed_file_types, $MAX_UPLOAD_COVER_SIZE;
    if ($_FILES['cover']['error'] !== UPLOAD_ERR_OK) {
        return ['Ошибка при загрузке файла!'];
    }

    $file_type = mime_content_type($_FILES['cover']['tmp_name']);

    if (!in_array($file_type, $allowed_file_types)) {
        return ['Недопустимый тип файла!'];
    }

    $extention = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
    if (!in_array($extention, $allowed_extention)) {
        return ['Недопустимое расширение файла!'];
    }

    if ($_FILES['cover']['size'] > $MAX_UPLOAD_COVER_SIZE) {
        return ['Файл слишком большой!'];
    }
    if ($extention === "jpeg") {
        $extention = "jpg";
    }

    $upload_path = ROOT . 'data/covers/';
    createDirectoryIfNotExists($upload_path);

    return true;

}