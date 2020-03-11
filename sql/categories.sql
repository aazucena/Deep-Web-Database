CREATE table Category(
	'catid' int NOT NULL AUTO_INCREMENT,  
	'catname' varchar(255) NOT NULL,
	'pwhy' varchar(255) NOT NULL,
	'cond' varchar(255) NOT NULL,
	'desc' varchar(2000) NOT NULL,
	'disctpct' int(10) NOT NULL,
	'pdate' datetime NOT NULL,
	'#instock' int NOT NULL,  
	PRIMARY KEY ('catid')
);
