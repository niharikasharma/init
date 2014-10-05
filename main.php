<?php

include __DIR__ . '/vendor/autoload.php';
include("src/init/connection.php");
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new Silex\Application();

$app->get('/', function () {
    return init\Foo::bar();
});

$app->get('/listAllTodos', function () {
    return init\Foo::listAllTodos();
});


$app->get('/singleTodo/{id}', function ($id) {
$blogPosts = init\Foo::getTodo($id);
return $blogPosts;
});

$app->put('/updateTodo/{id}/{todo}', function ($id, $todo) {

$todo = htmlspecialchars($todo);
$blogPosts = init\Foo::updateTodo($id, $todo);
return $blogPosts;
});

$app->post('/createTodo', function (Request $request) use ($app) {
$todo = $request->get('todo');
return init\Foo::createTodo($todo);
});


// define your routes here
