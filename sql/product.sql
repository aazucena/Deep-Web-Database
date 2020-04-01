CREATE table Product(
	pid int NOT NULL AUTO_INCREMENT UNIQUE,
	catid int NOT NULL,
	cid int NOT NULL,
	pname varchar(255) NOT NULL,
	pwhy varchar(255) NOT NULL,
	cond varchar(255) NOT NULL,
	desb varchar(255) NOT NULL,
	disctpct int(10) NOT NULL,
	pdate datetime NOT NULL,
    prodimg longblob NOT NULL,
	instock int NOT NULL,
	PRIMARY KEY (pid),
	FOREIGN KEY (catid) REFERENCES Category(catid),
	FOREIGN KEY (cid) REFERENCES Client(cid)
);
