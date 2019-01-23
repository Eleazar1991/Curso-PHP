/*Modificar la comision de los vendedores y ponerla al 0.5% cuando ganan más de 50000*/
UPDATE vendedores SET comision=0.5 WHERE sueldo >= 50000;

/*Incrementar el precio de los coches en un 2%*/
UPDATE coches SET precio=(precio*1.02);

/*Sacar a todos los vendedores cuya fecha de alta sea posterior al 1 de julio de 2018*/
SELECT * FROM vendedores WHERE fecha_alta>="2018-07-01";

/*Listar los vendedores y para cada vendedor mostrar su nombre y los dias que lleva trabajando en el concesionario*/
SELECT nombre, (datediff(curdate(),fecha_alta)) AS "Numero de dias" FROM vendedores;

/*Visualizar el nombre y los apellidos de los vendedores en una misma columna y su fecha de registro y que 
dia de la semana se registraron*/
SELECT CONCAT(nombre," ",apellidos) AS "Nombre",fecha_alta,dayname(fecha_alta) AS "Dia Registro" FROM vendedores;

/*Mostrar el nombre y el salario de los vendedores con cargo de Ayudante de tienda*/
SELECT nombre, sueldo FROM vendedores WHERE cargo LIKE "Ayudante%tienda";

/*Visualizar todos los coches en cuyo marca exista la letra a y cuyo modelo empiecen por F*/
SELECT * FROM coches WHERE marca LIKE "%a%" AND modelo LIKE"F%";

/*Mostrar todos los vendedores del grupo nº2 ordenados por salario de mayor a menor*/
SELECT * FROM vendedores WHERE grupo_id=2 ORDER BY sueldo DESC;

/*Mostrar los apellidos de los vendedores, su fecha y su nº de grupo 
ordenado por fecha descendente mostrar solo 4*/
SELECT apellidos,fecha_alta,grupo_id FROM vendedores ORDER BY fecha_alta DESC LIMIT 4;

/*Visualizar todos los cargos de los vendedores y el numero de vendedores que estan
dentro de ese cargo*/
SELECT cargo, COUNT(id) AS "Empleados-Cargo" FROM vendedores GROUP BY cargo;

/*Conseguir la masa saliarial del concesionario (anual)*/
SELECT SUM(sueldo) AS "Masa Salarial" FROM vendedores;

/*Sacar la media de sueldos entre todos los vendedores por grupo, y el nombre del grupo*/
SELECT grupos.nombre, grupos.ciudad,AVG(vendedores.sueldo) AS "Media salarial" 
FROM vendedores,grupos
WHERE vendedores.grupo_id=grupos.id
GROUP BY vendedores.grupo_id;

/*Visualizar las unidads totales vendidas de cada coche a cada cliente
mostrando el nombre del producto, numero de cliente, suma de unidades*/
SELECT coches.modelo, clientes.nombre, encargos.cantidad
FROM coches, clientes, encargos
WHERE coches.id=encargos.coche_id AND clientes.id=encargos.cliente_id;

/*Mostrar los dos clientes con mayor número de encargos y mostrar sus encargos*/
SELECT clientes.nombre, COUNT(encargos.id) AS "Numero de encargos"
FROM clientes,encargos
WHERE clientes.id=encargos.cliente_id  GROUP BY encargos.cliente_id ORDER BY 2 DESC LIMIT 2;

/*Obtener listado de clientes atendidos por el vendedor David Lopez*/
SELECT clientes.nombre, CONCAT(vendedores.nombre," ",vendedores.apellidos) AS "Nombre"
FROM clientes,vendedores
WHERE clientes.vendedor_id=vendedores.id AND vendedores.nombre="David" AND vendedores.apellidos="Lopez";

/*Obtener listado con los encargos realizados por el cliente Fruteria Antonia INC*/
SELECT encargos.cantidad, clientes.nombre, coches.modelo
FROM encargos,clientes,coches
WHERE clientes.id=encargos.cliente_id AND coches.id=encargos.coche_id AND clientes.nombre="Fruterias Antonia Inc";

/*Listar los clientes que han hecho algun encargo del coche Mercedes ranchera*/
SELECT clientes.nombre, encargos.cantidad, coches.modelo 
FROM clientes,encargos,coches
WHERE clientes.id=encargos.cliente_id AND coches.id=encargos.coche_id AND coches.modelo LIKE "%Mercedes Ranchera%";

SELECT * FROM clientes WHERE id 
IN(SELECT cliente_id FROM encargos WHERE coche_id 
    IN(SELECT id FROM coches WHERE modelo LIKE "%Mercedes Ranchera%"));

/*Obtener los vendedores con 2 o mas clientes*/
SELECT * FROM vendedores WHERE id IN
    (SELECT vendedor_id FROM clientes GROUP BY vendedor_id HAVING COUNT(id)>=2);

/*Seleccionar el grupo del vendedor con mayor salario mostrando el nombre del grupo*/
SELECT grupos.nombre,vendedores.sueldo, grupos.ciudad
FROM grupos,vendedores 
WHERE grupos.id=vendedores.grupo_id ORDER BY vendedores.sueldo DESC LIMIT 1;

/*Obtener los nombres y las ciudades de los clientes que tengan encargos mayor o igual a 3 unidades*/
SELECT nombre,ciudad FROM clientes WHERE id IN
    (SELECT cliente_id FROM encargos WHERE cantidad>=3);

/*Obtener listado de clientes mostrando el id, nombre y mostrar el número de vendedore y su nombre*/
SELECT clientes.id,clientes.nombre,vendedores.id, CONCAT(vendedores.nombre," ",vendedores.apellidos) AS "Nombre"
FROM clientes,vendedores
WHERE vendedores.id=clientes.vendedor_id;

/*Listar todos los encargos realizados con la marca del coche y el nombre del cliente*/
SELECT coches.marca,clientes.nombre
FROM coches,clientes,encargos
WHERE encargos.coche_id=coches.id AND encargos.cliente_id=clientes.id;

/*Listar los encargos con el nombre del coche, el nombre del cliente
y el nombre de la ciudad del cliente cuando sean de Fuenlabrada*/
SELECT coches.modelo,clientes.nombre,clientes.ciudad
FROM coches,clientes,encargos
WHERE coches.id=encargos.coche_id AND clientes.id=encargos.cliente_id AND clientes.ciudad="Fuenlabrada";

/*Obtener una lista de los nombres de los clientes con el importe de sus encargos acumulado*/
SELECT clientes.nombre, SUM(coches.precio*encargos.cantidad) AS "Importe"
FROM clientes,coches,encargos
WHERE encargos.coche_id=coches.id AND encargos.cliente_id=clientes.id GROUP BY clientes.nombre;

/*Sacar vndedores que tienen jefe y sacar el nombre del jefe*/
SELECT v1.nombre AS "Vendedor",v2.nombre AS "Jefe"
FROM vendedores v1, vendedores v2
WHERE v2.id=v1.jefe;

/*Visualizar el nombre de los clientes y la cantidad de encargos realizados incluyendo los que no hayan realizado
encargos*/
SELECT clientes.nombre,encargos.cantidad FROM clientes
LEFT JOIN encargos ON clientes.id=encargos.cliente_id;

/*Listar los vendedores y el numero de clientes que tengan o no */
SELECT COUNT(clientes.id) AS "Número de clientes", CONCAT(vendedores.nombre," ",vendedores.apellidos) AS "Nombre Vendedor" 
FROM clientes
RIGHT JOIN vendedores ON vendedores.id=clientes.vendedor_id GROUP BY vendedores.id;

/*Crear una vista llamada vendedores A que incluira todos los vendedores del grupo que se llame "Vendedores A"*/
CREATE VIEW Vendedores_A AS
SELECT * FROM vendedores WHERE grupo_id IN
    (SELECT id FROM grupos WHERE nombre="Vendedores A");

/*Mostrar los datos del vendedor con más antiguedad en el concesionario*/
SELECT * FROM vendedores ORDER BY fecha_alta ASC LIMIT 1;

/*Obtener los datos del coche con mas unidades vendidas*/
SELECT * FROM coches WHERE id =
    (SELECT coche_id FROM encargos ORDER BY cantidad DESC LIMIT 1);