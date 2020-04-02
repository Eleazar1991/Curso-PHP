DROP TABLE IF EXISTS 'users';
CREATE TABLE IF NOT EXISTS 'users'(
    id int(255) NOT NULL AUTO_INCREMENT,
    role varchar(20) DEFAULT NULL,
    name varchar(100) DEFAULT NULL,
    surname varchar(200) DEFAULT NULL,
    nick varchar(100) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    password varchar(255) DEFAULT NULL,
    image varchar(255) DEFAULT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    remember_token varchar(255) DEFAULT NULL,
    PRIMARY KEY ('id')
)ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;