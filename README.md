Web2 TrabajoEspecial Parte 3
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

Endpoint: localhost/web2/TPEWEBAPIREST-FULL/api/peliculas/:subrecurso


Crear una Nueva Pelicula (POST):

Endpoint: localhost/web2/TPEWEBAPIREST-FULL/api/peliculas

Ejemplo de solicitud POST en el body: { "Titulo": "Titulo Nuevo", "Anio": "2023", "Genero": "Terror", "Id_Director": 1 }


Actualizar una Pelicula por ID (PUT):

Endpoint: localhost/web2/TPEWEBAPIREST-FULL/api/peliculas/:ID

Ejemplo de solicitud PUT en el body: { "Titulo": "Actualizo Titulo", "Anio": "2024", "Genero": "Accion", "Id_Director": 3 }



Para la tabla de directores:
Obtener todos los directores(GET)
Endpoint: localhost/web2/TPE WEB API REST-FULL/api/director/


Obtener todos los directores (GET) ordenados por un campo y en cierta direccion (Opcional)
Posibles sort_by: Nombre, Edad, CantidadDepeliculas

sort_by: para el campo. sort_dir: para la dirección (asc o desc). Ejemplo de uso: localhost/web2/TPE WEB API REST-FULL/api/director?sort=Edad&order=asc


Obtener Director por ID (GET):
Endpoint: http://localhost/web2/TPE WEB API REST-FULL/api/director/:ID


Obtener subrecurso de un director por ID (GET):
Subrecursos posibles: Nombre, Edad, CantidadDePeliculas.

Endpoint: localhost/web2/TPEWEBAPIREST-FULL/api/director/:subrecurso

Listar Directores Filtrados por cualquier campo (GET):(Opcional)
Posibles filter_key: Titulo, Anio, Genero,Id_Director. filter_key: para el campo. filter_value: para su valor 
Ejemplo de uso: http://localhost/CARPETA/api/director?filter_key=CantidadDePeliculas&filter_value=10 (Por algun motivo tenemos mal el URL  y no sabemos que es)

Crear un Nuevo director (POST):

Endpoint: localhost/web2/TPEWEBAPIREST-FULL/api/director

Ejemplo de solicitud POST en el body: { "Nombre": "Nombre Nuevo", "Edad": "50", "CantidadDePeliculas": 10 }


Actualizar un director por ID (PUT):

Endpoint: localhost/web2/TPEWEBAPIREST-FULL/api/director/:ID

Ejemplo de solicitud PUT en el body: { "Nombre": "Actualizo Nombre", "Edad": "48", "Cantidad de peliculas": 7 }


Eliminar una director por ID (DELETE):

Endpoint: localhost/web2/TPEWEBAPIREST-FULL/api/director/:ID


Listar Directores Filtrados por cualquier campo (GET):(Opcional)
Posibles filter_key: Nombre, Edad, CantidadDePeliculas. filter_key: para el campo. filter_value: para su valor 
Ejemplo de uso: http://localhost/CARPETA/api/director?filter_key=CantidadDePeliculas&filter_value=10 (Por algun motivo tenemos malel URL  y no sabemos que es)
