CREATE table Payment(
	PaymentID int NOT NULL AUTO_INCREMENT,
	OrderID int NOT NULL,
	Pay_amount int NOT NULL,
	crypto# int NOT NULL, 
	PRIMARY KEY (PaymentID),
	FOREIGN KEY (OrderID) REFERENCES Orders(OrderID)
);
