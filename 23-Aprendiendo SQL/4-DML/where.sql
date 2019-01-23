/*Consulta con una condicion*/
SELECT * FROM usuarios WHERE email="eleazar@gmail.com";

/*Ejemplos de operadores de condicion*/

/*Los nombre y apellidos de los usuarios que se registraron en 2019*/
SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha)=2019;

/*Los nombre y apellidos de los usuarios que no se registraron en 2019*/
SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha)!=2019 OR ISNULL(fecha);

/*Obtener email el nombre de los usuarios cuyos apellidos contenga la letra a y su password sea 1234*/
SELECT email FROM usuarios WHERE apellidos LIKE '%a%' AND password='1234';

/*Sacar todos los registros de la tabla de usuarios cuando tenga año impar de registro*/
SELECT * FROM usuarios WHERE (YEAR(FECHA)%2)!=0;

/*Sacar todos los registros de usuarios cuyo nombre tenga mas de 5 letras y que se haya registrado antes de 2020 
y mostrar el nombre en mayusculas*/
SELECT UPPER(nombre) AS NOMBRE, apellidos FROM usuarios WHERE (LENGTH(nombre)>5) AND (YEAR(fecha)<2020);
