/*Mostrar las entradas y mostrar en vez del usuario_id 
el nombre del usuario y la categoria_id el nombre de la categoria*/
SELECT entradas.titulo, usuarios.nombre, categorias.nombre 
FROM entradas, usuarios, categorias
WHERE entradas.usuario_id=usuarios.id AND entradas.categoria_id=categorias.id;
/*INNER JOIN*/
SELECT entradas.titulo, usuarios.nombre, categorias.nombre
FROM entradas
INNER JOIN usuarios ON entradas.usuario_id=usuarios.id
INNER JOIN categorias ON entradas.categoria_id=categorias.id;


/*Mostrar el nombre de las categorias y al lado cuantas entradas tienen*/
SELECT categorias.nombre, COUNT(entradas.id) AS "Número de entradas"
FROM categorias, entradas
WHERE entradas.categoria_id=categorias.id GROUP BY entradas.categoria_id;
/*LEFT JOIN*/
SELECT categorias.nombre, COUNT(entradas.id) AS "Número de entradas"
FROM categorias
LEFT JOIN entradas ON entradas.categoria_id=categorias.id GROUP BY entradas.categoria_id;
/*RIGHT JOIN*/
SELECT categorias.nombre, COUNT(entradas.id) AS "Número de entradas"
FROM entradas
RIGHT JOIN categorias ON entradas.categoria_id=categorias.id GROUP BY entradas.categoria_id;


/*Mostrar el email del usuario y al lado cuantas entradas tienen*/
SELECT usuarios.email, COUNT(entradas.id) AS "Número de entradas"
FROM usuarios, entradas
WHERE usuarios.id=entradas.usuario_id GROUP BY entradas.usuario_id;