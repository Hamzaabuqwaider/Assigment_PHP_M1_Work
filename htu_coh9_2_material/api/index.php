<?php

use Core\Router;
// use Functional\Router as FunctionalRouter;

// include './Core/Router.php';
// include './Core/Controller/Items.php';
// INSTEAD OF
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", "/", $class_name);
    require_once __DIR__ . "/" . $class_name . ".php";
});

// Demo
// $second_router = new FunctionalRouter();

// Defining app routes
Router::get('/', 'front');
Router::get('/items', 'items.index');
Router::get('/items/single', 'items.single');
Router::post('/items/create', 'items.create');
Router::put('/items/update', 'items.update');
Router::delete('/items/delete', 'items.delete');

// Redirecting to the script based on the request_uri and method
Router::redirect();
