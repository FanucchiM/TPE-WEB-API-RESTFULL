<?php
    require_once 'libs\router.php';
    require_once 'config.php';
    require_once "app\Controllers\MoviesController.php";
    require_once "app\Controllers\DirsController.php";



    $router = new Router();

    #PELICULAS           endpoint         verbo        controller          método
    $router->addRoute('peliculas',        'GET',    'MoviesController',   'get'   );
    $router->addRoute('peliculas',        'POST',   'MoviesController',   'create'   );
    $router->addRoute('peliculas/:ID',    'GET',    'MoviesController',   'get'   );
    $router->addRoute('peliculas/:ID/:subrecurso',    'GET',    'MoviesController',   'get'   );
    $router->addRoute('peliculas/:ID',  'DELETE',   'MoviesController',   'delete'   );
    $router->addRoute('peliculas/:ID',    'PUT',    'MoviesController',   'update'   );



    
    #DIRECTORES         endpoint         verbo        controller          método
    $router->addRoute('director',        'GET',    'DirsController',      'get'   );
    $router->addRoute('director',        'POST',   'DirsController',      'create'   );
    $router->addRoute('director/:ID',    'GET',    'DirsController',      'get'   );
    $router->addRoute('director/:ID/:subrecurso',    'GET',    'DirsController',   'get'   );
    $router->addRoute('director/:ID',  'DELETE',   'DirsController',      'delete'   );
    $router->addRoute('director/:ID',    'PUT',    'DirsController',      'update'   );






    

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);