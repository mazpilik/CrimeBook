-- Creamos el usuario	
CREATE USER 'dwes' IDENTIFIED BY 'abc123.';

-- Asignamos los privilegios
GRANT ALL PRIVILEGES ON CrimeBook.* TO 'dwes';

-- Copia de seguridad de la base de datos
mysqldump -v --opt --events --routines --triggers --default-character-set=utf8 -u root -p  crimebook > db_backup_crimebook.sql

-- Restaurar copia de seguridad de la base de datos
mysql -u root -p crimebook < db_backup_crimebook.sql

-- DB::obtieneJuegos() OBTIENE LOS JUEGOS TANTO LOS QUE TIENEN PRUEBAS
-- EN LA TABLA PERTENENCIAS COMO LOS QUE NO
SELECT id, nombre, descExtendida, descBreve, fechaCreacion, username, COUNT(idPrueba) as numPruebas 
FROM juegos LEFT JOIN pertenencias ON pertenencias.idJuego=juegos.id GROUP BY id;

-- DB::obtieneJuego($idJuego) OBTIENE EL JUEGO QUE CORRESPONDE CON $IdJuego
SELECT id, nombre, descExtendida, descBreve, fechaCreacion, username, COUNT(idPrueba) as numPruebas 
FROM juegos LEFT JOIN pertenencias ON juegos.id = pertenencias.idJuego WHERE  juegos.id = '$idJuego' GROUP BY id;

-- DB::cuentaPruebasJuego($idJuego)
SELECT COUNT(idPrueba) as numPruebas FROM pertenencias WHERE idJuego = '$idJuego' GROUP BY idJuego;

DELETE pruebas FROM pruebas 
WHERE pruebas.id = '400007';

-- Modificación para poder eliminar las pruebas con un JOIN


ALTER TABLE pertenencias DROP CONSTRAINT pertenencias_ibfk_2;


ALTER TABLE pertenencias ADD CONSTRAINT pertenencias_ibfk_2 FOREIGN KEY (idPrueba) REFERENCES pruebas (id) ON DELETE CASCADE;

ALTER TABLE pistas DROP CONSTRAINT pistas_ibfk_1;
ALTER TABLE pistas ADD CONSTRAINT pistas_ibfk_1 FOREIGN KEY (idPrueba) REFERENCES pruebas(id) ON DELETE CASCADE;


ALTER TABLE respuestas DROP CONSTRAINT respuestas_ibfk_1;
ALTER TABLE respuestas ADD CONSTRAINT respuestas_ibfk_1 FOREIGN KEY (idPrueba) REFERENCES pruebas (id) ON DELETE CASCADE;

ALTER TABLE resoluciones DROP CONSTRAINT resoluciones_ibfk_2;
ALTER TABLE resoluciones add CONSTRAINT resoluciones_ibfk_2 FOREIGN KEY (idPrueba) REFERENCES pruebas (id) ON DELETE CASCADE;

ALTER TABLE peticiones DROP CONSTRAINT peticiones_ibfk_2;
ALTER TABLE peticiones add CONSTRAINT peticiones_ibfk_2 FOREIGN KEY (idPrueba, idPista) REFERENCES pistas (idPrueba, id)  ON DELETE CASCADE;