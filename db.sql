-- create users table...
CREATE TABLE IF NOT EXIST users (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY_KEY,
	first_name VARCHAR NOT NULL,
	last_name VARCHAR NOT NULL,
	gender VARCHAR NOT NULL,
	email VARCHAR UNIQUE NOT NULL,
	address TEXT,
	photo VARCHAR,
	password VARCHAR NOT NULL,
	is_admin BOOLEAN DEFAULT O,
	last_login TIMESTAMP,
	current_login TIMESTAMP,
	created_at TIMESTAMP,
	updated_at TIMESTAMP
);