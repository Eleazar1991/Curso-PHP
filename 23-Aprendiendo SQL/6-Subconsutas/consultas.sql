/*Sacar los usuarios que tienen entradas creadas*/
SELECT * FROM usuarios WHERE id 
    IN (SELECT usuario_id FROM entradas);

/*Sacar los usuarios que no tienen entradas creadas*/
SELECT * FROM usuarios WHERE id 
    NOT IN (SELECT usuario_id FROM entradas);

/*Sacar los usuarios que tengan alguna entrada que en su titulo hable de GTA*/
SELECT nombre,apellidos FROM usuarios WHERE id 
    IN (SELECT usuario_id FROM entradas WHERE titulo LIKE "%GTA%");

/*Sacar todas las entradas de la categoria accion utilizando su nombre*/
SELECT * FROM entradas WHERE categoria_id 
    IN (SELECT id FROM categorias WHERE nombre="Accion");

/*Mostrar las categorias con mas de tres entradas*/
SELECT * FROM categorias WHERE id 
    IN (SELECT categoria_id FROM entradas GROUP BY categoria_id HAVING COUNT(categoria_id) >=3);

/*Mostrar los usuarios que crearon una entrada el martes (martes=3)*/
SELECT * FROM usuarios WHERE id 
    IN (SELECT usuario_id FROM entradas WHERE dayofweek(fecha)=3);

/*Mostrar el nombre del usuario que tenga más entradas*/
SELECT * FROM usuarios WHERE id 
    = (SELECT usuario_id FROM entradas GROUP BY usuario_id ORDER BY COUNT(id) DESC  LIMIT 1);

/*Mostrar las categorias sin entradas*/
SELECT * FROM categorias WHERE id 
    NOT IN (SELECT categoria_id FROM entradas); 