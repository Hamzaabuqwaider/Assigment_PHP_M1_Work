<?php

namespace Core;

/**
 * Controles the routing process in the app
 */
class Router
{
    // Request types
    // GET requests
    public static $get_routes = array();
    // POST requests
    public static $post_routes = array();
    // PUT requests
    public static $put_routes = array();
    // DELETE requests
    public static $delete_routes = array();


    /**
     * Including to the script based on the request_uri and method
     *
     * @return void
     */
    public static function redirect()
    {
        $request = $_SERVER['REQUEST_URI'];
        $routes = array();

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $routes = self::$get_routes;
                break;
            case 'POST':
                $routes = self::$post_routes;
                break;
            case 'PUT':
                $routes = self::$put_routes;
                break;
            case 'DELETE':
                $routes = self::$delete_routes;
                break;
        }

        if (empty($routes) || !array_key_exists($request, $routes)) {
            http_response_code(404);
            die('Page does not exists!');
        }

        $namespace = "Core\\Controller\\";
        $class_arr = explode(".", $routes[$request]);
        $class_name = ucfirst($class_arr[0]);
        $class = $namespace . $class_name;

        $instence = new $class;

        if (count($class_arr) == 2) {
            // call the method
            call_user_func(array($instence, $class_arr[1]));
        }

        $instence->render();
    }

    /**
     * add get route to the router
     *
     * @param String $route
     * @param String $controller
     * @return void
     */
    public static function get($route, $controller): void
    {
        // $this->get_routes[$route] = $controller; // ($this->) when we use the class as a instance (new)
        self::$get_routes[$route] = $controller; // (self::) when we use a static method/property in the class 
    }

    /**
     * add post route to the router
     *
     * @param String $route
     * @param String $controller
     * @return void
     */
    public static function post($route, $controller): void
    {
        self::$post_routes[$route] = $controller;
    }

    /**
     * add put route to the router
     *
     * @param String $route
     * @param String $controller
     * @return void
     */
    public static function put($route, $controller): void
    {
        self::$put_routes[$route] = $controller;
    }

    /**
     * add delete route to the router
     *
     * @param String $route
     * @param String $controller
     * @return void
     */
    public static function delete($route, $controller): void
    {
        self::$delete_routes[$route] = $controller;
    }
}
