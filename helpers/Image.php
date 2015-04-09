<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Helpers;


class Image
{
    public static function isvalidImage($image, $width, $height, $extension)
    {
        $error = [];
        $imageInfo = getimagesize($image['tmp_name']);
        if ($image['size'] == 0 || $image['name'] == '') {
            $error[] = 'Oups, le fichier semble vide';
        }
        if ($imageInfo[3] != 'width="' . $width . '" height="' . $height . '"') {
            $error[] = 'Oups, les dimensions ne sont pas bonnes';
        }
        if ($image['type'] != 'image/' . $extension) {
            $error[] = 'Oups, ce n’est pas le bon format';
        }

        return $error;
    }

    public static function saveAs($image, $chemin, $name)
    {
        $extension = '.' . explode('.', $image['name'])[1];
        if (!@move_uploaded_file($image["tmp_name"], $chemin . $name . $extension)) {
            var_dump($image);
            die('helper image');
        }
    }

    public static function reSize($image, $percentage)
    {
        $filename = $image;
        $percent = $percentage;
        // Calcul des nouvelles dimensions
        list($width, $height) = getimagesize($filename);
        $new_width = $width * $percent;
        $new_height = $height * $percent;
        // Redimensionnement
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        return imagejpeg($image_p);

    }

    public static function renameFileName($old, $add = '')
    {
        return strtolower(str_replace(' ', '_', $old)) . $add . rand(999999999999, 999999999999999999999999);
    }

}