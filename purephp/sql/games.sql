
-- Esta tabla es solo para los admisnitradores
-- Web para hacer diagramas:https://app.diagrams.net/
-- id
-- title
-- COVER
-- author
-- country
-- publisher
-- developer
-- year
-- format: cassete, disk, cardbridge
-- genre: puzzle, Strategy
-- system
-- programming: MSX Basic, assambler, 
-- sound:psg, scc, fm
-- control: keyboard
-- players: 1,2
-- languages: spanish, english
-- file
-- screenshot
-- iGoIt: yes, not
-- broken: yes, not
-- observations: la carátula es una fotocopia, el plástico no tiene la marca cbs

--Tipos de datos en Mysql
--Numericos: bit, boolean, smallint,int, float, double, real
--Cadena: char, varchar, tinytext,text, longtext
--fecha: date, datetime, timestamp time, year 
--json: json
--
-- Crear tabla juegos
-- Para crear esta tabla 1 tendrás que crear la tabla users

CREATE TABLE `games` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(100) NOT NULL,
    `cover` int(11) NOT NULL DEFAULT '1',
    `instructions` text(100) NOT NULL,
    `country` varchar(50) NOT NULL,
    `publisher` varchar(100) NOT NULL,
    `developer` varchar(100) NOT NULL,
    `year` smallint(4) UNSIGNED NOT NULL DEFAULT '1',
    `format` varchar(50) NOT NULL,
    `genre` varchar(50) NOT NULL,
    `system` varchar(50) NOT NULL,
    `programming` varchar(50) NOT NULL,
    `sound` varchar(50) NOT NULL,
    `control` varchar(50) NOT NULL,
    `players` varchar(50) NOT NULL,
    `languages` varchar(50) NOT NULL,
    `file` int(11) NOT NULL DEFAULT '1',
    `screenshot` int(11) NOT NULL DEFAULT '1',
    `video` int(11) NOT NULL DEFAULT '1',
    `iGoIt` smallint(2) NOT NULL DEFAULT '1',
    `broken` smallint(2) NOT NULL DEFAULT '1',
    `observations` varchar(100) NOT NULL,
    `user` int(10) NOT NULL,
    UNIQUE KEY `ID` (`id`),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


--
-- Borrar tabla juegos
-- Drop table games;
--


--
-- Insertar juegos
--
INSERT INTO `games` (`id`, `title`, `instructions`, `country`, `publisher`, `developer`, `year`, `format`, `genre`, `system`, `programming`, `sound`, `control`, `players`, `languages`, `file`, `screenshot`, `video`, `iGoIt`, `observations`) VALUES
(1, 'Mad mix game', 'Vuelta de pacman\r\n----\r\nPacman return', '', '', 'Toposoft', 0, '', '', '', '', '', '', '', '', 0, 0, 0, 0, '');


--
-- Borrar juegos
-- delete from games;
--
