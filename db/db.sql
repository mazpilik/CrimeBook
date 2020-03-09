-- -----------------------------------
-- Creacion de la base de datos ------
-- -----------------------------------
drop database if exists crimeBook;
create database crimeBook;
use crimeBook;

-- -----------------------------------
-- Creacion de las tablas ------------
-- -----------------------------------
create table usuarios (
username varchar (15) not null,
email varchar(50) not null,
nombre varchar (50) not null,
apellidos varchar (50) not null,
contrasenya varchar (30) not null,
primary key (username),
unique(email)
);

create table pruebas (
id int unsigned not null,
nombre varchar (50) not null,
descExtendida varchar (1000),
descBreve varchar (200),
tipo enum ('Prueba normal','Prueba final') not null,
dificultad enum ('Facil','Normal','Dificil'),
url varchar (100),
ayudaFinal varchar (200),
username varchar (15) not null,
primary key (id),
unique(nombre),
foreign key(username) references usuarios(username)
);

create table respuestas (
idPrueba int unsigned not null,
id int unsigned not null,
respuesta varchar (200) not null,
primary key (idPrueba,id),
foreign key(idPrueba) references pruebas(id)
);

create table juegos (
id int unsigned not null,
nombre varchar (50) not null,
descExtendida varchar (1000),
descBreve varchar (200),
fechaCreacion date not null default(now()),
username varchar (15) not null,
primary key (id),
unique (nombre),
foreign key(username) references usuarios(username)
);

create table pertenencias (
idJuego int unsigned not null,
idPrueba int unsigned not null,
primary key(idJuego,idPrueba),
foreign key(idJuego) references juegos(id),
foreign key(idPrueba) references pruebas(id)
);

create table partidas (
id int unsigned not null,
nombre varchar (50) not null,
fechaCreacion date not null default (now()),
duracion int unsigned not null default 0,
fechaInicio date not null default (now()),
idJuego int unsigned not null,
username varchar (15) not null,
primary key (id),
unique (nombre),
foreign key(idJuego) references juegos(id),
foreign key(username) references usuarios(username)
);

create table equipos (
id int unsigned not null,
codigo int unsigned not null,
nombre varchar (50) not null,
tiempo int unsigned not null default 0,
idPartida int unsigned not null,
primary key (id),
foreign key (idPartida) references partidas(id),
unique(codigo)
);

create table pistas (
idPrueba int unsigned not null,
id int unsigned not null,
texto varchar (1000) not null,
tiempo int unsigned,
intentos int unsigned,
primary key (idPrueba,id),
foreign key(idPrueba) references pruebas(id)
);

create table resoluciones (
idPrueba int unsigned not null,
idEquipo int unsigned not null,
resuelta boolean not null default 0,
intentos int unsigned not null default 0,
estrellas enum ('0','1','2','3','4','5'),
primary key(idEquipo,idPrueba),
foreign key(idEquipo) references equipos(id),
foreign key(idPrueba) references pruebas(id)
);

create table peticiones (
idEquipo int unsigned not null,
idPrueba int unsigned not null,
idPista int unsigned not null,
primary key(idEquipo,idPrueba,idPista),
foreign key(idEquipo) references equipos(id),
foreign key(idPrueba,idPista) references pistas(idPrueba,id)
);



-- ----------------------------------
-- Inserciones ----------------------
-- ----------------------------------

-- ----------------------------------
-- Usuarios--------------------------
-- ----------------------------------
insert into usuarios 
values ('ivantapia01','ivantapia@email.cb','ivan','tapia','1234abcd');

-- ----------------------------------
-- Juegos----------------------------
-- ----------------------------------

insert into juegos
values ('100001','Los Asesinos del Crimebook','Una orden de asesinos tiene en
jaque al mundo entero. La Orden de los asesinos del Crimebook. Estos criminales 
tienen por costumbre, antes de matar a sus víctimas, crear un Crimebook. Un 
libro de enigmas en cuyo interior se encuentran encriptados los datos de la 
futura víctima. ¿Estáis a punto para jugar? Los asesinos del Crimebook es una 
historia corta y también es un juego en el que deberéis colaborar con el centro 
de investigación de Crimebook descifrando enigmas y puzles. De vosotros depende 
la vida de la víctima.','Un BOOK ESCAPE donde vosotros sois los protagonistas. 
Descifrad los enigmas, de vosotros depende su vida.','2020/02/07','ivantapia01');

-- ----------------------------------
-- Partidas--------------------------
-- ----------------------------------

insert into partidas
values ('200001','Los Asesinos del Crimebook 1','2020/02/07',60,'2020/02/10',
'100001','ivantapia01');

-- ---------------------------------
-- Equipos--------------------------
-- ---------------------------------

insert into equipos
values ('300001',12345678,'equipo01',35,'200001');

-- ---------------------------------
-- Pruebas--------------------------
-- ---------------------------------

insert into pruebas
values ('400001',
'El Enigma de la Luz',
'Esta es una descripcion muy larga de 
la prueba 1 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 1 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'La llave de la luz protege su nombre',
'Prueba Normal',
'facil',
'direccion.dominio/prueba1',
null,
'ivantapia01');

insert into pruebas
values ('400002',
'El Enigma del Enfermo',
'Esta es una descripcion muy larga de 
la prueba 2 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 2 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'Con tanta pastilla tengo claro de que me moriré',
'Prueba Normal',
'facil',
'direccion.dominio/prueba2',
null,
'ivantapia01');

insert into pruebas
values ('400003',
'El Enigma del Viajero',
'Esta es una descripcion muy larga de 
la prueba 3 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 3 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'Si se donde empiezo sabré donde acabo',
'Prueba Normal',
'facil',
'direccion.dominio/prueba3',
null,
'ivantapia01');
insert into pruebas
values ('400004',
'El Enigma del Cerebro',
'Esta es una descripcion muy larga de 
la prueba 4 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 4 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'No hay más viejo que el qué se cree viejo, ya que la edad está en el cerebro',
'Prueba Normal',
'normal',
'direccion.dominio/prueba4',
null,
'ivantapia01');

insert into pruebas
values ('400005',
'El Enigma de la Gula',
'Esta es una descripcion muy larga de 
la prueba 5 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 5 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'El piso y la puerta se esconden detrás de dos trampas X/X',
'Prueba Normal',
'dificil',
'direccion.dominio/prueba5',
null,
'ivantapia01');

insert into pruebas
values ('400006',
'El Enigma de la Verdad',
'Esta es una descripcion muy larga de 
la prueba 6 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 6 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'248B42 14 C4113 21 3NCU3N7R42 102 NUM3R02 V3RD4D3R02',
'Prueba Normal',
'normal',
'direccion.dominio/prueba6',
null,
'ivantapia01');

insert into pruebas
values ('400007',
'El Enigma del Azar',
'Esta es una descripcion muy larga de 
la prueba 7 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 7 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'El azar eligió a mi padre y lo escondió en sus posaderas',
'Prueba Normal',
'facil',
'direccion.dominio/prueba7',
null,
'ivantapia01');

insert into pruebas
values ('400008',
'El Enigma de la Cifra',
'Esta es una descripcion muy larga de 
la prueba 8 de Los Asesinos del Crimebook. En realidad no contiene nada
de interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar
el campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:
Esta es una descripcion muy larga de la prueba 8 de Los Asesinos del Crimebook. 
En realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar 
espacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora 
voy a repetirlo de nuevo:',
'Sabrás el número dónde está si sabes el valor de las letras',
'Prueba Normal',
'dificil',
'direccion.dominio/prueba8',
null,
'ivantapia01');

-- ------------------------------
-- Respuestas ------------------
-- -----------------------------

insert into respuestas 
values(400001,500001,'Gina');

insert into respuestas 
values(400001,500002,'Bomb');

insert into respuestas 
values(400001,500003,'New York');

insert into respuestas 
values(400001,500004,'22');

insert into respuestas 
values(400001,500005,'6/2');

insert into respuestas 
values(400001,500006,'Academy St.');

insert into respuestas 
values(400001,500007,'UN');

insert into respuestas 
values(400001,500008,'132');

-- -----------------------------
-- Pistas-----------------------
-- -----------------------------

-- PRUEBA  1 --
insert into pistas
values (400001,'600001','Está claro que los símbolos con un número al lado son 
llaves. Nos falta saber qué abren',null,2);
insert into pistas
values (400001,'600002','Según el texto cada llave abre algo relacionado con la 
luz. ¡Qué se relaciona con la luz?',20,1);
insert into pistas
values (400001,'600003','Los faros se relacionan con la luz. ¿Qué faro abre cada
llave?',null,5);
insert into pistas
values (400001,'600004','El número de ventanas de cada faro es diferente. Quizá
nos sirva para saber qué llave abre cada faro...',20,4);
insert into pistas 
values (400001,'600005','El número de ventanas se corrwsponde con el número de 
llave que abre cada faro. Tal vez no todas las llaves sean útiles',null,2);
insert into pistas
values (400001,'600006','¡Claro! Tal vez las llaves tachadas no se han de utilizar. 
Sólo las letras de las llaves sin tachar forman el nombre. ¡En que orden las 
ponemos?',null,2);
insert into pistas
values (400001,'600007','Podemos probar poniendo las llaves en orden de mayor a 
menor',null,2);

-- PRUEBA  2 --
insert into pistas
values (400002,'600001','¡Y si algunas de estas enfermedades está puesta para 
despistar?',40,1);
insert into pistas
values (400002,'600003','¡Fijaros1 Resiguiendo el laberinto hasta la salida por 
el camino más corto sólo se pasa por encima de algunas enfermedades. Esas deben 
ser la buenas',null,2);
insert into pistas
values (400002,'600004','Es necesario saber que medicina corresponde a cada 
enfermedad',40,null);
insert into pistas
values (400002,'600005','Si leemos con atención las definiciones de enfermedades 
quizá podamos
identificar cual es cual',null,null);
insert into pistas
values (400002,'600006','¡Decoders1 Mirad atentanente las medicinas. ¡Cada bote 
tiene una letra! ¡Qué botes corresponden a las enfermedades que pisamos en el 
laberinto?',45,5);
insert into pistas
values (400002,'600007','si pongo esas letras en el orden en el que he pisado las 
enfermedades...',45,3);
insert into pistas
values (400002,'600008','La leche... Esa es la forma como morirá La Marcha...',null,5);

-- PRUEBA  3 --
insert into pistas
values (400003,'600001','Las monedas conectadas por puntos pueden ser una especie 
de guía de viaje',10,1);
insert into pistas
values (400003,'600002','Tengo una idea: ¡Qué pasa si aplicamos la guía de viaje
al círculo de monedas y luego miramos con que monumento coincide la última moneda?',
15,2);
insert into pistas
values (400003,'600003','Pero ¿Dónde empieza el viaje? ¡Tengo algún 11 en el círculo 
de monedas?',20,3);
insert into pistas
values (400003,'600004','A ver, es facíl: ¡Sigamos la guía! Del primer número de la 
guía vamos al segundo, del segundo al tercero,...',25,4);
insert into pistas
values (400003,'600005','Ya, pero ¿Que significan el autobús y el avión? ¿Y si marcan 
las distancias?',30,4);
insert into pistas
values (400003,'600006','¡Claro! Imaginad que las monedas son ciudades de verdad. 
Para ir de una a otra deberás coger el medio de transporte más adecuado, según si 
se puede ir por tierra o no. ¡El autobús significa que las monedas están en contacto 
y el avión que no se tocan, por eso hace falta ir en avión!',34,5);
insert into pistas
values (400003,'600007','¿Que monumento coincide con la moneda final?',40,6);
insert into pistas
values (400003,'600008','¡Ojo con el norte!Fijaros dónde está situado en cada 
imagen',45,7);

-- PRUEBA  4 --
insert into pistas
values (400004,'600001','La edad está en el cerebro. Seguro que tiene algo que 
ver con esos escarabajos',30,1);
insert into pistas
values (400004,'600002','La cuerda conecta las diferentes partes, quizás nos ayude 
a saber el orden',35,2);
insert into pistas
values (400004,'600003','En la pantalla tambien apàrece el escarabajo. ¿Será una 
secuencia?',40,3);
insert into pistas
values (400004,'600004','¡Dónde debe estar el valor de los símbolos de la 
secuencia?',45,4);
insert into pistas
values (400004,'600005','Quizás el valor esté en el teclado',45,5);
insert into pistas
values (400004,'600006','Bien, ¡Qué valor tiene el escarabajo en la secuencia? 
Quzá tenga que ver con la 
suma de los dos anteriores',45,6);
insert into pistas
values (400004,'600007','Conocemos el valor del escarabajo ¡Pero ojo! En el cerebro 
hay uno en cada lado',45,7);

-- PRUEBA  5 --
insert into pistas
values (400005,'600001','¿A que tomos se refiere? Me parece haber visto un libro 
como ese',null,1);
insert into pistas
values (400005,'600002','Sí. Aparecían tres libros como ese en los enigmas 
anteriores. Lo tengo apuntado',null,2);
insert into pistas
values (400005,'600003','¿Sólo hemos de sumar los números que aparecen en los 
tomos? Habla de dos trampas',null,3);
insert into pistas
values (400005,'600004','Una trampa creo que se cual es. No es lo mismo páginas 
que hojas',null,4);
insert into pistas
values (400005,'600005','De acuerdo. Una hoja igual a dos páginas. ¿Pero, y la 
segunda trampa?',null,5);
insert into pistas
values (400005,'600006','Quizá si cogemos unos libros cualquiera, una trilogía y 
la ponemos en orden, lo veamos',null,6);
insert into pistas
values (400005,'600007','¡Uala! si lo ponemos en orden fijaros donde está la 
primera página del primer tomo y la
última del tercero',null,7);
insert into pistas
values (400005,'600008','Sólo cuenta una del primero y una del tercero',null,8);
insert into pistas
values (400005,'600009','Cuidado, la página del primer tomo y la del tercer tomo 
cuentan como una hoja. Son sólo
las del segundo tomo las que se han de dividir entre dos',null,9);
insert into pistas
values (400005,'600010','Fijaros en el X/X de la entrada. Los dos primeros números 
serán el piso y el otro la puerta',null,10);

-- PRUEBA  6 --
insert into pistas
values (400006,'600001','Esto es un galimatías Pero parece que se puede leer si lo 
haces del tirón',null,1);
insert into pistas
values (400006,'600002','¡Si! los números hacen la funcion de letras. Se lee 
perfectamente si no imaginas que son números',null,2);
insert into pistas
values (400006,'600003','Encontrar los números verdaderos y sustituirlos en este 
texto. ¿Dónde están los números verdaderos?',null,3);
insert into pistas
values (400006,'600004','Un momento. En un enigma anterior había un texto similar a 
este',null,4);
insert into pistas
values (400006,'600005','claro, núeros verdaderos se refiere a la lista de números
que no se puede leer porque son números',null,5);
insert into pistas
values (400006,'600006','Intentemos buscar el carácter a que corresponde cada
número en el texto del enigma',null,6);
insert into pistas
values (400006,'600007','Recordad que hemos de empezar a contar los carácteres 
desde el principio y después a partir del carácter encontrado',null,7);
insert into pistas
values (400006,'600008','Ojo. Los puntos cuentan pero los espacios en blanco 
no',null,8);
insert into pistas
values (400006,'600009','Sólo se trata de contar la letra correspondiente a cada
número. Fácil. Y si salen números los leemos como letras',null,9);

-- PRUEBA  7 --
insert into pistas
values (400007,'600001','Con lo de las posaderas del azar debe querer decir
que la solución está en la base de los dados',null,1);
insert into pistas
values (400007,'600002','Este es imposible si no dibujamos el dado. Yo lo voy
a dibujar abierto',null,2);
insert into pistas
values (400007,'600003','Es importantísimo dibujar las formas en el dado con las 
direcciones correctas',null,3);
insert into pistas
values (400007,'600004','Una de las figuras se ha de repetir para que este
dado sea posible',null,4);
insert into pistas
values (400007,'600005','Hay dos caras que no podemos saber pero no las necesitamos
para resolver el enigma. Pasando de ellas',null,5);
insert into pistas
values (400007,'600006','Si ponemos los símbolos con las direcciones correctas,
repitiendo el que toca, encontramos los tres símbolos correspondientes
a las posaderas de los dados',null,6);
insert into pistas
values (400007,'600007','Esos símbolos los he visto en un enigma anterior',null,7);
insert into pistas
values (400007,'600008','Sólo falta encontrar los símblos y sustituirlos',null,8);

-- PRUEBA  8 --
insert into pistas
values (400008,'600001','Esos símbolos me parece haberlos visto antes.
En varios enigmas anteriores',null,1);
insert into pistas
values (400008,'600002','¿Hacemos una cuadrícula y ponemos todos los simbolos
y letras en sus respectivos lugares?',null,2);
insert into pistas
values (400008,'600003','Esas letras parecen formar una palabra, ¿No?',null,3);
insert into pistas
values (400008,'600004','¡Si! Sudoku. ¿Y ahora? ¿Resolvemos el sudoku?',null,4);
insert into pistas
values (400008,'600005','Creo que si, hemos de tratarlo como un sudoku.
Pero especial. Sólo con cuatro numeros: 0,1,2,3',null,5);
insert into pistas
values (400008,'600006','Ya está. No era dificil. ¿volvemos a poner las
letras en su sitio para saber que número es cada letra?',null,6);
insert into pistas
values (400008,'600007','Eso dice el texto, buscar el vaslor de las letras',null,7);
insert into pistas
values (400008,'600008','¿Ponemos las letras en orden? SUDOKU',null,8);
insert into pistas
values (400008,'600009','Si los ceros no cuentan lo otro debe ser el 
número de la calle',null,9);

-- ----------------------------
-- Resoluciones ---------------
-- ----------------------------

insert into resoluciones
values (400001,300001,1,3,null);
insert into resoluciones
values (400002,300001,1,1,null);
insert into resoluciones
values (400003,300001,1,4,null);
insert into resoluciones
values (400004,300001,0,1,null);
insert into resoluciones
values (400005,300001,0,0,null);
insert into resoluciones
values (400006,300001,0,0,null);
insert into resoluciones
values (400007,300001,0,0,null);
insert into resoluciones
values (400008,300001,0,0,null);

-- ----------------------------
-- Peticiones ---------------
-- ----------------------------

insert into peticiones
values(300001,400001,600001);
insert into peticiones
values(300001,400001,600002);
insert into peticiones
values(300001,400001,600003);
insert into peticiones
values(300001,400002,600001);
insert into peticiones
values(300001,400002,600003);
insert into peticiones
values(300001,400002,600004);
insert into peticiones
values(300001,400003,600001);
insert into peticiones
values(300001,400004,600001);


-- ----------------------------
-- Pertenencias ---------------
-- ----------------------------

insert into pertenencias
values(100001,400001);
insert into pertenencias
values(100001,400002);
insert into pertenencias
values(100001,400003);
insert into pertenencias
values(100001,400004);
insert into pertenencias
values(100001,400005);
insert into pertenencias
values(100001,400006);
insert into pertenencias
values(100001,400007);
insert into pertenencias
values(100001,400008);
