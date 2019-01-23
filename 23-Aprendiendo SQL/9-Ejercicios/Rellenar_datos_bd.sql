/*Coches*/
INSERT INTO coches VALUES(NULL,'Renault Clio','Renault',12000,13);
INSERT INTO coches VALUES(NULL,'Seat Panda','Seat',10000,10);
INSERT INTO coches VALUES(NULL,'Mercedes Ranchera','Mercedes Benz',32000,24);
INSERT INTO coches VALUES(NULL,'Porsche Cayenne','Porsche',65000,5);
INSERT INTO coches VALUES(NULL,'Lamborghini Aventador','Lamborghini',170000,2);
INSERT INTO coches VALUES(NULL,'Ferrari Spider','Ferrari',245000,80);

/*Grupos*/
INSERT INTO grupos VALUES(NULL,'Vendedores A','Madrid');
INSERT INTO grupos VALUES(NULL,'Vendedores B','Madrid');
INSERT INTO grupos VALUES(NULL,'Directores Mecánicos','Madrid');
INSERT INTO grupos VALUES(NULL,'Vendedores A','Barcelona');
INSERT INTO grupos VALUES(NULL,'Vendedores B','Barcelona');
INSERT INTO grupos VALUES(NULL,'Vendedores C','Valencia');
INSERT INTO grupos VALUES(NULL,'Vendedores A','Bilbao');
INSERT INTO grupos VALUES(NULL,'Vendedores B','Pamplona');
INSERT INTO grupos VALUES(NULL,'Vendedores C','Santiago de Compostela');

/*Vendedores*/
INSERT INTO vendedores VALUES(NULL,1,NULL,'David','Lopez','Responsable de tienda',curdate(),30000,4);
INSERT INTO vendedores VALUES(NULL,1,1,'Fran','Martinez','Ayudante de tienda',curdate(),23000,2);
INSERT INTO vendedores VALUES(NULL,2,NULL,'Nelson','Sanchez','Responsable de tienda',curdate(),38000,5);
INSERT INTO vendedores VALUES(NULL,2,3,'Jesus','Lopez','Ayudante de tienda',curdate(),12000,6);
INSERT INTO vendedores VALUES(NULL,3,NULL,'Victor','Lopez','Mecánico Jefe',curdate(),50000,2);
INSERT INTO vendedores VALUES(NULL,4,NULL,'Antonio','Lopez','Vendedor de recambios',curdate(),13000,8);
INSERT INTO vendedores VALUES(NULL,5,NULL,'Eleazar','Perez','Vendedor experto',curdate(),60000,2);
INSERT INTO vendedores VALUES(NULL,6,NULL,'Joaquin','Lopez','Ejecutivo de Cuentas',curdate(),80000,1);
INSERT INTO vendedores VALUES(NULL,6,8,'Luis','Lopez','Ayudante en tienda',curdate(),1000,10);

/*Clientes*/
INSERT INTO clientes VALUES(NULL,1,'Construcciones Diaz Inc','Alcobendas',24000,curdate());
INSERT INTO clientes VALUES(NULL,1,'Fruterias Antonia Inc','Fuenlabrada',40000,curdate());
INSERT INTO clientes VALUES(NULL,1,'Imprenta Martínez Inc','Alcobendas',32000,curdate());
INSERT INTO clientes VALUES(NULL,1,'Jesus Colchones Inc','Alcobendas',96000,curdate());
INSERT INTO clientes VALUES(NULL,1,'Bar Pepe Inc','Alcobendas',170000,curdate());
INSERT INTO clientes VALUES(NULL,1,'Tienda PC Inc','Alcobendas',245000,curdate());


/*Encargos*/
INSERT INTO encargos VALUES(NULL,1, 1, 2, curdate());
INSERT INTO encargos VALUES(NULL,2, 2, 4, curdate());
INSERT INTO encargos VALUES(NULL,3, 3, 1, curdate());
INSERT INTO encargos VALUES(NULL,4, 3, 3, curdate());
INSERT INTO encargos VALUES(NULL,5, 5, 1, curdate());
INSERT INTO encargos VALUES(NULL,6, 6, 1, curdate());
