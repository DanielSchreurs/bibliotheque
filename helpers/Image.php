<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Helpers;

class Image
{
    public static function isvalidImage($image, $width, $height)
    {
        $error = [];
        $imageInfo = getimagesize($image['tmp_name']);
        if ($image['size'] == 0 || $image['name'] == '') {
            $error[] = 'Oups, le fichier semble vide';
        }
        if ($imageInfo[3] != 'width="' . $width . '" height="' . $height . '"') {
            $error[] = 'Oups, les dimensions ne sont pas bonnes';
        }
        if (self::isValidExtension($image)) {
            $error[] = 'Oups, format non valide';
        }

        return $error;
    }

    public static function isValidExtension($image)
    {
        $extentions = explode(';', ACCECTIMAGEDATAFORM);
        return in_array($image['type'], $extentions);
    }

    public static function isValidSize($image, $width, $height)
    {
        $imageInfo = getimagesize($image['tmp_name']);
        return $imageInfo[3] != 'width="' . $width . '" height="' . $height . '"' ? false : true;
    }

    public static function isEmptyFile($image)
    {

        return !empty($image['name']);
    }

    public static function saveAs($image, $chemin, $name)
    {
        $extension = '.' . explode('.', $image['name'])[1];
        if (!@move_uploaded_file($image["tmp_name"], $chemin . $name . $extension)) {
            var_dump($image);
            die('helper image');
        }
    }

    public static function imageCopyResampled($image, $chemin, $name, $percentage)
    {
        $extension = '.' . explode('.', $image['name'])[1];
        $oldImage = $image["tmp_name"];
        $percent = $percentage;
        // Calcul des nouvelles dimensions
        list($width, $height) = getimagesize($oldImage);
        $new_width = $width * $percent;
        $new_height = $height * $percent;

        // Redimensionnement
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($oldImage);
        // Save it
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($image_p, $chemin . $name, 100);
    }

    public static function renameFileName($old, $image = null, $add = '')
    {
        $extension = $image !== null ? '.' . explode('.', $image['name'])[1] : null;
        return strtolower(str_replace(' ', '_', $old)) . $add . rand(99999999999999999,
            999999999999999999999999) . ($image !== null ? $extension : '');
    }

}