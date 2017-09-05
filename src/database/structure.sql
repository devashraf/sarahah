CREATE TABLE admins(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(255) NOT NULL UNIQUE,
	name varchar(255) NOT NULL,
	email varchar(255) NOT NULL UNIQUE
);

CREATE TABLE s_messages (
	m_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	m_date datetime NOT NULL,
	m_body text(400) NOT NULL
);
