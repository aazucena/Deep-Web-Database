CREATE table Client(
	'cid' int NOT NULL AUTO_INCREMENT,
	'email' varchar(100) NOT NULL,
	'username' varchar(15) NOT NULL,
	'passwd' varchar(20) NOT NULL, 
	'fname' varchar(26), 
	'lname' varchar(666), 
	PRIMARY KEY ('cid')
);
