<?php

/**
 *
 */
namespace Helpers;

class Html
{

    public function createLink($modele, $action, $param = null)
    {
        $param = http_build_query($param);
        return $_SERVER['PHP_SELF'] . '?m=' . $modele . '&a=' . $action . '&' . $param;
    }
    public function cutText($chaine, $long)
    {
        return explode('\break', wordwrap($chaine, $long, '\break'))[0] . '&nbsp;&hellip;';
    }

    public function dateToSTring($date)
    {
        $date=strtotime($date);
        $jours=['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
        $mois=['janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre'];
        return 'le '.$jours[date('N',$date)-1].' '.date('j',$date).' '.$mois[(date('n',$date))-1].' à '.date('h',$date).':'.date('i',$date);
    }

}