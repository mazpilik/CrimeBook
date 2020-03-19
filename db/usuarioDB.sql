-- Creamos el usuario	
CREATE USER `dwes`@`localhost` IDENTIFIED BY 'abc123.';

-- Asignamos los privilegios
GRANT ALL PRIVILEGES ON CrimeBook.* TO 'dwes'@'localhost';