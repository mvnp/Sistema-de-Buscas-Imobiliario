<?php 

/**
 * Autoload - Chama todas as classes intanciadas
 * @param  [type] $class [description]
 * @return [type]        [description]
*/

class Autoloader {

    public function __construct() {
        spl_autoload_register($this, 'loader');
    }

    public static function loader($classes) {

        foreach ($classes as $class) {
            require_once "{$class}.class.php";
        }
    }

}