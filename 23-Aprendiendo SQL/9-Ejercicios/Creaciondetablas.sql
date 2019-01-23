/*1.diseñar y crear la base de datos de un concesionario*/
/*Crear la BD*/
CREATE DATABASE IF NOT EXISTS concesionario;
USE concesionario;
/*Tabla Coches*/
CREATE TABLE coches(
    id int(10) auto_increment not null,
    modelo varchar(100) not null,
    marca varchar(50),
    precio int(20) not null,
    stock int(255) not null,
CONSTRAINT pk_coches PRIMARY KEY (id)
)ENGINE=InnoDb;

/*Tabla Grupos*/
CREATE TABLE grupos(
    id int(10) auto_increment not null,
    nombre varchar(100) not null,
    ciudad varchar(100),
CONSTRAINT pk_grupos PRIMARY KEY (id)
)ENGINE=InnoDb;

/*Tabla Vendedores*/
CREATE TABLE vendedores(
    id int(10) auto_increment not null,
    grupo_id int(10) not null,
    jefe int(10),
    nombre varchar(100) not null,
    apellidos varchar(150),
    cargo varchar(50),
    fecha_alta date,
    sueldo float(20,2),
    comision float(10,2) not null,
CONSTRAINT pk_vendedores PRIMARY KEY (id),
CONSTRAINT fk_grupos FOREIGN KEY (grupo_id) REFERENCES grupos(id),
CONSTRAINT fk_jefe FOREIGN KEY (jefe) REFERENCES vendedores(id)
)ENGINE=InnoDb;

/*Tabla Clientes*/
CREATE TABLE clientes(
    id int(10) auto_increment not null,
    vendedor_id int(10),
    nombre varchar(150) not null,
    ciudad varchar(100),
    gastado float(50,2) not null,
    fecha date,
CONSTRAINT pk_clientes PRIMARY KEY (id),
CONSTRAINT fk_vendedor FOREIGN KEY (vendedor_id) REFERENCES vendedores(id)
)ENGINE=InnoDb;

/*Tabla Encargos*/
CREATE TABLE encargos(
    id int(10) auto_increment not null,
    cliente_id int(10) not null,
    coche_id int(10) not null,
    cantidad int(100) not null,
    fecha date,
CONSTRAINT pk_encargos PRIMARY KEY (id),
CONSTRAINT fk_clientes FOREIGN KEY (cliente_id) REFERENCES clientes(id),
CONSTRAINT fk_coches FOREIGN KEY (coche_id) REFERENCES coches(id)
)ENGINE=InnoDb;



