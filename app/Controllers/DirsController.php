<?php

require_once 'app/Controllers/ApiController.php';
require_once 'app/Models/DirsModel.php';



class DirsController extends ApiController{
    private $model;



    public function __construct() {
        
        parent::__construct();
        $this->model = new DirsModel();
        
    }

    private function sort($dirs, $field) {
        switch ($field) {
            case 'Nombre':
                usort($dirs, function($a, $b){
                    return strcmp($a->Nombre,$b->Nombre);
                });
                break;
            case 'Edad':
                usort($dirs, function($a, $b){
                    return $a->Edad - $b->Edad;
                });
                break;
            case 'CantidadDePeliculas':
                usort($dirs, function($a, $b){
                    return strcmp($a->CantidadDePeliculas,$b->CantidadDePeliculas);
                });
                break;
            default:
        }
        
        if (!empty($_GET["order"]) && $_GET["order"] == "desc") {
            $dirs = array_reverse($dirs);
        }

        return $dirs;
    }

    private function filter($dirs) {
        if (!empty($_GET["Titulo"])) {
            for ($i=0; $i < count($dirs); $i++) { 
                if ($dirs[$i]->Nombre != $_GET["Nombre"]) {
                    array_splice($dirs, $i, 1);
                }
            }
        }
        
        if (!empty($_GET["Edad"])) {
            for ($i=0; $i < count($dirs); $i++) { 
                if ($dirs[$i]->Edad != $_GET["Edad"]) {
                    array_splice($dirs, $i, 1);
                }
            }
        }
        
        if (!empty($_GET["CantidadDePeliculas"])) {
            for ($i=0; $i < count($dirs); $i++) { 
                if ($dirs[$i]->CantidadDePeliculas != $_GET["CantidadDePeliculas"]) {
                    array_splice($dirs, $i, 1);
                }
            }
        }

        return $dirs;
    }

    public function get($params = []) {
        if (empty($params[":ID"])) {
            $dirs = $this->model->getDirs();

            $dirs = $this->filter($dirs);

            if (!empty($_GET["sort"])) {
                $dirs = $this->sort($dirs, $_GET["sort"]);
            }

            $this->view->response($dirs, 200);
            return;
        }

        $dir = $this->model->getDir($params[":ID"]);

        if (empty($dir)) {
            $this->view->response("La pelicula con el ID " . $params[":ID"] . " no existe.", 404);
            return;
        }

        if (empty($params[":subrecurso"])) {
            $this->view->response($dir, 200);
            return;
        }

        switch ($params[":subrecurso"]) {
            case 'Nombre':
                $this->view->response($dir->Nombre, 200);
                break;
            case 'Edad':
                $this->view->response($dir->Edad, 200);
                break;
            case 'CantidadDePeliculas':
                $this->view->response($dir->CantidadDePeliculas, 200);
                break;
            default:
                $this->view->response("El subrecurso no existe.", 400);
                break;
        }
    }
    function delete ($params = []){
        $id = $params[':ID'];
        $dir = $this->model->getDir($id);

        if($dir){
            $dir = $this->model->DeleteDir($id);
            $this->view-> response('El director con el id '. $params[':ID']. ' ha sido borrado', 200);
        } else {
            $this->view-> response('El director con el id '. $params[':ID']. ' no existe', 404);
        }

    }

    function create ($params = []){
        $body = $this -> getData();

        $Nombre = $body->Nombre;
        $Edad = $body->Edad;
        $CantidadDePeliculas = $body->CantidadDePeliculas;

        $id = $this->model->InsertDirector($Nombre, $Edad, $CantidadDePeliculas); 
        $this->view-> response('El director fue agregado con el id = '.$id, 201);

    }
    function update ($params = []){
        $id = $params[':ID'];
        $movie = $this->model->getDir($id);

        if($movie){
            $body = $this -> getData();

            $Nombre = $body->Nombre;
            $Edad = $body->Edad;
            $CantidadDePeliculas = $body->CantidadDePeliculas;

            $this->model->updateDirector($id, $Nombre, $Edad, $CantidadDePeliculas); 

            $this->view-> response('El director con el id '. $params[':ID']. ' ha sido editado', 200);
        } else {
            $this->view-> response('El director con el id '. $params[':ID']. ' no existe', 404);
        }
    }

}