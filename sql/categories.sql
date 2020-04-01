CREATE table Category(
	catid int NOT NULL AUTO_INCREMENT,
	cattype char(1) NOT NULL CHECK (cattype IN ('H', 'E', 'S', 'W')),
	catname varchar(255) NOT NULL,
	PRIMARY KEY (catid),
	UNIQUE(catid, cattype, catname)
);

CREATE table Hitmen(
	hid int NOT NULL AUTO_INCREMENT UNIQUE,
	catid int NOT NULL,
	cattype CHAR(1) DEFAULT 'H' NOT NULL CHECK (cattype='H'),
	hitname varchar(255) NOT NULL,
	hemail varchar(100),
	gender varchar(100),
	req varchar(255) NOT NULL,
	request varchar(255) NOT NULL,
	rate varchar(255) NOT NULL,
	PRIMARY KEY (hid),
	FOREIGN KEY (catid,cattype) REFERENCES Category(catid,cattype)
);

CREATE table Exotics(
	exoid int NOT NULL AUTO_INCREMENT UNIQUE,
	catid int NOT NULL,
  	cattype CHAR(1) DEFAULT 'E' NOT NULL CHECK (cattype='E'),
	exotype varchar(255) NOT NULL,
	protypeid int NOT NULL,
	PRIMARY KEY (exoid),
	FOREIGN KEY (catid,cattype) REFERENCES Category(catid,cattype)
);

CREATE table ProductType(
	protypeid int NOT NULL AUTO_INCREMENT UNIQUE,
	exoid int NOT NULL,
	protypename varchar(255) NOT NULL UNIQUE,
	PRIMARY KEY (protypeid),
	FOREIGN KEY (exoid) REFERENCES Exotics(exoid)
);

CREATE table Substance(
	subid int NOT NULL AUTO_INCREMENT,
	catid int NOT NULL,
  	cattype CHAR(1) DEFAULT 'S' NOT NULL CHECK (cattype='S'),
	grade CHAR(1) NOT NULL CHECK(grade IN ('A', 'B', 'C', 'U')),
	gram DOUBLE NOT NULL CHECK (gram > 0.00),
	stype varchar(255) NOT NULL,
	PRIMARY KEY (subid),
	FOREIGN KEY (catid,cattype) REFERENCES Category(catid,cattype)
);

CREATE table Weapon(
	wid int NOT NULL AUTO_INCREMENT,
	catid int NOT NULL,
  	cattype CHAR(1) DEFAULT 'W' NOT NULL CHECK (cattype='W'),
	wtype CHAR(1) NOT NULL,
	PRIMARY KEY (wid),
	FOREIGN KEY (catid,cattype) REFERENCES Category(catid,cattype)
);
