<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Helpers;


use Carbon\Carbon;

class Date
{
    public static function isNotTolate($Y, $M, $D)
    {
        $first = Carbon::create($Y, $M, $D);
        $second = Carbon::now();
        return $first->lte($second);
    }
    public static function  isDatePast($string){
        $date=explode('-',$string);
        return self::isNotTolate($date[0],$date[1],$date[2]);
    }
    public static function isValiddateFormat($sting)
    {
        return !!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $sting);
    }
    public static function isValidDate($string, $mustBePassed = true)
    {
        if (!self::isValiddateFormat($string)) {
            return 'Oups, le format n’est pas bon';
        } else {
            if ($mustBePassed) {
                $date = explode('-', $string);

                if (!self::isNotTolate($date[0], $date[1], $date[2])) {
                    return 'Oups, la date doit être dans le passé';
                }
            } else {
                $date = explode('-', $string);
                if (self::isNotTolate($date[0], $date[1], $date[2])) {
                    return 'Oups, la date doit être dans le futur';
                }
            }

        }
        return true;
    }
    public static function getAge($birth, $death, $format = 'y')
    {
        $interval = date_diff(date_create($birth), date_create($death));
        return $interval->format('%' . $format);
    }
}