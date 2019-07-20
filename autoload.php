<?php

/**
 *  Gets executed, whenever a class has to be loaeded using its namespace.
 **/
function __autoload($class) {
    $class = str_replace('\\', '/', $class) . '.php';
	include_once($class);
}

?>
