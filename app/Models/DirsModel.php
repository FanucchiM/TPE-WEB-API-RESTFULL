<?php


require_once 'app/Models/Model.php';


class DirsModel extends Model{


    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getDirs() {
        $query = $this->db->prepare('SELECT * FROM director');
        $query->execute();

        // $movies es un arreglo de tareas
        $dirs = $query->fetchAll(PDO::FETCH_OBJ);

        return $dirs;
    }
    function getDir($id) {
        $query = $this->db->prepare('SELECT * FROM director WHERE id = ?');
        $query->execute([$id]);

        // $movies es un arreglo de tareas
        $dir = $query->fetch(PDO::FETCH_OBJ);

        return $dir;
    }
    function deleteDir($id) {
        $query = $this->db->prepare('DELETE FROM director WHERE id = ?');
        $query->execute([$id]);
        
    }

    public function InsertDirector($Nombre, $Edad, $CantidadDePeliculas) {
        $query = $this->db->prepare('INSERT INTO director (Nombre, Edad, CantidadDePeliculas) VALUES (?, ?, ?)');
        $query->execute([$Nombre, $Edad, $CantidadDePeliculas]);

        return $this->db->lastInsertId();
    }


    public function updateDirector($id, $Nombre, $Edad, $CantidadDePeliculas) {
        $query = $this->db->prepare('UPDATE director SET Nombre = ?, Edad = ?, CantidadDePeliculas = ? WHERE id = ?');
        $query->execute([$Nombre, $Edad, $CantidadDePeliculas, $id]);
    }

}