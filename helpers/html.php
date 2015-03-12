<?php

/**
 *
 */
namespace Helpers;
class Html
{

    /**
     * @param string $a l'action(controleur)
     * @param string $m model
     * @return string
     */
    public function createLink($modele,$action,$param=null){
        $param=http_build_query($param);
        return $_SERVER['PHP_SELF'].'?m='.$modele.'&a='.$action.'&'.$param;
    }

    public function cutText($chaine,$long){
        return explode('\break',wordwrap($chaine,$long,'\break'))[0].'1&nbsp;&hellip;';
    }

}