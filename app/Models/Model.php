<?php



    class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            // Verifica si la base de datos existe, si no lo hace la crea
            $this->db->exec('CREATE DATABASE IF NOT EXISTS ' . MYSQL_DB);
            $this->db->exec('USE ' . MYSQL_DB);
            $this->deploy();
        }

        function deploy() {
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql =<<<END
                --
                -- Estructura de tabla para la tabla `tpe`
                --
                
                CREATE TABLE `director` (
                  `id` int(11) NOT NULL,
                  `Nombre` varchar(45) NOT NULL,
                  `Edad` int(45) NOT NULL,
                  `CantidadDePeliculas` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                
                --
                -- Volcado de datos para la tabla `tareas`
                --
                
                INSERT INTO `tareas` (`id`, `titulo`, `descripcion`, `prioridad`, `finalizada`) VALUES
                (25, 'asdsa', 'asdasd', 1, 0),
                (26, 'Titulo modificado', 'Una descripcion', 87, 0),
                (27, 'Nuevo titulo', 'Otra descripcion', 2, 0);
                
                --
                -- Volcado de datos para la tabla `director`
                --
                
                --
                INSERT INTO `director` (`id`, `Nombre`, `Edad`, `CantidadDePeliculas`) VALUES
                (1, 'David Fincher', 51, 7),
                (2, 'James Cameron', 63, 9),
                (3, 'Martin Scorsese', 82, 17),
                (4, 'Christopher Nolan', 53, 12),
                (5, 'Peter Jackson', 61, 11),
                (17, 'David Fincher', 51, 8),
                (19, 'Tarkovsky', 23, 1),
                (20, 'messi', 54, 12),
                (21, 'Kubrick', 23, 2);


                -- Estructura de tabla para la tabla `peliculas`
                --
                CREATE TABLE `peliculas` (
                  `id` int(100) NOT NULL,
                  `Titulo` varchar(100) NOT NULL,
                  `Anio` int(100) NOT NULL,
                  `Genero` varchar(100) NOT NULL,
                  `Id_Director` int(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `peliculas`
                --
                INSERT INTO `peliculas` (`id`, `Titulo`, `Anio`, `Genero`, `Id_Director`) VALUES
                (22, 'Toyota 2', 1945, 'Peliculoso', 1),
                (24, 'Messi', 2023, 'ok', 1),
                (31, 'Titanic 2', 1234, 'Drama', 1);

                -- --------------------------------------------------------
                --
                -- Estructura de tabla para la tabla `usuarios`
                --
                CREATE TABLE `usuarios` (
                  `Id` int(11) NOT NULL,
                  `username` varchar(50) NOT NULL,
                  `password` varchar(110) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  
                --
                -- Volcado de datos para la tabla `usuarios`
                --

                INSERT INTO `usuarios` (`Id`, `username`, `password`) VALUES
                (1, '', '0'),
                (3, 'tpeweb2', 'hola123');

                --
                -- Índices para tablas volcadas
                --

                -- 
                -- Indices de la tabla `director`
                --
                ALTER TABLE `director`
                ADD PRIMARY KEY (`id`);

                --
                -- Indices de la tabla `peliculas`
                --
                ALTER TABLE `peliculas`
                ADD PRIMARY KEY (`id`),
                ADD KEY `Id_Director` (`Id_Director`);

                --
                -- Indices de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                ADD PRIMARY KEY (`Id`);
                
                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `director`
                --

                ALTER TABLE `director`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

                --
                -- AUTO_INCREMENT de la tabla `peliculas`
                --
                ALTER TABLE `peliculas`
                MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

                --
                -- AUTO_INCREMENT de la tabla `usuarios`
                --

                ALTER TABLE `usuarios`
                MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `peliculas`
                --
                ALTER TABLE `peliculas`
                ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`Id_Director`) REFERENCES `director` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
                COMMIT;

                END;
                $this->db->query($sql);
            }
            
        }
    }