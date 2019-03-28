/*Creamos la BD*/
CREATE DATABASE tienda_master;
USE tienda_master;

/*Tabla usuarios*/
CREATE TABLE usuarios(
    id int(255) auto_increment not null,
    nombre varchar(100) not null,
    apellidos varchar(255),
    email varchar(255) not null,
    password varchar(255) not null,
    rol varchar(20),
CONSTRAINT pk_usuarios PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE(email)    
)ENGINE=InnoDB;
/*Registros*/
INSERT INTO usuarios VALUES(NULL,'Admin','Admin','admin@admin.com','admin','admin');


/*Tabla categorias*/
CREATE TABLE categorias(
    id int(255) auto_increment not null,
    nombre varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY (id)  
)ENGINE=InnoDB;
/*Registros*/
INSERT INTO categorias VALUES(NULL,'Manga corta');
INSERT INTO categorias VALUES(NULL,'Manga larga');
INSERT INTO categorias VALUES(NULL,'Manga hueca');
INSERT INTO categorias VALUES(NULL,'Sudaderas');


/*Tabla pedidos*/
CREATE TABLE pedidos(
    id int(255) auto_increment not null,
    usuario_id int(255) not null,
    provincia varchar(100)not null,
    localidad varchar(100)not null,
    direccion varchar(255) not null,
    coste float(100,2) not null,
    estado varchar(20),
    fecha date,
    hora time,
CONSTRAINT pk_pedidos PRIMARY KEY (id),
CONSTRAINT fk_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios(id)   
)ENGINE=InnoDB;
/*Registros*/


/*Tabla productos*/
CREATE TABLE productos(
    id int(255) auto_increment not null,
    categoria_id int(255) not null,
    titulo varchar(100) not null,
    descripcion varchar(100),
    precio float(100,2) not null,
    stock int(255) not null,
    oferta varchar(2),
    fecha date not null,
    imagen varchar(500),
CONSTRAINT pk_productos PRIMARY KEY (id),
CONSTRAINT fk_categorias FOREIGN KEY (categoria_id) REFERENCES categorias(id)   
)ENGINE=InnoDB;
/*Registros*/
INSERT INTO productos VALUES(NULL,'','',,);
INSERT INTO productos VALUES(NULL,'','',,);
INSERT INTO productos VALUES(NULL,'','',,);

/*Tabla Lineas_Pedidos*/
CREATE TABLE Lineas_Pedidos(
    id int(255) auto_increment  not null,
    pedido_id int(255) not null,
    producto_id int(255) not null,
    unidades int(100) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY (id),
CONSTRAINT fk_pedidos FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_productos FOREIGN KEY (producto_id) REFERENCES productos(id)
)ENGINE=InnoDB;
/*Registros*/