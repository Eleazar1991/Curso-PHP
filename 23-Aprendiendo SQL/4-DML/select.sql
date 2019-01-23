/*Mostrar todos los registros de una tabla*/
SELECT * FROM usuarios;

/*Mostrar todos los registros con los camos especificados*/
SELECT email,nombre,apellidos FROM usuarios;

/*Operadores aritméticos*/
/*7*7, 7-7,7/7, 7%7*/
SELECT email, (7+7) AS 'OPERACION' FROM usuarios;

/*Funciones Matemáticas*/
/*pi(), round(númer, decimales), sqrt(numero), truncate(numero, numero de decimales).....*/
SELECT email, ABS(7+7) AS 'OPERACION' FROM usuarios;

/*Funcines para textos*/
/*Lower(nombrecampo), CONCAT(campo1,campo2,...),Length(campo),trim(campo)...*/
SELECT UPPER(nombre) FROM usuarios;

/*Funciones para fechas*/
/*datediff(fecha,curdate()), dayofmonth(fecha), dayofweek(fecha), dayofyear(fecha), month(fecha), year(fecha),curtime()
sysdate(),date_format(fecha,formato='%d-%M-%Y'))*/
SELECT email, fecha, CURDATE() AS 'Fecha Actual' FROM usuarios;

/*Funciones Generales*/
/*STRCMP(str1,str2), database(), ifnull(campo,'ristra a sustituir')*/
SELECT email, ISNULL(apellidos) FROM usuarios;