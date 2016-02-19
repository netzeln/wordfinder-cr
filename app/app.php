<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/WordFinder.php";


    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=>__DIR__."/../views"
    ));

    $app->get('/', function() use ($app){
        return $app['twig']->render("index.html.twig");
    });

    $app->get('/display', function() use ($app){
        $newWordFinder = new WordFinder($_GET['word'], $_GET['sentence']);
        echo($_GET['pluralOK']);
        if($_GET['pluralOK'] == "yes")
        {
            $count = $newWordFinder->countWordsPluralOK();
        }
        else {
            $count = $newWordFinder->countWords();
        }

      return $app['twig']->render("index.html.twig", array('count' => $count, 'word' => $_GET['word'], 'sentence' => $_GET['sentence']));
    });



    return $app;
 ?>
