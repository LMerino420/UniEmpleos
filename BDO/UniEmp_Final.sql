/**********************************************************************************
[CREACION DE LA BASE DE DATOS]
**********************************************************************************/
CREATE DATABASE uni_emp;
USE uni_emp;

/**********************************************************************************
[CREACION DE TABLAS]
**********************************************************************************/
create table categoria
(
	idcategoria int(10) not null auto_increment,
    n_categoria varchar(50),
    descripcion varchar(200),
    img varchar(250),
    primary key (idcategoria)
);

create table tipo_usr
(
	idtipo int(10) not null auto_increment,
    nombre varchar(50),
    primary key (idtipo)
);

create table usuario
(
	idusr int(10) not null auto_increment,
    usuario varchar(20),
    clave varchar(32),
    idtipo int(10),
    primary key (idusr),
    foreign key (idtipo) references tipo_usr(idtipo)
);

create table candidato
(
	idcandidato int(10) not null auto_increment,
    nombre varchar(35),
    apellido varchar(50),
    nacimiento date,
    c_telefono int(8),
    correo varchar(35),
    pdf_cv varchar(250),
    idcategoria int(10),
    idusr int (10),
    foto_cnd VARCHAR(250),
    primary key (idcandidato),
    foreign key (idcategoria) references categoria(idcategoria),
    foreign key (idusr) references usuario(idusr)
);

create table repositorio
(
	idrepositorio int(10)not null auto_increment,
	idcandidato int(10),
    enlace varchar(300),
    rep_descrip varchar(250),
    primary key (idrepositorio),
    foreign key (idcandidato) references candidato(idcandidato)
);

create table universidad
(
	iduniv int(10) not null auto_increment,
    foto varchar(250),
    n_universidad varchar(50),
    telefono int(8),
    primary key (iduniv)
);

create table facultad
(
	idfacultad int(10) not null auto_increment,
    iduniv int(10),
    n_facultad varchar(50),
    primary key (idfacultad),
    foreign key (iduniv) references universidad(iduniv)
);

create table carrera 
(
	idcarrera int(10) not null auto_increment,
    idfacultad int(10),
    n_carrera varchar(250),
    primary key (idcarrera),
    foreign key (idfacultad) references facultad(idfacultad)
);

create table academico
(
	idcandidato int(10),
    idcarrera int(10),
    ingreso date,
    ciclo varchar(8),
    foreign key (idcandidato) references candidato(idcandidato),
    foreign key (idcarrera) references carrera(idcarrera)
);

create table empresa
(
	idempresa int(10) not null auto_increment,
    foto_emp varchar(250),
    nombre varchar(60),
    representante varchar(60),
    telefono int(8),
    correo_emp varchar(35),
    idusr int(10),
    primary key (idempresa),
    foreign key (idusr) references usuario(idusr)
);

create table vacante
(
	idvacante int(10) not null auto_increment,
    idempresa int(10),
    des_vacante varchar (250),
    salario float(7,2),
    idcategoria int(10),
    contrato VARCHAR(20),
    entrada time,
    salida time,
    n_vacante varchar(250),
    requerimiento VARCHAR(250),
    primary key (idvacante),
    foreign key (idempresa) references empresa(idempresa),
    foreign key (idcategoria) references categoria(idcategoria)
);

create table postulacion
(
	idvacante int(10),
    idcandidato int(10),
    postular bool,
    revision bool,
    entrevista bool,
    foreign key (idvacante) references vacante(idvacante),
    foreign key (idcandidato) references candidato (idcandidato)
);
/*
**********************************************************************************
[INSERT DE TABLAS]
**********************************************************************************
*/
INSERT INTO tipo_usr (nombre) VALUES ('CANDIDATO');
INSERT INTO tipo_usr (nombre) VALUES ('EMPRESA');

INSERT INTO universidad (n_universidad,telefono) VALUES ('Universidad Evangelica de El Salvador','22754000');

INSERT INTO facultad(iduniv,n_facultad) VALUES ('1','Ingenieria');

INSERT INTO carrera(idfacultad,n_carrera) VALUES ('1','Ingenieria en Sistemas Computacionales');
INSERT INTO carrera(idfacultad,n_carrera) VALUES ('1','Ingenieria en Desarrollo de Contenidos Digitales y Robotica Aplicada');
INSERT INTO carrera(idfacultad,n_carrera) VALUES ('1','Tecnico en Redes y Seguridad Informatica');

INSERT INTO categoria(n_categoria,descripcion,img) 
VALUES ('Base de datos','Responsable de aspectos técnicos, tecnológicos, científicos y legales de base de datos y de la integridad de los mismos','bdo.png');
INSERT INTO categoria(n_categoria,descripcion,img) 
VALUES ('Programación','Responsable de escribir, depurar y dar mantenimiento al codigo fuente de un programa informático, para realizar una tarea determinada','program.png');
INSERT INTO categoria(n_categoria,descripcion,img) 
VALUES ('Diseño Web','Responsable de crear sitios web con las características y requisitos necesarios para representar y defender un negocio, empresa o actividad en Internet','disenoweb.png');
INSERT INTO categoria(n_categoria,descripcion,img) 
VALUES ('Redes','Responsable de supervisar que la red es segura, ademas analizar y minimizar los riesgos, asegurandose que solo puedan tener acceso a la red las personas con el permiso adecuado.','redes.png');