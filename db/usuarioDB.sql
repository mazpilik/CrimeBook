-- Creamos el usuario	
CREATE USER 'dwes' IDENTIFIED BY 'abc123.';

-- Asignamos los privilegios
GRANT ALL PRIVILEGES ON CrimeBook.* TO 'dwes';

-- Copia de seguridad de la base de datos
mysqldump -v --opt --events --routines --triggers --default-character-set=utf8 -u root -p  crimebook > db_backup_crimebook.sql

-- Restaurar copia de seguridad de la base de datos
mysql -u root -p crimebook < db_backup_crimebook.sql