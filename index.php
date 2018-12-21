<?php


require_once 'vendor/autoload.php';
require_once 'Spyc.php';
require_once 'inc/class.essential.php';
require_once 'inc/class.queries.php';

Essential::setEnv();
Essential::startRouter();

//Kint::dump($GLOBALS['auth']->register("test@test.com", "astrong@password", "astrong@password"));
