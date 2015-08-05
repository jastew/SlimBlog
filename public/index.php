<?php

define('STARTUP_TIME', microtime(true));

require '../vendor/autoload.php';

// setup database
ORM::configure('mysql:host=localhost;dbname=blog');
ORM::configure('username', 'root');
ORM::configure('password', '');

$app = new Slim\Slim(array(
    'debug' => true
));

//$app->add(new \Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware);

$app->get('/', function () {

    $article = \Model::factory('Jastew\Models\Article')->find_one();

    /* @var $article \Jastew\Models\Article */
    echo $article->getName();

    $articleCategories = $article->getCategories()->find_many();

    foreach ($articleCategories as $articleCategory) {
        var_dump($articleCategory->get('name'));
    }

    //$category = $article->categories()->find_many();

    var_dump($article->as_array());

});

$app->run();

echo microtime(true) - STARTUP_TIME;