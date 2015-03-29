<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Components;

class Flash
{
    public static function setMessage($message, $type='success')
    {
        $_SESSION['flash']['message'] = $message;
        $_SESSION['flash']['type'] = $type;
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])){
            echo($_SESSION['flash']['message']);
            unset($_SESSION['flash']);
        }
    }

}