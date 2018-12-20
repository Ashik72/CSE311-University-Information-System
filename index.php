<?php


require_once 'vendor/autoload.php';
require_once 'inc/class.essential.php';

Essential::setEnv();
Essential::startRouter();

//Kint::dump(getenv('DB_HOST'));