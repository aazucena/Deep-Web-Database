CREATE table Orders(
	'oid' int NOT NULL AUTO_INCREMENT,
	'pid' int NOT NULL,
	'cid' int NOT NULL,
	'oprice' int NOT NULL,
	'quantity' int NOT NULL, 
	'odate' timestamp NOT NULL, 
	PRIMARY KEY ('oid'),
	FOREIGN KEY ('pid') REFERENCES Product('pid'),
	FOREIGN KEY ('cid') REFERENCES Client('cid')
);
