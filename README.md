Web2TrabajoEspecial Parte 3
Integrantes del grupo:

Fanucchi, Matias Julian     Email: matiasfanucchi99@gmail.com

Meo Schiavone, Manuel Jesus Email: manujschia@gmail.com

Descripción:

Temática del Trabajo Practico Especial: Pagina de peliculas

Usar Postman


Documentacion de Endpoints:
CARPETA representaria la carpeta en donde estan los archivos de este trabajo, poner el nombre correspondiente.


Para la tabla de peliculas:
Obtener todos las peliculas(GET)
Endpoint: localhost/web2/TPE WEB API REST-FULL/api/peliculas/


Obtener todos las peliculas (GET) ordenados por un campo y en cierta direccion (Opcional)
Posibles sort_by: Titulo, Anio, Genero ,Id_Director..

sort_by: para el campo. sort_dir: para la dirección (asc o desc). Ejemplo de uso: localhost/web2/TPE WEB API REST-FULL/api/peliculas?sort=Anio&order=asc


Obtener Pelicula por ID (GET):
Endpoint: http://localhost/web2/TPE WEB API REST-FULL/api/peliculas/:ID


Obtener subrecurso de una Pelicula por ID (GET):
Subrecursos posibles: Titulo, Anio, Genero ,Id_Director.

Endpoint: localhost/web2/TPE WEB API REST-FULL/api/peliculas/:subrecurso


Crear una Nueva Pelicula (POST):

Endpoint: localhost/web2/TPE WEB API REST-FULL/api/peliculas

Ejemplo de solicitud POST en el body: { "Titulo": "Titulo Nuevo", "Anio": "2023", "Genero": "Terror", "Id_Director": 1 }


Actualizar una Pelicula por ID (PUT):

Endpoint: localhost/web2/TPE WEB API REST-FULL/api/peliculas/:ID

Ejemplo de solicitud PUT en el body: { "Titulo": "Actualizo Titulo", "Anio": "2024", "Genero": "Accion", "Id_Director": 3 }


Eliminar una Pelicula por ID (DELETE):

Endpoint: localhost/web2/TPE WEB API REST-FULL/api/peliculas/:ID

