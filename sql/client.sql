CREATE table Client(
	cid int NOT NULL AUTO_INCREMENT UNIQUE,
	email varchar(100) NOT NULL UNIQUE,
	username varchar(15) NOT NULL UNIQUE,
	passwd varchar(20) NOT NULL UNIQUE,
	fname varchar(26),
	lname varchar(666),
	PRIMARY KEY (cid)
);
