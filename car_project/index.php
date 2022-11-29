<?php

use Core\Router;
// use Functional\Router as FunctionalRouter;

// include './Core/Router.php';
// include './Core/Controller/cars.php';
// INSTEAD OF
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", "/", $class_name);
    require_once __DIR__ . "/" . $class_name . ".php";
    // var_dump($class_name);
});

// Demo
// $second_router = new FunctionalRouter();

// Defining app routes
Router::get('/', 'cars');
Router::get('/cars', 'cars.index');
Router::get('/cars/single', 'cars.single');
Router::post('/cars/create', 'cars.create');
Router::put('/cars/update', 'cars.update');
Router::delete('/cars/delete', 'cars.delete');

// Redirecting to the script based on the request_uri and method
Router::redirect();
