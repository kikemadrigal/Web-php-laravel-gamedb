
-- Para crear esta tabla 1 tendrás que crear la tabla users
CREATE TABLE `gamesUsers` ( 
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
    `web` int(11) NOT NULL DEFAULT '1',
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
-- Drop table gamesUsers;
--

INSERT INTO `gamesUsers` (`id`, `title`, `cover`, `instructions`, `country`, `publisher`, `developer`, `year`, `format`, `genre`, `system`, `programming`, `sound`, `control`, `players`, `languages`, `file`, `screenshot`, `video`, `web`, `iGoIt`, `broken`, `observations`, `user`) VALUES
(1, 'Mad mix game', 6, 'Vuelta de pacman\r\n----\r\nPacman return', '', 'Toposoft', 'Desconocido', 1, 'Cassette', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 0, '', 186),
(2, 'colt 36', 5, 'Sumérgete en el viejo oeste y lucha contra las tribus indias y bandoleros en defensa de la ley', '', 'Toposoft', 'Toposoft', 1, 'Cassette', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, 'Este juego es exclusivo de toposoft para el sistema MSX', 186),
(3, 'Spirits', 7, 'No te atrevas a mirar la esfera', '', 'Toposoft', 'Desconocido', 1, 'Casstte', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, 'Port de spectrum\r\nhttps://www.youtube.com/watch?v=yXVgVji53HM&t=515s\r\nEL cassete no es CBS', 186),
(4, 'Tuareg', 9, 'Durante tres días con sus respectivas noches, Ben Yossef tendrá que vivir una excitante aventura llena de peligros en la ciudad de Marraquech. Su misión consiste de liberar de sus raptores a la princesa Ait-Amar.Disfruta con la primera aventura totalmente', '', 'Toposoft', 'Toposoft', 1, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, 'El cassette no es CBS', 186),
(5, 'start dust', 8, 'Un autentico alarde de técnica se ha desarrollado en este juego para que cuando lo cargues en tu ordenador, puedas jugar con la mayor aventura espacial que jamás hayas visto,\r\nCuatro planos de fondo en continuo movimiento y una continua sensación de profu', '', 'Toposoft', 'Toposoft', 1, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, 'https://www.youtube.com/watch?v=L4OkaKIFIaQ\r\nEl cassette no es CBS\r\nFunciona pero cuando te matan se', 186),
(6, 'Out run', 11, '', '', 'Erbe', 'Sega', 1, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(7, 'Robocop', 20, '', '', 'Erbe', 'Desconocido', 1986, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(8, 'World games', 12, '', '', 'Erbe', 'Epix', 1, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 1, 1, '', 186),
(9, 'Arkanoid', 16, 'El mayor exito del mndo, Un juego que no va de naves ni de luchas, nide guerras, solo de habilidad y reflejos. Arkanoid es un juego en el que la rapidez es tu reto, Y además puedes ganar una fabulosa máquina de video-juejos.', '', 'Erbe', 'Imagine the name of the game', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 0, 0, 1, '', 186),
(10, 'Winter games', 13, '', '', 'Erbe', 'Epix', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(11, 'Head over heels', 14, 'El program del año en Europa.Los mismos programadores que hicieron batam han creado este fabuloso juego más completo aún en gráficos. 321 pantallas francamente increibles han hecho que head over heels haya sorprendido a todos los públicos.\r\n..Un juego que', '', 'Erbe', 'Ocean', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(12, 'Gaunlet', 10, 'Este es un mundo de monstruos y laberintos. Viaja por los senderos del misterio y combate en busca del amilemnte que te dará la energía. Tu camino estará repleto de peligrosos monstruos y legiones de enemigos, pero no estás solo en busca de alimentos, tes', '', 'Erbe', 'US gold', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(13, 'Donkey kong', 15, 'Un clásico de todos los tiempo en el mundo de los videojuegos, ahora disponible para tu ordenador. Preparate a saltar, hacer equilibrios y esquibar los toneles que el gorila gigante te irá arrojando para evitar que rescates a la chica que tiene cautiva. D', '', 'Erbe', 'Ocean', 0, 'Cassete', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(14, 'Grogs revenge', 17, 'El programa que te transporta a la prehistoria, con un simpático troglodita que acaba de descubrir la piedro-bici.Tendrás que hacer mil y una peripecias a través de los abismos y las cavernas de aquella época.¡¡Gráficos y movimiento fantásticos!!', '', 'Erbe', 'Us Gold', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 0, '', 186),
(15, 'Emilio Butragueño', 18, 'Emilio Butragueño, el futbolista número 1, merecía el mejor videojuego.\r\nEl alarde de técnica que ha resuelto los gráficos y los moviemientos de los jugadores con tal perfección que necesitarás poner en juego toda tu habilidad y experiencia. ¡Haz equipo c', '', 'Toposoft', 'Toposoft', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 0, '', 186),
(16, 'Nuclear bowls', 19, 'ALERTA ROJA...ALERTA ROJA\r\nALERTA ROJA...ALERTA ROJA\r\nQueda poco tiempo para reparar el reactor nueclar más potente de la tierra. Aprovéchalo...', 'Spain', 'Zigurat', 'Diabolic', 1986, 'Cassette', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 0, 'El cassette funciona', 186),
(17, 'Jabato', 21, '', '', 'Aventuras AD', 'Aventuras AD', 1989, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 0, 0, 1, 'https://www.generation-msx.nl/software/aventuras-ad/jabato/2098/', 186),
(18, 'Manic miner', 30, '', '', 'Software projects', 'Software Projects', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 0, 'La carátula es una fotocopia', 186),
(19, 'tawara', 33, '', '', 'Philips Spain', 'ASCII Corporation', 1984, 'Cassette', '', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 0, 1, '', 186),
(20, 'Arquimedes VVI', 24, '', '', 'Dinamic', 'Dinamic', 1986, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(21, 'El misterio del nilo', 25, 'Los autores de Sir Fred te oresentan su nueva creación. Si buscas ACCIÓN sin límites y recorrer los paisajes africanos en una trepidante fuga, el misterio del Nilo es tu video-aventura.', 'Spain', 'Zigurat', 'Zigurat', 1986, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 0, 'La carátula es una fotocopia', 186),
(22, 'Renegade III', 26, '', '', 'Erbe', 'Imagine', 1989, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 1, 0, '', 186),
(23, 'Double dragon', 27, '', '', 'Dro soft (DRC)', 'Xortrapa Soft', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 1, 1, 'https://www.msxgamesworld.com/software.php?id=1538', 186),
(24, 'tetris', 28, '', '', 'MCM software', 'Mirrorsoft', 0, '', '', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 0, '', 186),
(25, 'Formula 1 simulator', 29, '', '', 'Mastertronic', 'Mastertronic', 1986, 'Cassette', 'Racing', 'MSX', '', '', '', '', '', 0, 0, 1, 1, 0, 1, '', 186),
(26, 'Editorial grupo J (año 1 numero 1)', 1, '', '', 'Magazine', 'Editorial Grupo J', 0, '', '', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 0, 1, '', 186),
(27, 'Gridtrap', 31, '', '', 'Erbe', 'Livewire', 1985, '', '', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 0, 0, '', 186),
(28, 'Team Sanyo & Harvey Smith Showjumper', 34, '', '', 'Software Projects', 'Software Projects', 1985, 'tape cartridge', 'Arcade', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 0, 1, '', 186),
(29, 'MSX Software Nº12', 35, 'Estas al mando de un potente avión de combate, tu misión consiste en despegar de tu portaaviones y realizar una incursión aerea sobre una importante ciudad enemiga. Pero esta ciudad se encuentra a varios kilómetros en el interior del terrtorio enemigo, po', '', 'Grupo de Trabajo Software (G.T.S.)', 'Grupo de Trabajo Software (G.T.S.)', 1986, 'tape cartridge', '', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 0, 1, '', 186),
(30, 'Mr Wong', 36, 'Mr. Wong el lavandero además de recoger la ropa debe evitar la persecución del jabón, la plancha, etc, lanzando jabón', '', 'Sony Spain', 'Artic Computing', 1984, '', '', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 0, 1, '', 186);

--

--
-- Borrar todas las filas
-- delete from gamesUsers;
--