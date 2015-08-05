<?php

define('STARTUP_TIME', microtime(true));

require '../vendor/autoload.php';

// setup database
ORM::configure('mysql:host=localhost;dbname=blog');
ORM::configure('username', 'root');
ORM::configure('password', '');

$app = new Slim\Slim(array(
    'debug' => true,
    'view' => new \Slim\Views\Twig(),
));

$app->add(new \Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware);

$view = $app->view();

$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);

$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$app->get('/', function () use ($app) {

    $categories = \Model::factory('Jastew\Models\Category')->find_many();
    $articles = \Model::factory('Jastew\Models\Article')->find_many();

    $app->render('home.twig', array(
        'categories' => $categories,
        'articles'   => $articles,
    ));

});

//$app->get('/category/:id', function ($id) use ($app) {
//
//    $category = Model::factory('\Jastew\Models\Category')->find_one($id);
//    /* @var $category \Jastew\Models\Category */
//
//    $articles = $category->getArticles()->find_many();
//
//    $app->render('category.phtml', array(
//        'category' => $category,
//        'articles' => $articles
//    ));
//
//});
//
//$app->get('/article/:id', function ($id) use ($app) {
//
//    $article = Model::factory('\Jastew\Models\Article')->find_one($id);
//    /* @var $category \Jastew\Models\Category */
//
//    $categories = $article->getCategories()->find_many();
//
//    $app->render('article.phtml', array(
//        'article' => $article,
//        'categories' => $categories
//    ));
//
//});

$app->run();

echo microtime(true) - STARTUP_TIME;