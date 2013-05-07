CREATE DATABASE project_database

USE project_database

CREATE TABLE IF NOT EXISTS client (
	client_id INT NOT NULL AUTO_INCREMENT,
	client_name VARCHAR(50),
	client_pin VARCHAR(13),
	client_address VARCHAR(150),
	client_phone VARCHAR(15),
	PRIMARY KEY (client_id)
)

CREATE TABLE IF NOT EXISTS category (
	category_id INT NOT NULL AUTO_INCREMENT,
	category_name VARCHAR(50),
	PRIMARY KEY (category_id)
)

CREATE TABLE IF NOT EXISTS product (
	product_id INT NOT NULL AUTO_INCREMENT,
	category_id INT,
	product_name VARCHAR(50),
	product_price FLOAT,
	product_description VARCHAR(300),
	product_amount INT,
    product_image VARCHAR(200),
    product_url VARCHAR(100),
	PRIMARY KEY (product_id),
	FOREIGN KEY (category_id) REFERENCES category(category_id)
)

CREATE TABLE IF NOT EXISTS contract (
	contract_id INT NOT NULL AUTO_INCREMENT,
	contract_date timestamp default CURRENT_TIMESTAMP,
	contract_finalprice FLOAT,
	PRIMARY KEY(contract_id)
)

ALTER TABLE contract auto_increment = 10000;


CREATE TABLE IF NOT EXISTS user (
	user_name varchar(150) NOT NULL,
	user_password varchar(40),
	user_type tinyint,
	client_id INT NOT NULL,
	PRIMARY KEY(user_name),
	FOREIGN KEY(client_id) REFERENCES client(client_id)
)

CREATE TABLE IF NOT EXISTS orders (
	order_id INT NOT NULL AUTO_INCREMENT,
	client_id INT NOT NULL,
	contract_id INT NOT NULL,
	PRIMARY KEY (order_id),
	FOREIGN KEY (client_id) REFERENCES client(client_id),
	FOREIGN KEY (contract_id) REFERENCES contract(contract_id)
)

CREATE TABLE IF NOT EXISTS order_products (
  product_id INT,
  order_id INT,
  quantity INT,
  FOREIGN KEY(product_id) REFERENCES product(product_id),
  FOREIGN KEY(order_id) REFERENCES orders(order_id)
)
