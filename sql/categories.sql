
CREATE table Hitmen(
	pid int NOT NULL PRIMARY KEY,
	cat CHAR(1) DEFAULT 'H' NOT NULL,
	CHECK (cat='H'),
	hitname varchar(255),
	hemail varchar(100),
	gender varchar(100),
	req varchar(255),
	request varchar(255),
	rate varchar(255),
	FOREIGN KEY (pid,cat) REFERENCES Product(pid,cat)
);

CREATE table Exotics(
	pid int NOT NULL PRIMARY KEY,
  	cat CHAR(1) DEFAULT 'E' NOT NULL,
	CHECK (cat='E'),
	exotype varchar(255),
	typeid int UNIQUE,
	FOREIGN KEY (pid,cat) REFERENCES Product(pid,cat)
	FOREIGN KEY (typeid) REFERENCES ProductType(typeid)
);

CREATE table ProductType(
	typeid int NOT NULL AUTO_INCREMENT,
	ptypename varchar(255) NOT NULL UNIQUE,
	PRIMARY KEY (typeid)
);

CREATE table Substances(
	pid int NOT NULL PRIMARY KEY,
  	cat CHAR(1) DEFAULT 'S' NOT NULL,
	CHECK (cat='S'),
	grade CHAR(1) CHECK(grade IN ('A', 'B', 'C', 'U')),
	gram DOUBLE CHECK (gram > 0.00),
	stype varchar(255),
	FOREIGN KEY (pid,cat) REFERENCES Product(pid,cat)
);

CREATE table Weapons(
	pid int NOT NULL PRIMARY KEY,
  	cat CHAR(1) DEFAULT 'W' NOT NULL,
	CHECK (cat='W'),
	wtype CHAR(1),
	FOREIGN KEY (pid,cat) REFERENCES Product(pid,cat)
);
