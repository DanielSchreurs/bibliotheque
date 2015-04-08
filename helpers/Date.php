<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Helpers;


use Carbon\Carbon;

class Date
{
    public static function isNotTolate($Y,$M,$D)
    {
        $first=Carbon::create($Y,$M,$D);
        $second=Carbon::now();
        return $first->lte($second);
    }
}