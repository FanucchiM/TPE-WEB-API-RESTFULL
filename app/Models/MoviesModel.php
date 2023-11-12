<?php


require_once 'app/Models/Model.php';


class MoviesModel extends Model {
   

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getMovies() {
        $query = $this->db->prepare('SELECT * FROM peliculas');
        $query->execute();

        // $movies es un arreglo de tareas
        $movies = $query->fetchAll(PDO::FETCH_OBJ);

        return $movies;
    }
    function getMovie($id) {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id = ?');
        $query->execute([$id]);

        // $movies es un arreglo de tareas
        $movie = $query->fetch(PDO::FETCH_OBJ);

        return $movie;
    }
    function deleteMovie($id) {
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id = ?');
        $query->execute([$id]);
        
    }

    public function InsertMovie($Titulo, $Anio, $Genero, $Id_Director) {
        $query = $this->db->prepare('INSERT INTO peliculas (Titulo, Anio, Genero, Id_Director) VALUES (?, ?, ?, ?)');
        $query->execute([$Titulo, $Anio, $Genero, $Id_Director]);

        return $this->db->lastInsertId();
    }


    public function updateMovie($id, $Titulo, $Anio, $Genero, $Id_Director) {
        $query = $this->db->prepare('UPDATE peliculas SET Titulo = ?, Anio = ?, Genero = ?, Id_Director = ? WHERE id = ?');
        $query->execute([$Titulo, $Anio, $Genero, $Id_Director, $id]);
    }

}