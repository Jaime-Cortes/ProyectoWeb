Drop database if exists Tec_Web;
Create database Tec_Web;
Use Tec_web;

/*Tabla de alumnos*/
DROP TABLE IF EXISTS Alumnos;
CREATE TABLE Alumnos (
  boleta nvarchar(10) NOT NULL primary key,
  nombre nvarchar(64) NOT NULL,
  apellidoPat nvarchar(64) NOT NULL,
  apellidoMat nvarchar(64) DEFAULT NULL,
  email nvarchar(64) NOT NULL,
  nacimiento nvarchar(64) NULL,
  genero nvarchar(10) NOT NULL,
  curp nvarchar(18) NOT NULL,
  calle nvarchar(64) NOT NULL,
  colonia nvarchar(64) NOT NULL,
  cp nvarchar(32) NOT NULL,
  tel nvarchar(32) NOT NULL,
  promedio nvarchar(4) NOT NULL,
  opcionEscom nvarchar(10) not null
);

/*Tabla de las escuelas (CECyT)*/
DROP TABLE IF EXISTS Escuelas;
CREATE TABLE Escuelas(
  idEscuela int NOT NULL primary key,
  escuela nvarchar(64) NOT NULL
);

/*Tabla de estados*/
DROP TABLE IF EXISTS Estados;
CREATE TABLE Estados(
  idEstado int NOT NULL primary key,
  estado nvarchar(64) NOT NULL
);

/*Tabla de laboratorios*/
Drop table if exists Laboratorios;
CREATE TABLE Laboratorios(
	idLab int not null primary key,
    laboratorio nvarchar(10) not null
);
/*----------------------Tabla de relaciones----------------------------------*/
/*Tabla relacion Alumno Escuela*/
drop table if exists Alumno_Escuela;
create table Alumno_Escuela(
	boleta nvarchar(10) not null,
    idEscuela int not null,
    foreign key(boleta) references Alumnos(boleta),
    foreign key (idEscuela) references Escuelas(idEscuela)
);

/*Tabla relacion Alumno Estado*/
drop table if exists Alumno_Estado;
create table Alumno_Estado(
	boleta nvarchar(10) not null,
    idEstado int not null,
    foreign key(boleta) references Alumnos(boleta),
    foreign key (idEstado) references Estados(idEstado)
);

/*Tabla relacion alumno_Estado*/
drop database if exists Alumno_Laboratorio;
create table Alumno_Laboratorio(
	boleta nvarchar(10) not null,
    idLab int not null,
    hora time,
    fecha nvarchar(15) default '25-06-2021',
    foreign key(boleta) references Alumnos(boleta),
    foreign key (idLab) references Laboratorios(idLab)
);

drop view if exists Datos;
create view Datos as
select  A.boleta, A.nombre, A.apellidoPat, A.apellidoMat, A.email, A.nacimiento, A.genero, A.curp, A.calle, A.colonia, A.cp, 
		A.tel, A.promedio, A.opcionEscom,Esc.idEscuela, Esc.escuela, Est.idEstado, Est.estado, L.laboratorio, AL.hora, AL.fecha
	from alumnos as A 
	inner join alumno_escuela as AE on A.boleta = AE.boleta
	inner join alumno_estado as AES on A.boleta = AES.boleta
    inner join alumno_laboratorio as AL on A.boleta = AL.boleta
    inner join Escuelas as Esc on AE.idEscuela = Esc.idEscuela
    inner join Estados as Est on AES.idEstado = Est.idEstado
    inner join Laboratorios as L on AL.idLab = L.idLab;
    
/*----------------------Procedure------------------------*/
delimiter **
drop procedure if exists ProcedureAlumno**
create procedure ProcedureAlumno(
	opc int,
	boletaA nvarchar(10),
	nombreA nvarchar(64),
	apellidoPatA nvarchar(64),
	apellidoMatA nvarchar(64),
	emailA nvarchar(64),
	nacimientoA nvarchar(64),
	generoA nvarchar(10),
	curpA nvarchar(18),
	calleA nvarchar(64),
	coloniaA nvarchar(64),
	cpA nvarchar(32),
	telA nvarchar(32),
	promedioA nvarchar(64),
	opcionEscomA nvarchar(10),
    idEscuelaE int, 
    escuelaE nvarchar(64),
    idEstadoE int)
BEGIN
declare count int;
declare i int;
declare j int;
declare horaExamen time;
	/* opc -> 1.- Registar alumno, 2.- Consultar alumno, 3.- Actualizar alumno, 4.- Borrar alumno, 5.- Consultar todos alumnos*/
    if opc = 1 then
		/*Se registra el alumno*/
			insert into alumnos(boleta, nombre, apellidoPat, apellidoMat, email, nacimiento, genero, curp, calle, colonia, cp, tel, promedio, opcionEscom)
			values (boletaA, nombreA, apellidoPatA, apellidoMatA, emailA, nacimientoA, generoA, curpA, calleA, coloniaA, cpA, telA, promedioA, opcionEscomA); 
		/*Se registra en su estado*/
			insert into alumno_estado (boleta, idEstado) values (boletaA, idEstadoE);
        /*Se registra en su escuela*/
			if 	idEscuelaE = 0 then /*Opcion otro, se debe registrar la escuela*/
				set idEscuelaE = (select ifnull(max(idEscuela), 0) from Escuelas) + 1;
				insert into Escuelas (idEscuela, escuela) values (idEscuelaE, escuelaE);
				insert into Alumno_Escuela(boleta, idEscuela) values (boletaA, idEscuelaE);
			else /*Se registra el cecyt*/
			insert into Alumno_Escuela (boleta, idEscuela) values (boletaA, idEscuelaE);
			end if;   
      /*Se agrega el alumno a un grupo y hora para su examen*/
		set i=0; /*Periodos de horas*/
        set horaExamen = cast('08:00:00' as time);
        while i < 10 do
			set j = 0; /*Grupos*/
				WHILE j < 6  do
					set count = (select count(*) from Alumno_Laboratorio where idLab = j and hora=horaExamen);
					if count < 25 then
						insert into Alumno_Laboratorio (boleta, idLab, hora) values (boletaA, j, horaExamen);
						set j = 7; /*Break*/
					else
						set j = j+1;
					end if;
				end while;
			if j=7 then
				set i = 25;
			else
				set horaExamen = addtime(horaExamen,  cast('1:45:00' as time));
				set i = i+1;
			end if;
		end while;
        
    elseif opc = 2 then
		select * from Datos where boleta=boletaA;
    elseif opc = 3 then
		update Alumnos set nombre=nombreA, apellidoPat=apellidoPatA, apellidoMat=apellidoMatA, email=emailA, 
						nacimiento=nacimientoA, genero=generoA, curp=curpA, calle=calleA, colonia=coloniaA, cp=cpA, tel=telA, 
						promedio=promedioA, opcionEscom=opcionEscomA where boleta=boletaA;
        update alumno_estado set idEstado=idEstadoE where boleta = boletaA;               
		if 	idEscuelaE = 0 then /*Opcion otro, se debe registrar la escuela*/
				set idEscuelaE = (select ifnull(max(idEscuela), 0) from Escuelas) + 1;
				insert into Escuelas (idEscuela, escuela) values (idEscuelaE, escuelaE);
				update Alumno_Escuela set idEscuela = idEscuelaE where boleta=boletaA;
			else /*Se registra el cecyt*/
			update Alumno_Escuela set idEscuela=idEscuelaE where boleta=boletaA;
			end if;   
    elseif opc = 4 then
		Delete from Alumno_Escuela where boleta=boletaA;
        delete from alumno_estado where boleta=boletaA;
        delete from alumno_laboratorio where boleta=boletaA;
        delete from alumnos where boleta=boletaA;
    elseif opc = 5 then
		select * from Datos;
    elseif opc = 6 then
	select * from Datos where curp=curpA;
    end if;
END**
delimiter ;

/*Ingresando datos predeterminados*/
insert into Laboratorios (idLab, Laboratorio) values (0, 'Lab 1');
insert into Laboratorios (idLab, Laboratorio) values (1, 'Lab 2');
insert into Laboratorios (idLab, Laboratorio) values (2, 'Lab 3');
insert into Laboratorios (idLab, Laboratorio) values (3, 'Lab 4');
insert into Laboratorios (idLab, Laboratorio) values (4, 'Lab 5');
insert into Laboratorios (idLab, Laboratorio) values (5, 'Lab 6');

insert into Escuelas (idEscuela, Escuela) values (1, 'CECyT 1');
insert into Escuelas (idEscuela, Escuela) values (2, 'CECyT 2');
insert into Escuelas (idEscuela, Escuela) values (3, 'CECyT 3');
insert into Escuelas (idEscuela, Escuela) values (4, 'CECyT 4');
insert into Escuelas (idEscuela, Escuela) values (5, 'CECyT 5');
insert into Escuelas (idEscuela, Escuela) values (6, 'CECyT 6');
insert into Escuelas (idEscuela, Escuela) values (7, 'CECyT 7');
insert into Escuelas (idEscuela, Escuela) values (8, 'CECyT 8');
insert into Escuelas (idEscuela, Escuela) values (9, 'CECyT 9');
insert into Escuelas (idEscuela, Escuela) values (10, 'CECyT 10');
insert into Escuelas (idEscuela, Escuela) values (11, 'CECyT 11');
insert into Escuelas (idEscuela, Escuela) values (12, 'CECyT 12');
insert into Escuelas (idEscuela, Escuela) values (13, 'CECyT 13');
insert into Escuelas (idEscuela, Escuela) values (14, 'CECyT 14');
insert into Escuelas (idEscuela, Escuela) values (15, 'CECyT 15');
insert into Escuelas (idEscuela, Escuela) values (17, 'CECyT 17');
insert into Escuelas (idEscuela, Escuela) values (18, 'CET 1');

insert into Estados (idEstado, estado) values (1, 'Aguascalientes');
insert into Estados (idEstado, estado) values (2, 'Baja california');
insert into Estados (idEstado, estado) values (3, 'Baja california sur');
insert into Estados (idEstado, estado) values (4, 'Campeche');
insert into Estados (idEstado, estado) values (5, 'CDMX');
insert into Estados (idEstado, estado) values (6, 'Chiapas');
insert into Estados (idEstado, estado) values (7, 'Chihuahua');
insert into Estados (idEstado, estado) values (8, 'Coahuila');
insert into Estados (idEstado, estado) values (9, 'Colima');
insert into Estados (idEstado, estado) values (10, 'Durango');
insert into Estados (idEstado, estado) values (11, 'Estado de Mexico');
insert into Estados (idEstado, estado) values (12, 'Guanajuato');
insert into Estados (idEstado, estado) values (13, 'Guerrero');
insert into Estados (idEstado, estado) values (14, 'Hidalgo');
insert into Estados (idEstado, estado) values (15, 'Jalisco');
insert into Estados (idEstado, estado) values (16, 'Michoacan');
insert into Estados (idEstado, estado) values (17, 'Morelos');
insert into Estados (idEstado, estado) values (18, 'Nayarit');
insert into Estados (idEstado, estado) values (19, 'Nuevo Leon');
insert into Estados (idEstado, estado) values (20, 'Oaxaca');
insert into Estados (idEstado, estado) values (21, 'Puebla');
insert into Estados (idEstado, estado) values (22,'Queretaro');
insert into Estados (idEstado, estado) values (23, 'Quintana Roo');
insert into Estados (idEstado, estado) values (24, 'San Luis Potosi');
insert into Estados (idEstado, estado) values (25, 'Sinaloa');
insert into Estados (idEstado, estado) values (26, 'Sonora');
insert into Estados (idEstado, estado) values (27, 'Tabasco');
insert into Estados (idEstado, estado) values (28, 'Tamaulipas');
insert into Estados (idEstado, estado) values (29, 'Tlaxcala');
insert into Estados (idEstado, estado) values (30, 'Veracruz');
insert into Estados (idEstado, estado) values (31, 'Yucatan');
insert into Estados (idEstado, estado) values (32, 'Zacatecas');

drop table if exists `admin`;
CREATE TABLE `admin`(
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`usuario`, `clave`) VALUES ('Equipo4.Escom@gmail.com', '3$com123');


/*
delimiter **    
drop procedure if exists registrosPrueba;
create procedure registrosPrueba()
begin
	declare i int;
    set i = 1;
    while i < 400 do
		CALL ProcedureAlumno (1, cast(i as char(3)), 'nombre', 'paterno', 'materno', 'email@example.com', '2005-08-07', 'M', 'curp', 
		'calle', 'colonia', '13000', '0123456789', '10', 'Primer', 9, '', 5);
    set i = i+1;
    end while;
end**
delimiter ;

call registrosPrueba();

select * from alumnos;
select * from Laboratorios;
select * from Escuelas;
select * from estados;
select * from Datos;
select * from alumno_escuela;
select * from alumno_laboratorio;
select * from alumno_estado;
select distinct hora from Datos;
select count(*) from datos;
*/
    