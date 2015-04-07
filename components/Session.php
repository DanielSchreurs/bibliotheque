<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Components;

class Session
{
    public static function setMessage($message, $type = 'success')
    {
        $_SESSION['flash']['message'] = $message;
        $_SESSION['flash']['type'] = $type;
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            ?>
        <p class="container flash-box <?php echo($_SESSION['flash']['type']); ?>"><?php echo($_SESSION['flash']['message']); ?> <span class="flash-box__btn">X</span></p>
            <?php
            unset($_SESSION['flash']);

        }
    }

    public static function isUserLogged()
    {
        return (isset($_SESSION['userId'])||isset($_COOKIE['userId']));
    }
    public static function isAdmin()
    {
        //var_dump($_COOKIE); die();
        
        return (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') || (isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin');
    }
}
