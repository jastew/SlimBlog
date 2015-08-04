<?php
ini_set('display_errors', 1);
error_reporting(~0);

require '../vendor/autoload.php';

// setup database
ORM::configure('mysql:host=localhost;dbname=blog');
ORM::configure('username', 'root');
ORM::configure('password', 'admin');

$app = new Slim\Slim(array(
    'debug' => true
));

$app->get('/', function () {

    $article = \Model::factory('Jastew\Models\Article')->find_one();
    /* @var $article \Jastew\Models\Article */
    $category = $article->categories()->find_many();

    var_dump($article);

});

$app->run();