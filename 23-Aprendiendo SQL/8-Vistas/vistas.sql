/*Mostrar las entradas y mostrar en vez del usuario_id 
el nombre del usuario y la categoria_id el nombre de la categoria*/
CREATE VIEW entradas_con_nombre AS
SELECT entradas.titulo, usuarios.nombre AS "Autor", categorias.nombre AS "Categoria"
FROM entradas
INNER JOIN usuarios ON entradas.usuario_id=usuarios.id
INNER JOIN categorias ON entradas.categoria_id=categorias.id;