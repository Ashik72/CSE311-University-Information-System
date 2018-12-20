<?php

use Dotenv\Dotenv;
use Klein\Klein;

class Essential {

    public static function setEnv() {
        $dotenv = new Dotenv(dirname("../"));
        $dotenv->load();
        $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
    }

    public static function startRouter() {

        $klein = new \Klein\Klein();

       // $router_yaml = file_get_contents("../router.yaml")

        $klein->respond('GET', '/login', function () {
            return (new self())->renderLoginPage();
        });

        $klein->dispatch();

    }

    public static function doStatic() {
        echo "Static text";
    }

    public function renderLoginPage() {
        return "dsdfs";
    }

    }