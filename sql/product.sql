CREATE table Product(
	'pid' int NOT NULL AUTO_INCREMENT UNIQUE,
	'catid' int NOT NULL,  
	'cid' int NOT NULL,  
	'pname' varchar(255) NOT NULL,
	'pwhy' varchar(255) NOT NULL,
	'cond' varchar(255) NOT NULL,
	'desc' varchar(2000) NOT NULL,
	'disctpct' int(10) NOT NULL,
	'pdate' datetime NOT NULL,
	'#instock' int NOT NULL,  
	PRIMARY KEY ('pid'),
	FOREIGN KEY ('catid') REFERENCES Category('catid'),
	FOREIGN KEY ('cid') REFERENCES Client('cid')

);

CREATE table Images(
    'imgid' bigint NOT NULL AUTO_INCREMENT,
	'pid' int NOT NULL,
    'prodimg' longblob NOT NULL,
    PRIMARY KEY (`imgid`),
	FOREIGN KEY ('pid') REFERENCES Product('pid')
);
