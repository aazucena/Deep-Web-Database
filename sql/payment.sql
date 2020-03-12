CREATE table Payment(
	'payid' int NOT NULL AUTO_INCREMENT UNIQUE,
	'oid' int NOT NULL,
	'amount' int NOT NULL,
	PRIMARY KEY ('payid'),
	FOREIGN KEY ('oid') REFERENCES Orders('oid')
);
