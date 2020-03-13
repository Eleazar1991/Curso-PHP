CREATE DATABASE IF NOT EXISTS symfony_master;
USE symfony_master;

CREATE TABLE IF NOT EXISTS users(
    id          int(255) auto_increment not NULL,
    role        varchar(50),
    surname     varchar(100),
    email       varchar(255),
    password    varchar(255),
    created_at  datetime,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL,"ROLE_USER","Eleazar","Perez","eleazar@eleazar.com","eleazar1234",CURTIME());
INSERT INTO users VALUES(NULL,"ROLE_USER","Manolo","Arencibia","manolo@manolo.com","manolo1234",CURTIME());
INSERT INTO users VALUES(NULL,"ROLE_USER","Carlos","Santana","carlos@carlos.com","carlos1234",CURTIME());

CREATE TABLE IF NOT EXISTS tasks(
    id          int(255) auto_increment not null,
    user_id     int(255) not null,
    title       varchar(255),
    content     text,
    priority    varchar(20),
    hours       int(100),
    created_at  datetime,
CONSTRAINT pk_tasks PRIMARY KEY(id),
CONSTRAINT fk_task_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

INSERT INTO tasks VALUES(NULL,1,"Tarea 1","Contenido de prueba 1","high",40,CURDATE());
INSERT INTO tasks VALUES(NULL,1,"Tarea 2","Contenido de prueba 2","low",20,CURDATE());
INSERT INTO tasks VALUES(NULL,2,"Tarea 3","Contenido de prueba 3","medium",10,CURDATE());
INSERT INTO tasks VALUES(NULL,3,"Tarea 4","Contenido de prueba 4","high",50,CURDATE());
