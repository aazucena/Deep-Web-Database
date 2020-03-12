CREATE table Category(
	'catid' int NOT NULL AUTO_INCREMENT,
	'cattype' char(1) NOT NULL CHECK ('cattype' IN ('H', 'E', 'S', 'W')),  
	'catname' varchar(255) NOT NULL,
	PRIMARY KEY ('catid'),
	UNIQUE('catid', 'cattype', 'catname');
);

CREATE table Hitmen(
	'catid' int NOT NULL, 
  	'cattype' CHAR(1) DEFAULT 'H' NOT NULL, CHECK ('cattype' ='H'),
	'hitname' varchar(255) NOT NULL,
	'hemail' varchar(100),
	'gender' varchar(100),
	'request' varchar(255) NOT NULL,
	'grade' varchar(255) NOT NULL,
	PRIMARY KEY ('catid'),
	FOREIGN KEY ('catid','catname') REFERENCES Category('catid','catname')
);

CREATE table Exotics(
	'catid' int NOT NULL, 
  	'cattype' CHAR(1) DEFAULT 'E' NOT NULL, CHECK ('cattype'='E'),
	'exotype' varchar(255) NOT NULL,
	'protypeid' int NOT NULL,
	PRIMARY KEY ('catid'),
	FOREIGN KEY ('catid','catname') REFERENCES Category('catid','catname'),
	FOREIGN KEY ('protypeid') REFERENCES ProductType('protypeid')
);

CREATE table ProductType(
	'protypeid' int NOT NULL AUTO_INCREMENT UNIQUE,
	'protypename' varchar(255) NOT NULL UNIQUE,
	PRIMARY KEY ('protypeid') 
);

CREATE table Substances(
	'catid' int NOT NULL AUTO_INCREMENT,  
	'catname' varchar(255) NOT NULL,
	PRIMARY KEY ('catid')
);

CREATE table Weapons(
	'catid' int NOT NULL AUTO_INCREMENT,  
	'catname' varchar(255) NOT NULL,
	PRIMARY KEY ('catid')
);