/*Insertar nuevos registros*/
INSERT INTO usuarios VALUES(null,'Eleazar','Perez','eleazar@gmail.com','1234','2019-12-01');
INSERT INTO usuarios VALUES(null,'Antonio','Santana','santana@gmail.com','1234','2019-10-01');
INSERT INTO usuarios VALUES(null,'Paco','Lopez','paco@gmail.com','1234','2019-11-01');

/*Insertar filas solo con ciertas columnas*/
INSERT INTO usuarios(email,password) VALUES('admin@admin.com','admin');
/*Tal y como tenemos declarada nuestra tabla usuario esta sentencia fallará ya que todos los 
campos son NOT NULL*/
