<?php

function resizeAndCropImage($sourcePath, $destPath, $newWidth, $newHeight)
{
    $imageInfo = getimagesize($sourcePath);
    $mime = $imageInfo['mime'];

    switch ($mime) {
        case "image/jpeg":
            $sourceImage = imagecreatefromjpeg($sourcePath);
            break;
        case "image/png":
            $sourceImage = imagecreatefrompng($sourcePath);
            break;
        case "image/gif":
            $sourceImage = imagecreatefromgif($sourcePath);
            break;
        default:
            throw new Exception("Формат не поддерживается!");
    }

    // исходные размеры
    list($origWidth, $origHeight) = $imageInfo;

    // Соотношение сторон

    $srcRatio = $origWidth / $origHeight;
    $destRatio = $newWidth / $newHeight;

    if ($srcRatio > $destRatio) {
        $cropHeight = $origHeight;
        $cropWidth = $origHeight * $destRatio;
        $srcX = ($origWidth - $cropWidth) / 2;
        $srcY = 0;
    } else {
        $cropWidth = $origWidth;
        $cropHeight = $origWidth / $destRatio;
        $srcX = 0;
        $srcY = ($origHeight - $cropHeight) / 2;

    }

    // Создание нового изображения
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

    if ($mime == "image/png" || $mime == "image/gif") {
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        $transparent = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
        imagefill($resizedImage, 0, 0, $transparent);

    }

    // Обрезаем и ресайзим
    imagecopyresampled(
        $resizedImage,
        $sourceImage,
        0,
        0,
        round($srcX),
        round($srcY),
        round($newWidth),
        round($newHeight),
        round($cropWidth),
        round($cropHeight)
    );

    // Сохранение
    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($resizedImage, $destPath);
            break;
        case 'image/png':
            imagepng($resizedImage, $destPath);
            break;
        case 'image/gif':
            imagegif($resizedImage, $destPath);
            break
            ;
    }

    imagedestroy($sourceImage);
    imagedestroy($resizedImage);

    return true;
}

