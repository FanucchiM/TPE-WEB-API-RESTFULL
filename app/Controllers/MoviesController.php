<?php

require_once 'app/Controllers/ApiController.php';
require_once 'app/Models/MoviesModel.php';



class MoviesController extends ApiController{
    private $model;



    public function __construct() {
        
        parent::__construct();
        $this->model = new MoviesModel();
        
    }

    private function sort($movies, $field) {
        switch ($field) {
            case 'Titulo':
                usort($movies, function($a, $b){
                    return strcmp($a->Titulo,$b->Titulo);
                });
                break;
            case 'Anio':
                usort($movies, function($a, $b){
                    return $a->Anio - $b->Anio;
                });
                break;
            case 'Genero':
                usort($movies, function($a, $b){
                    return strcmp($a->Genero,$b->Genero);
                });
                break;
            case 'Id_Director':
                usort($movies, function($a, $b){
                    return $a->Id_Director - $b->Id_Director;
                });
                break;
            default:
        }
        
        if (!empty($_GET["order"]) && $_GET["order"] == "desc") {
            $movies = array_reverse($movies);
        }

        return $movies;
    }

    private function filter($movies) {
        if (!empty($_GET["Titulo"])) {
            for ($i=0; $i < count($movies); $i++) { 
                if ($movies[$i]->Titulo != $_GET["Titulo"]) {
                    array_splice($movies, $i, 1);
                }
            }
        }
        
        if (!empty($_GET["Anio"])) {
            for ($i=0; $i < count($movies); $i++) { 
                if ($movies[$i]->Anio != $_GET["Anio"]) {
                    array_splice($movies, $i, 1);
                }
            }
        }
        
        if (!empty($_GET["Genero"])) {
            for ($i=0; $i < count($movies); $i++) { 
                if ($movies[$i]->Genero != $_GET["Genero"]) {
                    array_splice($movies, $i, 1);
                }
            }
        }
        
        if (!empty($_GET["Id_Director"])) {
            for ($i=0; $i < count($movies); $i++) { 
                if ($movies[$i]->Id_Director != $_GET["Id_Director"]) {
                    array_splice($movies, $i, 1);
                }
            }
        }

        return $movies;
    }

    public function get($params = []) {
        if (empty($params[":ID"])) {
            $movies = $this->model->getMovies();

            $movies = $this->filter($movies);

            if (!empty($_GET["sort"])) {
                $movies = $this->sort($movies, $_GET["sort"]);
            }

            $this->view->response($movies, 200);
            return;
        }

        $movie = $this->model->getMovie($params[":ID"]);

        if (empty($movie)) {
            $this->view->response("La pelicula con el ID " . $params[":ID"] . " no existe.", 404);
            return;
        }

        if (empty($params[":subrecurso"])) {
            $this->view->response($movie, 200);
            return;
        }

        switch ($params[":subrecurso"]) {
            case 'Titulo':
                $this->view->response($movie->Titulo, 200);
                break;
            case 'Anio':
                $this->view->response($movie->Anio, 200);
                break;
            case 'Genero':
                $this->view->response($movie->Genero, 200);
                break;
            case 'Id_Director':
                $this->view->response($movie->Id_Director, 200);
                break;
            default:
                $this->view->response("El subrecurso no existe.", 400);
                break;
        }
    }
    function delete ($params = []){
        $id = $params[':ID'];
        $movie = $this->model->getMovie($id);

        if($movie){
            $movie = $this->model->DeleteMovie($id);
            $this->view-> response('La pelicula con el id '. $params[':ID']. ' ha sido borrada', 200);
        } else {
            $this->view-> response('La pelicula con el id '. $params[':ID']. ' no existe', 404);
        }

    }

    function create ($params = []){
        $body = $this -> getData();

        $Titulo = $body->Titulo;
        $Anio = $body->Anio;
        $Genero = $body->Genero;
        $Id_Director = $body->Id_Director;

        $id = $this->model->InsertMovie($Titulo, $Anio, $Genero, $Id_Director); 
        $this->view-> response('La pelicula fue agregada con el id = '.$id, 201);

    }


    function update ($params = []){
        $id = $params[':ID'];
        $movie = $this->model->getMovie($id);

        if($movie){
            $body = $this -> getData();

            $Titulo = $body->Titulo;
            $Anio = $body->Anio;
            $Genero = $body->Genero;
            $Id_Director = $body->Id_Director;
            $this->model->updateMovie($id, $Titulo, $Anio, $Genero, $Id_Director); 

            $this->view-> response('La pelicula con el id '. $params[':ID']. ' ha sido editada', 200);
        } else {
            $this->view-> response('La pelicula con el id '. $params[':ID']. ' no existe', 404);
        }
    }
}