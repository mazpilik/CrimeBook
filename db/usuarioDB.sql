-- Creamos el usuario	
CREATE USER `cb`@`localhost` IDENTIFIED BY '1234';

-- Asignamos los privilegios
GRANT ALL PRIVILEGES ON CrimeBook.* TO 'cb'@'localhost';