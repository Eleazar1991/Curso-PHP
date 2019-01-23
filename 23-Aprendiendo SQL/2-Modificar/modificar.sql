/**Renombrar tabla**/
ALTER TABLE usuarios RENAME TO usuarios_renom;

/*Cambiar nombre de una columna*/
ALTER TABLE usuarios CHANGE apellidos apellido varchar(100) null;

/*Modificar columna sin cambiar nombre*/
ALTER TABLE usuarios MODIFY apellido char(50) not null;

/*Añadir columna*/
ALTER TABLE usuarios ADD website varchar(100) not null;

/*Añadir restricción a columna*/
ALTER TABLE usuarios ADD CONSTRAINT uq_email UNIQUE(email);

/*Borrar un campo de la tabla*/
ALTER TABLE usuarios DROP website;