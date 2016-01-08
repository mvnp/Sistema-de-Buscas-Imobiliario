<?php 

/**
 * Autoload - Chama todas as classes intanciadas
 * @param  [type] $class [description]
 * @return [type]        [description]
*/
function __autoload($class) { require_once "{$class}.class.php"; }