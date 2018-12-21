<?php


require_once 'vendor/autoload.php';
require_once 'Spyc.php';
require_once 'inc/class.essential.php';
require_once 'inc/class.queries.php';

Essential::setEnv();
Essential::startRouter();

//Kint::dump(getenv('DB_HOST'));
//Kint::dump(Essential::getConfig());