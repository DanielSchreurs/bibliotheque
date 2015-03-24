<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */
namespace Helpers;

class validate
{
    public function isValidInput($string)
    {
        if ($string == '' || trim($string) == '') {
            return false;
        }
        return true;
    }

}