<?php

function __autoload($class) {
    $class = str_replace('\\', '/', $class) . '.php';
	include_once($class);
}

?>