DROP TABLE IF EXISTS sucursal;
create table sucursal(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codigosuc INT(10) NOT NULL UNIQUE,
    domicilio VARCHAR(50) NOT NULL,
    ciudad VARCHAR(50) NOT NULL,
    cp VARCHAR(50) NOT NULL,
    tel VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL
)engine=innodb;
DROP TABLE IF EXISTS personal; 
create table personal(
	id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT, 	
	codigosuc int(10) NOT NULL, 
	nom VARCHAR(50), 
	apellidos VARCHAR(50),
	email VARCHAR(50) NOT NULL UNIQUE,
	puesto VARCHAR(50),
	sx enum('M','F'),
	Fena date,
	create_at timestamp not null default current_timestamp,
	update_at timestamp,
	INDEX idsuc_x (codigosuc),
	FOREIGN KEY (codigosuc) references sucursal(codigosuc)ON DELETE RESTRICT
) ENGINE=innodb;

insert into sucursal(codigosuc,domicilio,ciudad,CP,tel) values(1,"Arboledas 45","Encenada","19008","3128274847");
insert into sucursal(codigosuc,domicilio,ciudad,CP,tel) values(2,"Tabachin 86","Colima","28869","3145869423");
insert into sucursal(codigosuc,domicilio,ciudad,CP,tel) values(3,"Almendros 96","Tijuana","14569","7415258963");
insert into sucursal(codigosuc,domicilio,ciudad,CP,tel) values(4,"Elias Zamora 41","CDMX","84621","7896541230");
insert into sucursal(codigosuc,domicilio,ciudad,CP,tel) values(5,"Valle 66","Jalisco","19000","3128572369");

INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(2, "Brian", "Barajas", "a@ucol.mx", "Gerente", "M", "1998-02-26");
INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(2, "Noelia", "Mendez", "b@ucol.mx", "Gerente", "F", "1998-09-22");
INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(1, "Daniel", "Diaz", "c@ucol.mx", "Administrador", "M", "1998-10-20");
INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(4, "Josue", "Martinez", "d@ucol.mx", "Administrador", "M", "1998-08-21");
INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(5, "Carlos", "Lezama", "e@ucol.mx", "Gerente", "M", "1998-01-30");
INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(2, "Rodrigo", "Rodriguez", "f@ucol.mx", "Mostrador", "M", "1998-05-06");
INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(4, "Maria", "Gonzales", "g@ucol.mx", "Gerente", "F", "1998-08-06");
INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(5, "Kenia", "Barajas", "h@ucol.mx", "Gerente", "F", "1998-02-02");

