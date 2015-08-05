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

    $categories = $article->getCategories()->find_many();

    foreach ($categories as $category) {
        var_dump($category->get('name'));
    }

    //$category = $article->categories()->find_many();

    var_dump($article->as_array());

});

$app->get('/category/:id', function ($id) use ($app) {

    $category = Model::factory('\Jastew\Models\Category')->find_one($id);
    /* @var $category \Jastew\Models\Category */

    $articles = $category->getArticles()->find_many();

    $app->render('category.phtml', array(
        'category' => $category,
        'articles' => $articles
    ));

});

$app->get('/article/:id', function ($id) use ($app) {

    $article = Model::factory('\Jastew\Models\Article')->find_one($id);
    /* @var $category \Jastew\Models\Category */

    $categories = $article->getCategories()->find_many();

    $app->render('article.phtml', array(
        'article' => $article,
        'categories' => $categories
    ));

});

$app->run();

echo microtime(true) - STARTUP_TIME;