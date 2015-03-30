<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Components;

class Flash
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
        <p class="flash-box <?php echo($_SESSION['flash']['type']); ?>"><?php echo($_SESSION['flash']['message']); ?> <span class="flash-box__btn">X</span></p>
            <?php
            unset($_SESSION['flash']);

        }
    }

}
