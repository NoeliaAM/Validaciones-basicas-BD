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
) ENGINE=ndbcluster;
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
)engine=ndbcluster;

CREATE TABLE USER (
     user_id INT, 
     user_name VARCHAR(50), 
     company_id INT,
     INDEX company_id_idx (company_id),
     FOREIGN KEY (company_id) REFERENCES COMPANY (company_id) ON DELETE RESTRICT
) ENGINE=ndbcluster;

CREATE TABLE COMPANY (
     company_id INT NOT NULL,
     company_name VARCHAR(50),
     PRIMARY KEY (company_id)
) ENGINE=ndbcluster;

INSERT INTO user(user_id, user_name, company_id) VALUES(2, "Noelia",2);

INSERT INTO company(company_id, company_name) VALUES(2, "super");


insert into sucursal(codigosuc,domicilio,ciudad,CP,tel) values(1,"Carlitos","Encenada","19008","31227847");

insert into sucursal(codigosuc,domicilio,ciudad,CP,tel) values(2,"Carlitos","Encenada","19008","31227847");

INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(20, "Brian", "Barajas", "brian@ucol.mx", "Gerente", "M", "1998-02-26");

INSERT INTO personal(codigosuc, nom, apellidos, email, puesto, sx, Fena) VALUES(2, "Noelia", "Barajas", "briannn@ucol.mx", "Gerente", "M", "1998-02-26");

