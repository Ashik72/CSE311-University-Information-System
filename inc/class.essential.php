<?php

use Dotenv\Dotenv;
use Klein\Klein;
use PHPAuth\Config as PHPAuthConfig;
use PHPAuth\Auth as PHPAuth;

class Essential {

    public static function setEnv() {
        $dotenv = new Dotenv(dirname("../"));
        $dotenv->load();
        $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
    }

    public static function startRouter() {

        $klein = new \Klein\Klein();

        $GLOBALS['error'] = [];
        $auth = self::makeAuth();
        $GLOBALS['auth'] = $auth;
        //Kint::dump($auth->register("ashik@noksa.net", "noksaweb@2", "noksaweb@2"));

        if (!$auth->isLogged()) {


            $klein->respond('GET', '/', function () {
                return (new self())->renderLoginPage();
            });

            $klein->respond('POST', '/', function () {
                $try_auth = $GLOBALS['auth']->login($_POST['email'], $_POST['password'], !empty($_POST['remember']));

                if (isset($try_auth['error']) && !empty($try_auth['error'])) {
                    $GLOBALS['error'] = $try_auth;
                    return (new self())->renderLoginPage();
                }

                header("Refresh:0");
            });

        } else {

            $klein->respond('GET', '/signout', function() use ($auth) {
                $auth->logout($auth->getCurrentSessionHash());
                header("location: /");
                die();
            });

            $router_yaml = Spyc::YAMLLoad(dirname(dirname(__FILE__))."/router.yaml");

            foreach ($router_yaml as $route_name => $route_data) {
                $GLOBALS['current_route'] = $route_data;
                $GLOBALS['global_route'] = $router_yaml;

                $klein->respond($route_data[2], $route_data[0], function ($request, $response, $service) use ($route_data, $route_name, $auth) {

                    $GLOBALS['config_data'] = self::getConfig();
                    $return_data = self::view("header", ["config_data" => self::getConfig(), 'user_data' => $auth->getCurrentUser()]);

                    $return_data .= self::view("main_layout", ["config_data" => self::getConfig(), 'routes' => $GLOBALS['global_route'], 'this_route' => $route_name, 'parsed_data' => Essential::parsed_data($route_data[1])]);

                    $return_data .= self::view("footer", ["config_data" => self::getConfig()]);

                    return $return_data;
                });
            }



        }

        $klein->onHttpError(function ($code, $router) {
            if ($code >= 400 && $code < 500) {
                $router->response()->body(
                    'Oh no, a bad error happened that caused a '. $code ."! Are you logged in?"
                );
            } elseif ($code >= 500 && $code <= 599) {
                error_log('uhhh, something bad happened');
            }
        });


        $klein->dispatch();

    }

    public static function parsed_data($action = "") {

        $action_dot = explode(".", $action);
        $action_slash = explode("/", $action);

        ob_start();

        if (is_array($action_dot) && !empty($action_dot) && (count($action_dot) >= 2)) {
            try {
                call_user_func([$action_dot[0], $action_dot[1]]);
            } catch (Exception $e) {
                print $e;
            }
        } elseif (is_array($action_slash) && !empty($action_slash) && (count($action_slash) >= 2)) {
            try {
                echo self::view($action_slash[1], [],$action_slash[0]);
            } catch (Exception $e) {
                print $e;
            }
        }

        $output = ob_get_clean();
        return $output;
    }

    public static function makeAuth() {

        $dbh = new PDO("mysql:host=".getenv("DB_HOST").";dbname=".getenv("DB_NAME")."", "".getenv("DB_USER")."", "".getenv("DB_PASS")."");

        $config = new PHPAuthConfig($dbh);
        $auth = new PHPAuth($dbh, $config);
        $GLOBALS['db'] = $dbh;
        return $auth;
    }

    public static function runQuery( $sql = "", $vars = []) {
        if (empty($sql)) return;
        $dbh = $GLOBALS['db'];
        $stmt = $dbh->prepare($sql);
        $stmt->execute($vars);
        //$stmt->fetch()

        return $stmt;
    }


    public static function getConfig() {
        return include "config.php";
    }

    public static function doStatic() {
        echo "Static text";
    }

    public function renderLoginPage() {
        return self::view("login", ['config' => self::getConfig(), 'error' => $GLOBALS['error']]);
    }

    public static function view($template_name, $data = array(), $path = "views")
    {
        $loader = new Twig_Loader_Filesystem($path);
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate($template_name . '.html');
        echo $template->render($data);
    }

    public static function array_key_first(array $array) {
        if (count($array)) {
            reset($array);
            return key($array);
        }

        return null;
    }

    public static function makeTable($query) {

        $query_data = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC))
            $query_data[] = $row;

        if (empty($query_data)) return;

        $headers = [];
        $headers_array = $query_data[0];
        $headers_array = array_keys($headers_array);

        ob_start();
        echo self::view("datatable", ['data' => $query_data, 'headers' => $headers_array]);
        $output = ob_get_clean();
        echo $output;

    }

}