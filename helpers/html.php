<?php

/**
 *
 */
namespace Helpers;

class Html
{

    public function createLink($modele, $action, $param = null)
    {
        if (!is_null($param)) {
            $param = '&amp;' . http_build_query($param);
        } else {
            $param = '';

        }
        return $_SERVER['PHP_SELF'] . '?m=' . $modele . '&amp;a=' . $action . $param;

    }

    public function cutText($chaine, $long)
    {
        return explode('\break', wordwrap($chaine, $long, '\break'))[0] . '&nbsp;&hellip;';
    }

    public function dateToSTring($date)
    {
        setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
        return strftime("%A %d %B %Y.", strtotime($date));
    }

    public function birthToString($date)
    {
        $date = strtotime($date);
        $mois = [
            'janvier',
            'février',
            'mars',
            'avril',
            'mai',
            'juin',
            'juillet',
            'août',
            'septembre',
            'octobre',
            'novembre',
            'décembre'
        ];
        return date('j', $date) . ' ' . $mois[date('m', $date) - 1] . ' ' . date('Y', $date);


    }


}