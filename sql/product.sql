CREATE table Product(
	pid int NOT NULL AUTO_INCREMENT,
	cat char(1) NOT NULL CHECK (cat IN ('H', 'E', 'S', 'W')),
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
	FOREIGN KEY (cid) REFERENCES Client(cid),
  	UNIQUE (pid,cat)
);
