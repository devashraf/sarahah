CREATE TABLE admins(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(255) NOT NULL UNIQUE,
	name varchar(255) NOT NULL,
	email varchar(255) NOT NULL UNIQUE
);
