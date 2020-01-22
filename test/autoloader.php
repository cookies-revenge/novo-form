<?php
require_once "./propel-config.php";

spl_autoload_register(function ($class) {
    if (strpos($class, "CookiesRevenge\\") > -1) {
        $dir = strcasecmp(substr($class, -4), "Test") ? "src/" : "test/";
        $name = substr($class, strlen("CookiesRevenge\\NovoForm\\"));
    } else {
        $dir = "test/";
        $name = substr($class, strlen("Test\\"));
    }
    if (file_exists(dirname(__DIR__) ."/".  $dir . strtr($name, "\\", DIRECTORY_SEPARATOR) . ".php"))
        require dirname(__DIR__) ."/".  $dir . strtr($name, "\\", DIRECTORY_SEPARATOR) . ".php";
});