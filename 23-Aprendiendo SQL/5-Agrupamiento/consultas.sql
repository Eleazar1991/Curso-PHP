/*Consultas de agrupamiento*/
/*Mostrar los titulos de las entradas de cada una de las categorías (Muestra 1 título de cada categría)*/
SELECT titulo FROM entradas GROUP BY categoria_id;

/*Número de entradas de cada una de las categorías*/
SELECT COUNT(titulo) AS 'Numero de entradas' FROM entradas GROUP BY categoria_id;

/*Consultas de agrupamiento con condición*/ 
/*Número de entradas de cada una de las categorías mayores a 3*/
SELECT COUNT(titulo) AS 'Numero de entradas' FROM entradas GROUP BY categoria_id HAVING COUNT(titulo)>=3;

/*Funciones de agrupamiento*/
/*Sacar la media de todos los id de las entradas*/
SELECT AVG(id) AS 'Media de entradas' FROM entradas;
/*Entrada con el id mas grande*/
SELECT MAX(id) AS 'MaximoID' FROM entradas;
/*Entrada con el id mas pequeño*/
SELECT MIN(id) AS 'MinimoID' FROM entradas;
/*Sua todos los id*/
SELECT SUM(id) AS 'SUMAID' FROM entradas;